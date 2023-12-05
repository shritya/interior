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
        UPDATE CLIENT
    </h1>
    </center>
    <?php
    if (isset($_GET["cid"])) {
    // Retrieve the client_id from the URL
    $client_id = $_GET["cid"];
    $query = "SELECT * FROM client WHERE cid = $client_id";
    $exec = mysqli_query($conn, $query);
    $result = $exec;
    // var_dump($exec);
    if(mysqli_num_rows($result) > 0){
        ?>
    <?php
    // Fetch data and display it in the table
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <section class="quotationnc">
            <form class="ncform" action="ucprocess.php?cid=<?php echo $row['cid'];?>" method="post">
            <label for="name">Name:</label>
            <input class="input-style" type="text" name="name" value= "<?php echo $row['name'];?>" id="">
        <label for="number">Number:</label>
            
            <input class="input-style" type="text" name="number" value= "<?php echo $row['number'];?>" id="">
        <label for="address">Address:</label>
            
            <input class="input-style" type="text" name="address" value= "<?php echo $row['address'];?>" id="">
        <label for="email">Email:</label>
            
            <input class="input-style" type="email" name="email" value= "<?php echo $row['email'];?>" id="">
            <input class="button-27" type="submit" value="Update"></td>
            </form>
        </section>
        
        <?php
    }
    ?>
     <?php }   
 else {
     echo "Client ID not provided in the URL.";
    }    // Handle the case when client_id is not provided in the URL
}
?>

    <br><br><br><br>
    <?php include_once('footer.php')?>
</body>
</html>