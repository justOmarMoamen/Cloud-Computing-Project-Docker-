<?php
include 'config.php';

$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $age = $_POST["age"];
    $cgpa = $_POST["cgpa"];
    $student_id = $_POST["student_id"];

    $sql = "UPDATE students SET name='$name', age='$age', cgpa='$cgpa', student_id='$student_id' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: display_data.php?message=" . urlencode("Record updated successfully"));
        exit();
    } else {
        $message = "Error updating record: " . $conn->error;
    }
}

$id = $_GET["id"];
$sql = "SELECT * FROM students WHERE id=$id";
$result = $conn->query($sql);
$row = $result->num_rows > 0 ? $result->fetch_assoc() : null;

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

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
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
            <input type="text" id="cgpa" name="cgpa" value="<?php echo $row["cgpa"]; ?>" class="form-control" required>
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
