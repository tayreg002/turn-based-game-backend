<?php
declare(strict_types=1);

namespace App;

require ('Connection.php');

try {
    $db = Connection::getDbConnection();

    if (isset($_POST["username"]) && isset($_POST["user_age"])) {
        $sql = "INSERT INTO user (name, age) VALUES (:username, :user_age)";

        $stmt = $db->prepare($sql);

        $stmt->bindValue(":username", $_POST["username"]);
        $stmt->bindValue(":user_age", $_POST["user_age"]);

        $stmt->execute();
        header('Location: list.php');
        exit();
    }
    header('Location: list.php');
} catch (\PDOException $e) {
    echo $e->getMessage();
}
