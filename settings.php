<?php
$host = 'localhost';
$user = 'root';
$password = 'root';
$db_name = 'news';
$mysqli = new mysqli($host, $user, $password, $db_name);

if ($mysqli->connect_error) {
    die('Ошибка подключения (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}