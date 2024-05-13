<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .fade-out {
            transition: opacity 0.5s ease-out;
            opacity: 0;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Students List</h1>

    <?php
    if (isset($_GET['message'])) {
        $message = $_GET['message'];
        echo "<div id='message-box' class='alert alert-success' role='alert'>$message</div>";
    }
    ?>

    <?php
    include 'config.php';

    $sql = "SELECT students_ID, name, age, cgpa, student_id FROM Students";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='table table-striped'><thead><tr><th>Student ID</th><th>Name</th><th>Age</th><th>CGPA</th><th>Actions</th></tr></thead><tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["student_id"]  . "</td><td>" . $row["name"] . "</td><td>" . $row["age"] . "</td><td>" . $row["cgpa"] . "</td>
            <td class='action-buttons'>
                <a href='update_data.php?students_ID=" . $row["students_ID"] . "' class='btn btn-warning btn-sm'>Update</a>
                <a href='delete_data.php?students_ID=" . $row["students_ID"] . "' class='btn btn-danger btn-sm'>Delete</a>
            </td></tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<div class='alert alert-info' role='alert'>No results found</div>";
    }

    $conn->close();
    ?>

    <div class="form-group mt-3">
        <a href="insert_data.php" class="btn btn-primary">Add New Student</a>
    </div>
</div>
<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const messageBox = document.getElementById('message-box');
        if (messageBox) {
            setTimeout(function() {
                messageBox.classList.add('fade-out');
                setTimeout(function() {
                    messageBox.style.display = 'none';
                }, 500);
            }, 3000); 
        }
    });
</script>
</body>
</html>
