<?php
// Include the connection file
include_once '../settings/connection.php';

// Check if the task name is set in the POST request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['taskName'])) {
    // Retrieve form data
    $taskName = $_POST['taskName'];
    $description = $_POST['description'];
    $dueDate = $_POST['dueDate'];
    $status = $_POST['status'];

    // Get the user ID from the session (assuming you store user ID in a session variable)
    session_start();
    $userId = $_SESSION['user_id'];

    // Write the INSERT query
    $query = "INSERT INTO task (UserID, TaskName, Description, DueDate, SID) VALUES (?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        // If preparation fails, redirect to an error page
        header("Location: ../error.php");
        exit();
    }

    // Bind parameters and execute the query
    mysqli_stmt_bind_param($stmt, "isssi", $userId, $taskName, $description, $dueDate, $status);

    if (mysqli_stmt_execute($stmt)) {
        // Redirect back to the form after adding the task
        header("Location: ../views/task_mgt.php");
        exit();
    } else {
        // If execution fails, redirect back to the form with an error message
        header("Location: ../error.php");
        exit();
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    // Redirect to an error page or back to the form with an error message
    header("Location: ../error.php");
    exit();
}

// Close the connection
mysqli_close($conn);
?>
