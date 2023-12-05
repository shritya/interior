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

    <!-- <h1 class="mtitle">
        Client Details
    </h1> -->
    </center>
    <section class="quotationec">

    <?php
    $query = "SELECT * FROM CLIENT;";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0){
        ?>
        <table>
            <tr>
                <th>Name</th>
                <th>Number</th>
                <th>Address</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['number'];?></td>
                <td><?php echo $row['address'];?></td>
                <td><?php echo $row['email'];?></td>
                <td><a class="button-28" href="mq.php?cid=<?php echo $row['cid']?>">Make Quotation</a><a class="button-28" href="eq.php?cid=<?php echo $row['cid']?>">Edit Quotation</a><a class="button-28" href="vq.php?cid=<?php echo $row['cid']?>">View Quotation</a><a  class="button-28" href="uc.php?cid=<?php echo $row['cid']; ?>">Update Client</a></td>
            </tr>
            <?php
        }
        ?>
        </table>
        <?php
    } else {
        echo "No data present";
    }
    mysqli_close($conn);
    ?>
    
   
    </section>

    <br><br><br><br>
    <?php include_once('footer.php')?>
</body>
</html>