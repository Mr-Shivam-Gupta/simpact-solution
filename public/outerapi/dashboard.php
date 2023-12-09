<?php
session_start();
$username = $_SESSION["username"];

if (isset($_SESSION["username"])) {
    // Get the username from the session
    $username = $_SESSION["username"];

    // Now you can use $username as needed
    echo "Welcome, $username!";
} else {
    echo 'Username is not set';
    // If the username is not set, redirect to the login page or handle accordingly
    // header("Location: login.php");
    // exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome, <?php echo $username; ?>!</h1>

    <!-- You can use the value to pre-fill an input field on this page -->
    <form>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo $username; ?>" readonly>
    </form>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <!-- Your dashboard content goes here -->

    <p>Welcome to the dashboard!</p>

    <!-- Display the dynamic link to register.php with $userid included in the URL -->
    <a href="<?php echo $link."/".$username; ?>">Register Now</a>
    <a href="logout.php">Logout</a>
</body>
</html>
