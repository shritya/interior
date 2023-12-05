<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php"); // Redirect unauthorized users back to login page
    exit();
}
require('./auth.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["cid"])) {
    $client_id = $_GET["cid"];
    print_r($_POST);


    // Check if the form fields are set and not empty
    if (isset($_POST['category']) && is_array($_POST['category'])) {
        // Assuming that the form fields are arrays, e.g., category[], subcategory[], height[], breadth[], density[], price[]
        $categories = $_POST['category'];
        $subcategories = $_POST['subcategory'];
        $heights = $_POST['height'];
        $breadths = $_POST['breadth'];
        $densities = $_POST['density'];
        $prices = $_POST['price'];

        // Iterate through the submitted data and update the orders table
        for ($i = 0; $i < count($categories); $i++) {
            $category = mysqli_real_escape_string($conn, $categories[$i]);
            $subcategory = mysqli_real_escape_string($conn, $subcategories[$i]);
            $height = mysqli_real_escape_string($conn, $heights[$i]);
            $breadth = mysqli_real_escape_string($conn, $breadths[$i]);
            $density = mysqli_real_escape_string($conn, $densities[$i]);
            $price = mysqli_real_escape_string($conn, $prices[$i]);

            // Assuming that you have a unique identifier for each order, replace 'oid' with your actual identifier
            $updateQuery = "UPDATE orders SET 
                category = '$category', 
                subcategory = '$subcategory', 
                height = '$height', 
                breadth = '$breadth', 
                density = '$density', 
                price = '$price' 
                WHERE cid = $client_id AND oid = $i + 1"; // Adjust the WHERE clause based on your table structure

            // For debugging purposes, echo the query
            echo "Query: $updateQuery <br>";

            $updateResult = mysqli_query($conn, $updateQuery);

            if (!$updateResult) {
                echo "Error updating order $i: " . mysqli_error($conn) . "<br>";
            } else {
                echo "Order $i updated successfully <br>";
            }
        }

        // Redirect to a success page or handle as needed
        // header("Location: ec.php");
    } else {
        echo "Form data not set or empty.";
    }
} else {
    echo "Invalid request";
}
?>
