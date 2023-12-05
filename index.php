<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php"); // Redirect unauthorized users back to login page
    exit();
}
include("../auth.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Quotation | Desire Interior</title>
</head>
<body>
    <!-- header here -->
    <?php 
    include("header.php")
    ?>
    <br>
    <section class="quotation">
        <div class="card">
        <a href="nc.php">New Client</a>

    </div>
    <div class="card">
        <a href="ec.php">Existing Client</a>

    </div>
    
    </section>
    <br><br><br><br>
    <?php include_once('footer.php')?>
</body>
</html>