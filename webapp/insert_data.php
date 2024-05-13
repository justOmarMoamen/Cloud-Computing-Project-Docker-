<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Add Student</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" id="age" name="age" required>
            </div>

            <div class="form-group">
                <label for="cgpa">CGPA:</label>
                <input type="text" id="cgpa" name="cgpa" required>
            </div>

            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" id="id" name="id" required>
            </div>

            <div class="form-group">
                <input type="submit" value="Submit">
            </div>

            <div class="form-group">
                <button class="btn btn-primary" onclick="window.location.href='display_data.php'">Back</button>
            </div>
        </form>

        <?php
        // Database connection credentials
        $servername = "db"; // Docker Compose service name
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
            $sql = "INSERT INTO students (name, age, cgpa, student_id) VALUES ('$name', '$age', '$cgpa', '$id')";

            if ($conn->query($sql) === TRUE) {
                echo "<p class='success'>New record created successfully</p>";
            } else {
                echo "<p class='error'>Error: " . $sql . "<br>" . $conn->error . "</p>";
            }
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
