<?php
require("const.php");

try {
    $db = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASSWORD);

    if (isset($_POST["username"]) && isset($_POST["user_age"])) {
        $sql = "INSERT INTO user (name, age) VALUES (:username, :user_age)";

        $stmt = $db->prepare($sql);

        $stmt->bindValue(":username", $_POST["username"]);
        $stmt->bindValue(":user_age", $_POST["user_age"]);

        $stmt->execute();
        header('Location: list.php');

    }
    header('Location: list.php');
} catch (PDOException $e){
    echo $e->getMessage();
}