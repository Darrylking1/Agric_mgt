<?php
// Start session

// Include the function file
include_once '../action/get_task_action.php';

// Check if user is logged in
if (isset($_SESSION['user_id'])) {
    // Get the tasks using the function
    $tasks = getAllTasksWithStatus($_SESSION['user_id']);

    // Output the fetched tasks
    foreach ($tasks as $task) {
        echo "<tr>";
        echo "<td>{$task['TaskName']}</td>";
        echo "<td>{$task['Description']}</td>";
        echo "<td>{$task['DueDate']}</td>";
        echo "<td>{$task['SName']}</td>";

        echo "</tr>";
    }
} else {
    // Redirect to login page if user is not logged in
    header("Location: login.php");
    exit();
}
?>