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
$cid = $_GET["cid"];
$queryo = "SELECT * FROM orders WHERE cid = $cid AND active = 1";
$queryc = "SELECT * FROM client WHERE cid = $cid"; 
$resulto = mysqli_query($conn, $queryo);
$resultc = mysqli_query($conn, $queryc);

if (mysqli_num_rows($resultc) > 0) {
    while($rowc = mysqli_fetch_assoc($resultc)){
    ?>
            <h2>Client Details:</h2><br>
            <h3>Name: <?php echo $rowc['name'];?></h3> 
            <h3>Number: <?php echo $rowc['number'];?></h3> 
            <h3>Address: <?php echo $rowc['address'];?></h3> 
            <h3>Email: <?php echo $rowc['email'];?></h3>

    
    <?php
    }
}
?>
<center>

    <h1>Order Details</h1>
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
    $discount=$rowo['discount'];
    $price = $calc;
    $total_price  = $price - $discount ;
    }

    // Display the total_price after the loop
    echo "<tr><td colspan='3'>Price</td><td>$price</td></tr>";
    echo "<tr><td colspan='3'>Discount applied</td><td>$discount</td></tr>";
    echo "<tr><td colspan='3'>Total Price</td><td>$total_price</td></tr>";

    ?>
</table>
<a class="button-28" href="ri.php?cid=<?php echo $cid?>">View Removed Item</a>
<button class="button-29" onclick="window.print()">Print this page</button>
<br><br><br>
<?php include_once('footer.php')?>
</body>
</html>