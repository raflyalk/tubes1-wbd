<?php

$DB_HOST = 'localhost';
$DB_USERNAME = 'root';
$DB_PASSWORD = '12345678';
$DB_NAME = 'bookstore';

$dbConnection = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

if ($dbConnection->connect_error) {
  die("Database Connection Error: " . $dbConnection->connect_error);
}
