<?php
session_start();
include('auth.php'); // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE aname='$username' AND apass='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['loggedin'] = true;
        header("Location: index.php"); // Redirect to admin panel on successful login
        exit();
    } else {
        echo "Invalid username or password";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include_once('header.php')?>
    <center>

        <h2>Login</h2>
    </center>
    <section class="quotationnc">

    <form class="ncform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label>Username:</label>
        <input class="input-style" type="text" name="username"><br><br>
        <label>Password:</label>
        <input class="input-style" type="password" name="password"><br><br>
        <input class="button-27" type="submit" value="Login">
    </form>
    </section>
    <br><br><br>
    <?php include_once('footer.php')?>
</body>
</html>
