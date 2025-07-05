<?php
declare(strict_types=1);

namespace App;

require ('Connection.php');

if(isset($_POST['id']))
{
    try {
        $db = Connection::getDbConnection();

        if ($_POST['id'] !== []) {
            $idDelete = $_POST['id'];

            $placeholders = implode(',', array_fill(0, count($idDelete), '?'));

            $sql =  "DELETE FROM user WHERE id IN ($placeholders)";
            $stmt = $db->prepare($sql);

            $stmt->execute($idDelete);
            header('Location: list.php');
            exit();
        }


    } catch (\PDOException $e){
        echo $e->getMessage();
    }
}
