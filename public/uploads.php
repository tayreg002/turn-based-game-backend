<?php
require 'const.php';

try {
    $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME, USER, PASSWORD);


    $fileContent = file_get_contents($_FILES['filename']['tmp_name']);

    $sql = 'UPDATE user SET photo = :photo_content WHERE id = :id';
    $stmt = $db->prepare($sql);


    $stmt->bindParam(':photo_content', $fileContent, PDO::PARAM_LOB);
    $stmt->bindParam(':id', $_POST['user_id'], PDO::PARAM_INT);


    $stmt->execute();


    header('Location: list.php');
    exit();

} catch (PDOException $e) {
    echo "Ошибка базы данных: " . $e->getMessage();
} catch (Exception $e) {
    echo "Ошибка: " . $e->getMessage();
}