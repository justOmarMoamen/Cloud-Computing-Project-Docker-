<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if username or email already exists
    $checkQuery = "SELECT * FROM users WHERE username = '$username'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        // User or email already exists, redirect back to signup with error message
        header("Location: signup.html?error=1");
    } else {
        // Insert new user into database
        $insertQuery = "INSERT INTO users (username, pass) VALUES ('$username', '$password')";
        if ($conn->query($insertQuery) === TRUE) {
            // User registered successfully, redirect to login page
            header("Location: login.html");
        } else {
            // Error inserting user, redirect back to signup with error message
            header("Location: signup.html?error=2");
        }
    }
}
$conn->close();
?>
