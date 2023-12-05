<?php

$host = "localhost";
$username = "root";
$password = '';
$database = "interiordb";

$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    // Uncomment the line below for debugging purposes
    // echo "Connected successfully";
}
?>
