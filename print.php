
<?php
// Connect to the MySQL database
$conn = mysqli_connect("localhost", "username", "password", "database_name");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
// ... (other form fields)

// Insert data into the database
$sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
if (mysqli_query($conn, $sql)) {
    // Redirect to the bill generation page
    header("Location: generate_bill.php?id=" . mysqli_insert_id($conn)); // Pass the newly inserted user ID as a parameter
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
php
<?php
// Connect to the MySQL database
$conn = mysqli_connect("localhost", "username", "password", "database_name");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the user ID from the URL parameter
$id = $_GET['id'];

// Retrieve user data from the database
$sql = "SELECT * FROM users WHERE id = '$id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    // Generate bill/receipt HTML content
    $billContent = "<h1>Bill/Receipt</h1>";
    $billContent .= "<p>Name: " . $row['name'] . "</p>";
    $billContent .= "<p>Email: " . $row['email'] . "</p>";
    // ... (other form fields)

    // Print the bill/receipt
    echo $billContent;
} else {
    echo "User not found.";
}

// Close the database connection
mysqli_close($conn);
?>

html
<form action="process_form.php" method="post">
    <!-- Form fields -->
    <input type="text" name="name" placeholder="Name">
    <input type="email" name="email" placeholder="Email">
    <!-- ... (other form fields) -->
    
    <button type="submit">Submit</button>
</form>
