<?php
// Database connection credentials
$servername = "db"; // Use the service name defined in Docker Compose
$username = "user"; // Database username (change as needed)
$password = "password"; // Database password (change as needed)
$dbname = "my_database"; // Database name (change as needed)

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $age = $_POST["age"];
    $cgpa = $_POST["cgpa"];
    $id = $_POST["students_ID"];

    // SQL to insert data into the database
    $sql = "INSERT INTO Students (name, age, cgpa, students_ID) VALUES ('$name', '$age', '$cgpa', '$id')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
