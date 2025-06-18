<?php

const HOST = 'db-mysql';
const DBNAME = 'my_db_for_game';
const USER = 'root';
const PASSWORD = 'My_password_ROOT_7890';



if(isset($_POST["id"]))
{
    try {
        $db = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASSWORD);
        $sql = 'DELETE FROM user WHERE id=' . $db->quote($_POST["id"]);
        $db->exec($sql);
        header("Location: user.php");
    }catch (PDOException $e){
        echo $e->getMessage();
    }
}
?>