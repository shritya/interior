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
        MAKE QUOTATION
    </h1>
    </center>
    <section class="quotationnc">
    <?php
if (isset($_GET["cid"])) {
    $client_id = $_GET["cid"];
    $query = "SELECT * FROM client WHERE client.cid = $client_id";
    $exec = mysqli_query($conn, $query);
    $result = $exec;
    if(mysqli_num_rows($result) > 0){
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
            <td><label for=""><?php echo $row['name'];?></label></td>
            <td><label for=""><?php echo $row['number'];?></label></td>
            <td><label for=""><?php echo $row['address'];?></label></td>
        </tr>
    </table>

        <table>
        <tr>
            <th>Category</th>
            <th>Product</th>
            <th>Dimension</th>
            <th>Price</th>
        </tr>
        <tr id="living">
            <form action="mqprocess.php?cid=<?php echo $client_id;?>" method="post">

            <td>
                <input type="text" name="category[]" placeholder="Eg. living room">
            </td>
            <td>
                <select value="subcategory[]">
                    <?php 
                    $fc = "SELECT * FROM subcategory";
                    $fcexec = mysqli_query($conn, $fc);
                    while ($opt = mysqli_fetch_assoc($fcexec)) {
                        echo "<option>" . $opt['name'] . "</option>";
                    }
                    ?>
                </select>
            </td>
            <td><input type="text" name="height[]" placeholder="Height">
            <input type="text" name="breadth[]" placeholder="Breadth">
            <input type="text" name="density[]" placeholder="Density"></td>
            <td><input type="text" name="price[]" placeholder="Per unit price">
            <input type="text" name="discount[]" placeholder="Discount"></td>
            </tr>

            <?php
    }
    ?>
    </table>

    <script>
        function cloneLivingRow() {
            // Clone the living row
            var livingRow = document.getElementById('living').cloneNode(true);

            // Clear the input values in the cloned row
            var inputs = livingRow.getElementsByTagName('input');
            for (var i = 0; i < inputs.length; i++) {
                inputs[i].value = '';
            }

            // Append the cloned row to the table
            document.getElementById('living').parentNode.appendChild(livingRow);
        }
    </script>

 <?php }   
 else {
     echo "Client ID not provided in the URL.";
    }    // Handle the case when client_id is not provided in the URL
}
?>  <br>
<br>

<button class="button-29" type="button" onclick="cloneLivingRow()">Add Another</button>
<input class="button-29" type="submit" value="Make Quotation">
</form>
</section>



    <br><br><br><br>
    <?php include_once('footer.php')?>
</body>
</html>
