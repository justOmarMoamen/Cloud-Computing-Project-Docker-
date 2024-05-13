<?php
include 'config.php';

$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_GET["students_ID"]);
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $age = intval($_POST["age"]);
    $cgpa = floatval($_POST["cgpa"]);
    $student_id = mysqli_real_escape_string($conn, $_POST["student_id"]);

    // Construct the SQL query for update
    $sql = "UPDATE Students SET name='$name', age=$age, cgpa=$cgpa WHERE students_ID=$id";

    // Execute the SQL query
    if ($conn->query($sql) === TRUE) {
        $message = "Record updated successfully";
        header("Location: display_data.php?message=" . urlencode($message));
        exit();
    } else {
        $message = "Error updating record: " . $conn->error;
    }
}

$id = intval($_GET["students_ID"]);
$sql = "SELECT * FROM Students WHERE students_ID=$id";

$result = $conn->query($sql);

if ($result === FALSE) {
    $message = "Error retrieving student record: " . $conn->error;
} else {
    $row = $result->num_rows > 0 ? $result->fetch_assoc() : null;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Update Student</h2>

    <?php
    if ($message) {
        echo "<div class='alert alert-danger'>$message</div>";
    }
    if ($row) {
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?students_ID=" . $id); ?>">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $row["name"]; ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="age">Age:</label>
            <input type="number" id="age" name="age" value="<?php echo $row["age"]; ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="cgpa">CGPA:</label>
            <input type="number" step="0.01" id="cgpa" name="cgpa" value="<?php echo $row["cgpa"]; ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="student_id">Student ID:</label>
            <input type="text" id="student_id" name="student_id" value="<?php echo $row["student_id"]; ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="submit" value="Update" class="btn btn-success">
        </div>
    </form>

    <?php
    } else {
        echo "<div class='alert alert-danger'>No student found with ID $id</div>";
    }
    ?>

    <div class="form-group mt-3">
        <a href="display_data.php" class="btn btn-primary">Back to List</a>
    </div>
</div>
<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
