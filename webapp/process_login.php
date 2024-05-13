<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND pass = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // User authenticated, redirect to options page
        $_SESSION['username'] = $username;
        header("Location: options.php");
    } else {
        // Authentication failed, redirect back to login with error message
        header("Location: index.html?error=1");
    }
}
$conn->close();
?>
