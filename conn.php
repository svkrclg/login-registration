<?php

$conn = new mysqli('localhost', 'id2427679_svkrclg', 'happyacct', 'id2427679_user_list');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>