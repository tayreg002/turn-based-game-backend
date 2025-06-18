<?php
const HOST = 'db-mysql';
const DBNAME = 'my_db_for_game';
const USER = 'root';
const PASSWORD = 'My_password_ROOT_7890';

try {
    $db = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASSWORD);
    $stmt = $db->query('SELECT * FROM user');
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if (empty($result)) {
        header("Location: index.php");
    }else{
        if($result = $db->query("SELECT * FROM user")) {
            echo "<table border='1'>";
            echo "<thead><tr><th>Имя</th><th>Возраст</th></tr></thead>";
            echo "<tbody>";
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row['name'] . '</td>';
                echo "<td>" . $row['age'] . '</td>';
                echo "<td><form action='delete.php' method='post'>
                        <input type='hidden' name='id' value='" . $row["id"] . "' />
                        <input type='submit' value='Удалить'>
                </form></td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            echo "<a href='index.php'><button>Назад</button></a>";
        }else {
            echo"Ошибка: " .$db->error;
        }
    }
}catch (PDOException $e){
    echo $e->getMessage();
}