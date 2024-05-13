<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Validate and sanitize the input
    $id = isset($_GET["students_ID"]) ? intval($_GET["students_ID"]) : 0;

    if ($id <= 0) {
        $message = "Invalid student ID";
    } else {
        // Use prepared statement to prevent SQL injection
        $sql = "DELETE FROM Students WHERE students_ID = ?";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            $message = "Error preparing statement: " . $conn->error;
        } else {
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                $message = "Record deleted successfully";
            } else {
                $message = "Error deleting record: " . $stmt->error;
            }
            $stmt->close();
        }
    }

    $conn->close();
    header("Location: display_data.php?message=" . urlencode($message));
    exit();
}
?>
