<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php"); // Redirect unauthorized users back to login page
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Quotation | Desire Interior</title>
</head>
<header>
        <nav>
            <img src="http://desireinteriors.in/wp-content/uploads/2020/02/desire-interior-logo.png" alt="logo" class="logo">
            <!-- <ul>
                <li><a href="">Link1</a></li>
                <li><a href="">Link1</a></li>
                <li><a href="">Link1</a></li>
            </ul> -->
        </nav>
    </header>
<body>
<?php
require("../auth.php");
$cid = $_GET["cid"];
$queryo = "SELECT * FROM orders WHERE cid = $cid AND active = 0";
$queryc = "SELECT * FROM client WHERE cid = $cid"; 
$resulto = mysqli_query($conn, $queryo);
$resultc = mysqli_query($conn, $queryc);

if (mysqli_num_rows($resultc) > 0) {
    while($rowc = mysqli_fetch_assoc($resultc)){
    ?>
    <br><br><br>
    <center><h1>Client Details</h1></center>
    <table>
        <tr>
            <th>Name</th>
            <th>Number</th>
            <th>Address</th>
        </tr>
        <tr>
            <td><?php echo $rowc['name'];?></td>
            <td><?php echo $rowc['number'];?></td>
            <td><?php echo $rowc['address'];?></td>
        </tr>
    </table>
    
    <?php
    }
}
?>
<br><br><br>
<center>

    <h1>Removed Items</h1>
</center>
<table>
    <tr>
        <th>Category</th>
        <th>Sub-Category</th>
        <th>Measurement (hxbxd)</th>
        <th>Price</th>
    </tr>

    <?php 
    $total_price = 0; // Initialize total_price outside the loop
    while ($rowo = mysqli_fetch_assoc($resulto)) {
    ?>
    <tr>
        <td><?php echo $rowo['category'];?></td>
        <td><?php echo $rowo['subcategory'];?></td>
        <td><?php echo $rowo['height'];?>x<?php echo $rowo['breadth'];?>x<?php echo $rowo['density'];?></td>
        <td><?php echo $rowo['price'];?></td>
    </tr>
    <?php
    $calc = $rowo['price'] * $rowo['height'] * $rowo['breadth'] * $rowo['density'];
    $total_price += $calc;
    }

    // Display the total_price after the loop
    echo "<tr><td colspan='3'>Total Price</td><td>$total_price</td></tr>";
    ?>
</table>
<br><br><br><br><br><br>
<?php include_once('footer.php')?>
</body>
</html>
