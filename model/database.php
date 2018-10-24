<?php

$DB_HOST = 'localhost';
$DB_USERNAME = 'root';
$DB_PASSWORD = '';
$DB_NAME = 'bookstore';

$mysqli = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

if ($mysqli->connect_error) {
    die("Database Connection Error: " . $mysqli->connect_error);
}