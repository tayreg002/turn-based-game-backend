<?php
declare(strict_types=1);

require("const.php");
use app\const\database;
if(isset($_POST["id"]))
{
    try {
        $db = new PDO('mysql:host='.database::HOST.';dbname='.database::DBNAME,database::USER,database::PASSWORD);

        if ($_POST["id"] !== []) {
            $idDelete = $_POST["id"];

            $placeholders = implode(',', array_fill(0, count($idDelete), '?'));

            $sql =  "DELETE FROM user WHERE id IN ($placeholders)";
            $stmt = $db->prepare($sql);

            $stmt->execute($idDelete);
            header('Location: list.php');
            exit();
        }


    } catch (PDOException $e){
        echo $e->getMessage();
    }
}

