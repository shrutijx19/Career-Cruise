<?php

$host = "localhost";
$dbname = "login_db";
$user = "root";
$password = "";

$mysqli = new mysqli(
    hostname: $host,
    username: $user,
    password: $password,
    database: $dbname
);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

return $mysqli;
