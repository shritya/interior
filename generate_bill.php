
<?php
// Connect to the MySQL database
$conn = mysqli_connect('localhost', 'root', '', 'client_database');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the user ID from the URL parameter
$id = $_GET['id'];

// Retrieve user data from the database
$sql = "SELECT * FROM clients WHERE id = '$id'";
$result = mysqli_query($conn, $sql);

// Use $row to display the user's bill information


if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    
    // Generate bill/receipt HTML content
    $billContent = "<h1>Bill/Receipt</h1>";
    $billContent .= "<p>Name: " . $row['name'] . "</p>";
    $billContent .= "<p>Number: " . $row['number'] . "</p>";
    $billContent .= "<p>address: " . $row['address'] . "</p>";
    $billContent .= "<p>Email: " . $row['email'] . "</p>";

    // ... (other form fields)
    // print();
    // Print the bill/receipt
    echo $billContent;
} else {
    echo "User not found.";
}
// window.print();
// Close the database connection
mysqli_close($conn);
?>
<html>
    <link rel="stylesheet" href="style.css">
<button class="button" id="printButton" onclick="printQuotation()">Print Quotation</button>
    <script>
        function printQuotation() {
            window.print();
        }
    </script>
</html>
