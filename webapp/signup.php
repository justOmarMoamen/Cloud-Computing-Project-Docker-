<?php
include 'config.php'; // Include the database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the signup form
    $name = $_POST["name"];
    $age = $_POST["age"];
    $cgpa = $_POST["cgpa"];
    $student_id = $_POST["student_id"];

    // SQL to insert user data into the students table
    $sql = "INSERT INTO students (name, age, cgpa, student_id) VALUES ('$name', $age, $cgpa, '$student_id')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close(); // Close the database connection
?>
