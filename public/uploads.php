<?php
declare(strict_types=1);

try {
    $userId = $_POST['user_id'];
    $filetype = $_FILES['filename']['type'];
    $typeRestrictions = ['image/png', 'image/jpeg', 'image/jpg'];
    if (!in_array($filetype, $typeRestrictions)) {
        die('Недопустимый тип файла.');
    }

    $fileExtension = pathinfo($_FILES['filename']['name'], PATHINFO_EXTENSION);

    $fileNameToSave = $userId . '.' . $fileExtension;

    $uploadDir ='/app/public/uploads/';
    $filePath = $uploadDir . $fileNameToSave;

    if (move_uploaded_file($_FILES['filename']['tmp_name'], $filePath)) {
            header('Location: list.php');
            exit();
    } else {
        die('Не удалось переместить загруженный файл в основную папку.');
    }

} catch (Exception $e) {
    echo "Ошибка: " . $e->getMessage();
}