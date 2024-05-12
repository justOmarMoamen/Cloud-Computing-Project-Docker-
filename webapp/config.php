<?php
$servername = "db"; // Use the service name defined in docker-compose.yml
$username = "root"; // Your MySQL username
$password = "root"; // Your MySQL password
$dbname = "my_database"; // Your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully to the database<br>";
}
?>