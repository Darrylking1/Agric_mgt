<?php
// Start session
session_start();

// Include the function file
include_once '../action/get_task_action.php';

// Check if user is logged in
if (isset($_SESSION['user_id'])) {
    // Get the UserID from the session
    $userId = $_SESSION['user_id'];
    // Get the tasks for the logged-in user using the function
    $tasks = getAllTasksWithStatus($userId); // Pass the UserID as an argument

    // Output the fetched tasks
    foreach ($tasks as $task) {
        echo "<tr>";
        echo "<td>{$task['TaskName']}</td>";
        echo "<td>{$task['Description']}</td>";
        echo "<td>{$task['DueDate']}</td>";
        echo "<td>{$task['SName']}</td>";
        echo "<td>";
        // Add action links for edit and delete with JavaScript alert
        echo "<a href='../views/edit_task_view.php?id={$task['TaskID']}' onclick='return confirm(\"Are you sure you want to edit this task?\")'><ion-icon name='create-outline'></ion-icon></a> | ";
        echo "<a href='../action/delete_task.php?id={$task['TaskID']}' onclick='return confirm(\"Are you sure you want to delete this task?\")'><ion-icon name='trash-outline'></ion-icon></a>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    // Redirect to login page if user is not logged in
    header("Location: login.php");
    exit();
}
?>
