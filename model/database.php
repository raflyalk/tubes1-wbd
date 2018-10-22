<?php

$DB_HOST = 'localhost';
$DB_USERNAME = 'root';
$DB_PASSWORD = '12345678';
$DB_NAME = 'bookstore';

$mysql = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

if ($mysql->connect_error) {
    die("Database Connection Error: " . $mysql->connect_error);
} else {
    error_log("db connection success");
}

return $mysql;


