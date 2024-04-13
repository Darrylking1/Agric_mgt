<?php
// Include the connection file
include_once '../settings/connection.php';

// Check if task ID is provided and form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['task_id'])) {
    // Collect form data
    $taskId = $_POST['task_id'];
    $newTaskName = $_POST['taskName']; // Assuming taskName is the field being edited
    $newDescription = $_POST['description'];
    $newDueDate = $_POST['dueDate'];
    $newStatusId = $_POST['status'];

    // Write the UPDATE query
    $query = "UPDATE task
              SET TaskName = ?, Description = ?, DueDate = ?, SID = ? 
              WHERE TaskID = ?";

    // Prepare the statement
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        // Error handling if statement preparation fails
        header("Location: ../views/task_mgt.php?error=sql_error");
        exit();
    } else {
        // Bind parameters and execute the query
        mysqli_stmt_bind_param($stmt, "ssssi", $newTaskName, $newDescription, $newDueDate, $newStatusId, $taskId);

        if (mysqli_stmt_execute($stmt)) {
            // Redirect back to task control view page after successful edit
            header("Location: ../views/task_mgt.php?edit=success");
            exit();
        } else {
            // Error handling if execution fails
            header("Location: ../views/task_mgt.php?error=edit_failed");
            exit();
        }
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    // Redirect to task control view page if task ID is not provided or form is not submitted
    header("Location: ../views/task_mgt.php");
    exit();
}
?>
