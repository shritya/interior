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
    <?php

if (isset($_GET["cid"])) {
    $client_id = $_GET["cid"];
    $query = "SELECT * FROM client WHERE cid = $client_id";
    $queryo = "SELECT * FROM orders WHERE cid = $client_id AND active = 1"; // Updated query to fetch orders for the specific client

    $result = mysqli_query($conn, $query);
    $resulto = mysqli_query($conn, $queryo);

    if (mysqli_num_rows($result) > 0) {
        ?>
        <table>
            <tr>
                <th>Name</th>
                <th>Number</th>
                <th>Address</th>
                <th>Email</th>
            </tr>
            <?php
            // Fetch data and display it in the table
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><label for=""><?php echo isset($row['name']) ? $row['name'] : ''; ?></label></td>
                    <td><label for=""><?php echo isset($row['number']) ? $row['number'] : ''; ?></label></td>
                    <td><label for=""><?php echo isset($row['address']) ? $row['address'] : ''; ?></label></td>
                </tr>
            </table>
                <br>
            <table>
                <tr>
                    <th>Category</th>
                    <th>Product</th>
                    <th>Dimension(HxBxD)</th>
                    <th>Price</th>
                    <th>Remove Item</th>
                </tr>
                <?php
                // Fetch orders data and display each product
                while ($rowo = mysqli_fetch_assoc($resulto)) {
                    ?>
                    <tr>
                        <td>
                            <label><?php echo isset($rowo['category']) ? $rowo['category'] : ''; ?></label>
                        </td>
                        <td>
                            
                            <!-- Adjust this part based on your subcategory data -->
                            <select name="subcategory[]">
                                <?php
                                $fc = "SELECT * FROM subcategory";
                                $fcexec = mysqli_query($conn, $fc);
                                while ($opt = mysqli_fetch_assoc($fcexec)) {
                                    $selected = ($opt['name'] == $rowo['subcategory']) ? 'selected' : '';
                                    echo "<option $selected>" . $opt['name'] . "</option>";
                                }
                                ?>
                            </select>
                        </td>
                        <td><label for=""><?php echo isset($rowo['height']) ? $rowo['height'] : ''; ?></label>
                        <label for=""><?php echo isset($rowo['breadth']) ? $rowo['breadth'] : ''; ?></label>
                        <label for=""><?php echo isset($rowo['density']) ? $rowo['density'] : ''; ?></label>
                        <td>

                            <label for=""><?php echo isset($rowo['price']) ? $rowo['price'] : ''; ?></label>
                        </td>
                            
                        
                        <td><form action="removeProduct.php" method="post">
            <input type="hidden" name="orderId" value="<?php echo $rowo['oid']; ?>">
            <input class="button-28" type="submit" value="Remove">
        </form></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <?php
        }
    } else {
        echo "Client ID not provided in the URL.";
    }
}
echo '<br><br><br>';
include_once('footer.php')
?>
</body>
