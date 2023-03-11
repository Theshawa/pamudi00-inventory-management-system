<?php

$host_name = "localhost";
$user_name = "root";
$password = "";
$db = "salesachieved";

$conn = new mysqli(hostname: $host_name, username: $user_name, password: $password, database: $db);

if ($conn->connect_error) {
    die("Unable to connect to database due to an error: " . $conn->connect_error);
}
