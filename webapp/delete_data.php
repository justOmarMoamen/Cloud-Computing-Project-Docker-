<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];
    $sql = "DELETE FROM students WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        $message = "Record deleted successfully";
    } else {
        $message = "Error deleting record: " . $conn->error;
    }

    $conn->close();
    header("Location: display_data.php?message=" . urlencode($message));
    exit();
}
?>