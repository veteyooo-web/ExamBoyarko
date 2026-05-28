<?php
$host = 'MySQL-8.4';
$port = 3306;
$user = 'root';
$pass = '';
$dbName = 'techforge';
$mysqli = new mysqli($host, $user, $pass, $dbName, $port);
$mysqli->set_charset('utf8mb4');
if ($mysqli->connect_error) {
    exit('Ошибка подключения к базе данных');
}
