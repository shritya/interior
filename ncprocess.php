<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php"); // Redirect unauthorized users back to login page
    exit();
}
require("./auth.php");
$name = $_POST["name"];
$number = $_POST["number"];
$address = $_POST["address"];
$email = $_POST["email"];
$query = "INSERT INTO client(name, number, address, email)
            VALUES ('$name', '$number', '$address','$email')";
$exec = mysqli_query($conn, $query);
mysqli_close($conn);
header('Location: ec.php')
?>
