<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php"); // Redirect unauthorized users back to login page
    exit();
}
require('./auth.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve client ID from the form
    $client_id = $_GET["cid"];

    // Insert data into the orders table
    $insertOrderQuery = "INSERT INTO orders (cid, category, subcategory, height, breadth, density, price, discount) VALUES ";
    // Loop through the submitted data
    for ($i = 0; $i < count($_POST['category']); $i++) {
        $category = isset($_POST['category'][$i]) ? mysqli_real_escape_string($conn, $_POST['category'][$i]) : '';
        $subcategory = isset($_POST['subcategory'][$i]) ? mysqli_real_escape_string($conn, $_POST['subcategory'][$i]) : '';
        $height = isset($_POST['height'][$i]) ? mysqli_real_escape_string($conn, $_POST['height'][$i]) : '';
        $breadth = isset($_POST['breadth'][$i]) ? mysqli_real_escape_string($conn, $_POST['breadth'][$i]) : '';
        $density = isset($_POST['density'][$i]) ? mysqli_real_escape_string($conn, $_POST['density'][$i]) : '';
        $price = isset($_POST['price'][$i]) ? mysqli_real_escape_string($conn, $_POST['price'][$i]) : '';
        $discount = isset($_POST['discount'][$i]) ? mysqli_real_escape_string($conn, $_POST['discount'][$i]) : '';
        
        // Add values to the query
        $insertOrderQuery .= "('$client_id', '$category', '$subcategory', '$height', '$breadth', '$density', '$price', '$discount'),";
    }

    // Remove the trailing comma from the query
    $insertOrderQuery = rtrim($insertOrderQuery, ",");

    // Perform the insertion
    $insertResult = mysqli_query($conn, $insertOrderQuery);

    if ($insertResult) {
        header("Location: ec.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Form not submitted!";
}
?>
