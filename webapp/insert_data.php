<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
</head>
<body>
    <h2>Add Student</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required><br><br>

        <label for="cgpa">CGPA:</label>
        <input type="text" id="cgpa" name="cgpa" required><br><br>

        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required><br><br>

        <input type="submit" value="Submit">
    </form>

    <?php
    // Database connection credentials
    $servername = "localhost"; // Docker Compose service name
    $username = "root"; // Database username
    $password = "root"; // Database password
    $dbname = "my_database"; // Database name

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
        $id = $_POST["id"];

        // SQL to insert data into the database
        $sql = "INSERT INTO students (name, age, cgpa, id) VALUES ('$name', '$age', '$cgpa', '$id')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
    ?>
</body>
</html>
