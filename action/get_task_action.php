<?php

// Include the connection file
include_once '../settings/connection.php';

// Function to fetch tasks with status by UserID
function getAllTasksWithStatus($userId) {
    global $conn; // Access the global database connection variable

    // Check if the connection is valid
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to select tasks with status name for a specific user
    $query = "SELECT t.TaskID, t.TaskName, t.Description, t.DueDate, s.SName 
              FROM task t
              INNER JOIN status s ON t.SID = s.SID
              WHERE t.UserID = ?";

    // Prepare and bind parameters
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userId);

    // Execute the query
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Check if the query was successful
    if ($result) {
        // Initialize an array to store fetched tasks
        $tasks = array();

        // Fetch tasks and store them in the array
        while ($row = $result->fetch_assoc()) {
            $tasks[] = $row;
        }

        // Close statement
        $stmt->close();

        // Close connection
        $conn->close();

        // Return the array of tasks
        return $tasks;
    } else {
        // Handle query error
        die("Error executing query: " . $conn->error);
    }
}

?>