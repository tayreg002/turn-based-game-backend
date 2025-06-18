CREATE DATABASE IF NOT EXISTS my_db_for_game;

USE my_db_for_game;

CREATE TABLE user
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name varchar(100),
    age INT
);

