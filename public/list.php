<?php
declare(strict_types=1);

namespace App;

require ('Connection.php');

try {
    $db = Connection::getDbConnection();
    $stmt = $db->query('SELECT * FROM user');
    $result = $stmt->fetch(\PDO::FETCH_ASSOC);
    if (empty($result)) {
        header("Location: index.html");
        exit();
    }

    echo "<form action='delete.php' method='post'>";
    echo "<table border='1'>";
    echo "<thead><tr><th>Имя</th><th>Возраст</th><th>Фото</th><th>Загрузить фото</th><th>Удалить</th></tr></thead>";
    echo "<tbody>";

    $result = $db->query("SELECT id, name, age FROM user");

    while ($row = $result->fetch(\PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . ($row['name']) . '</td>';
        echo "<td>" . ($row['age']) . '</td>';

        echo "<td>";
        $userId = ($row['id']);
        echo "<a href=show.php?id=$userId>";
        echo "<img src='display_photo.php?id=" . $userId . "' alt='Фото пользователя' style='max-width:100px; max-height:100px;'>";
        echo "</a>";
        echo "</td>";

        echo "<td>";
        echo "<form action='uploads.php' method='post' enctype='multipart/form-data' >";
        echo "<input type='file' name='filename' accept='image/jpeg, image/png, image/jpg' />";
        echo "<input type='hidden' name='user_id' value='" . ($row['id']) . "'>";
        echo "<input type='submit' value='Загрузить фото'>";
        echo "</form>";

        echo "</td>";


        echo "<td>";
        echo "<input type='checkbox' name='id[]' value='". ($row['id']) ."'>";
        echo "</form>";
        echo "</td>";

        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";

    echo "<a href='delete.php'><button >Удалить выбранных</button></a>";


    echo "<a href='index.html'><button type='button'>Назад</button></a>";

} catch (\PDOException $e) {
    echo "Ошибка базы данных: " . $e->getMessage();
} catch (\Exception $e) {
    echo "Неизвестная ошибка: " . $e->getMessage();
}
