<?php
// Настроить composer
// Подключить mysql в docker. ГОТОВО!
// Сделать форму html которая требует от пользователя его имя и возраст ГОТОВО!
// Сделать БД my_db_for_game ГОТОВО!
// Создать таблицу user с mysql ГОТОВО!
// Добавить поля в таблицу: name|age ГОТОВО!
// То что ввел пользователь в форме сохранить в таблицу user с помощью PDO ГОТОВО!
// На странице сделать кнопку по нажатию которой прочитаются данные их БД и отобразятся ниже формы ГОТОВО!

// Узнать про супер глобальные переменные https://www.php.net/manual/ru/reserved.variables.post.php
// Прочитать про функцию isset и посмотреть примеры
// Прочитать про sql инекция. Подготовить пример
// Прочитать про уязвимость CSRF
// Прочитать про блок try catch
// Прочитать https://hmarketing.ru/blog/php/shablony-razrabotki-mvc-i-mvp/#:~:text=MVP%20%E2%80%94%20%D1%8D%D1%82%D0%BE%20%D0%BF%D0%B0%D1%82%D1%82%D0%B5%D1%80%D0%BD%20%D0%BF%D1%80%D0%BE%D0%B3%D1%80%D0%B0%D0%BC%D0%BC%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D1%8F%20%D0%B3%D1%80%D0%B0%D1%84%D0%B8%D1%87%D0%B5%D1%81%D0%BA%D0%B8%D1%85,%D0%BD%D0%B0%20%D1%8D%D0%BA%D1%80%D0%B0%D0%BD%20%D0%B2%20%D0%BD%D1%83%D0%B6%D0%BD%D0%BE%D0%BC%20%D0%B2%D0%B8%D0%B4%D0%B5
// Разобраться с буфером обмена
// Разеденить форму html и php скрипт
// Сделать еще один скрипт. Сделать так чтобы мы могли в таблице чтобы мы могли очищать базу с помощью галачки. После удаления последнего пользователся скрипт должен вернуть меня на index.php



const HOST = 'db-mysql';
const DBNAME = 'my_db_for_game';
const USER = 'root';
const PASSWORD = 'My_password_ROOT_7890';

try {
    $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME,USER,PASSWORD);

    if (isset($_POST["show_data"])) {
        header('Location: user.php');
        exit;
    } else if (isset($_POST["username"]) && isset($_POST["userage"])) {
        $sql = "INSERT INTO user (name, age) VALUES (:username, :userage)";

        $stmt = $db->prepare($sql);

        $stmt->bindValue(":username", $_POST["username"]);
        $stmt->bindValue(":userage", $_POST["userage"]);

        $stmt->execute();
        header('Location: user.php');

    }


}catch (PDOException $e){
    echo $e->getMessage();
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post">
<label for="name">Имя</label>
<input type="text" id="name" name="username"  placeholder="Ваше имя">

<label for="age">Возраст:</label>
<input type="number" id="age" name="userage" min="1" max="100" placeholder="Ваш возраст">


<input type="submit" value="Добавить">
<input type="submit" name="show_data" value="Вывести данные">
</form>
</body>
</html>

