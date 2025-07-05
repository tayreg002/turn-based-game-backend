<?php
declare(strict_types=1);

try {
    $directory = 'uploads/';
    $typeRestrictions = ['png', 'jpeg', 'jpg'];
    $path = '';
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

foreach ($typeRestrictions as $type) {
    $pathOutput = $_SERVER['DOCUMENT_ROOT'] . '/' . $directory . $id . '.' . $type;
    if (file_exists($pathOutput)) {
        $path = $pathOutput;
        $imageFound = true;
        break;
    }
}
    readfile($path);

} catch (PDOException $e) {
    echo $e->getMessage();
}

