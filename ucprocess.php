<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php"); // Redirect unauthorized users back to login page
    exit();
}
require('./auth.php');
if (isset($_GET["cid"])) {
    $client_id = $_GET["cid"];
    $name = $_POST['name'];
    $number = $_POST['number'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $query = "UPDATE client SET name = '$name', number = '$number', address = '$address', email = '$email' WHERE client.cid = $client_id";
    $exec = mysqli_query($conn, $query);
    // var_dump($number);
    header('Location: ec.php');
} else {
     echo "Error";
    }    // Handle the case when client_id is not provided in the URL

?>

