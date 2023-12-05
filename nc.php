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
    <center>

    <h1 class="mtitle">
        NEW CLIENT
    </h1>
    </center>

    <section class="quotationnc">

    <form class="ncform" action="ncprocess.php" method="post">
        <label for="name">Name:</label>
        <input class="input-style" type="text" name="name" required>

        <label for="number">Number:</label>
        <input class="input-style" type="number" name="number" required>

        <label for="address">Address:</label>
        <input class="input-style" type="text" name="address" required>

        <label for="email">Email:</label>
        <input class="input-style" type="email" name="email" required>
        <!-- HTML !-->


        <input class="button-27"  type="submit" value="Submit">
    </form>
    </section>

    <br><br><br><br>
    <?php include_once('footer.php')?>
</body>
</html>