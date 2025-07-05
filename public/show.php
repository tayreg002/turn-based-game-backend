<?php
declare(strict_types=1);

namespace App;

require ('Configs.php');

try {
    $db = Connection::getDbConnection();
    $id = $_GET["id"];
    $sql = "SELECT * FROM user WHERE id = '$id'";
    $result = $db->query($sql);
    $row = $result->fetch(\PDO::FETCH_ASSOC);

    $userId = ($row['id']);
    echo "<img src='display_photo.php?id=" . $userId . "' alt='Фото пользователя' style='max-width:400px; max-height:400px;'>";
    echo "<h1>";
    echo "<p>Имя: " . ($row["name"]) . "</p>" ;
    echo "<p>Возраст: " . ($row["age"]) . "</p>" ;
    echo "</h1>";

    echo "<a href='list.php'><button>Назад</button></a>";

} catch (\PDOException $e) {
    echo $e->getMessage();
}
