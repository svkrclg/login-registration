<?php

$conn = new mysqli('your_host', 'username', 'password', 'databasename');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>
