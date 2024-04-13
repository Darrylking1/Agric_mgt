<?php
// Include the connection file
include_once '../settings/connection.php';

// Check if task ID is provided in the URL
if(isset($_GET['id'])) {
    // Retrieve ID from the GET URL and store it in a variable
    $taskId = $_GET['id'];

    // Write the DELETE query using prepared statement to prevent SQL injection
    $query = "DELETE FROM task WHERE TaskID = ?";

    // Prepare the statement
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        // If preparation fails, display error
        echo "Error: " . mysqli_error($conn);
    } else {
        // Bind the parameter and execute the query
        mysqli_stmt_bind_param($stmt, "i", $taskId);
        mysqli_stmt_execute($stmt);

        // Check if execution was successful
        if(mysqli_stmt_affected_rows($stmt) > 0) {
            // Redirect to task display page if deletion was successful
            header("Location: ../views/task_mgt.php");
            exit();
        } else {
            // If deletion fails, display error
            echo "Error: Failed to delete task.";
        }
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    // Redirect to task display page if ID is not provided in the URL
    header("Location: ../views/task_mgt.php");
    exit();
}
?>
