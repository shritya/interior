<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php"); // Redirect unauthorized users back to login page
    exit();
}
require('./auth.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['orderId'])) {
        $orderId = mysqli_real_escape_string($conn, $_POST['orderId']);

        // Update the active status to 0 for the specified order
        $deleteQuery = "UPDATE orders SET active = 0 WHERE oid = $orderId";
        $deleteResult = mysqli_query($conn, $deleteQuery);

        if ($deleteResult) {
            echo "Product removed successfully.";
        } else {
            echo "Error removing product: " . mysqli_error($conn);
        }
    } else {
        echo "Order ID not provided.";
    }
} else {
    echo "Invalid request method.";
}
?>
