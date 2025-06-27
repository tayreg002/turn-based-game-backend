<?php

require("const.php");

if(isset($_POST["id"]))
{
    try {
        $db = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if (is_array($_POST["id"]) && !empty($_POST["id"])){
            $id_delete = $_POST["id"];

            $placeholders = implode(',', array_fill(0, count($id_delete), '?'));

            $sql =  "DELETE FROM user WHERE id IN ($placeholders)";
            $stmt = $db->prepare($sql);

            $stmt->execute(array_values($id_delete));
            header('Location: list.php');
        }


    } catch (PDOException $e){
        echo $e->getMessage();
    }
}

