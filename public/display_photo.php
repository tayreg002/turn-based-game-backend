<?php

require "const.php";

try {
    $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME,USER,PASSWORD);
    $stmt = $db->query('SELECT * FROM photo');
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);




} catch ( PDOException $e){
    echo $e->getMessage();
}
