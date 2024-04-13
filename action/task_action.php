<?php
// Include the connection file
include_once '../settings/connection.php';

// Function to get one task based on id
function getTaskById($id) {
    global $conn; // Access the global connection variable

    // Write the SELECT one task query using the id
    $query = "SELECT * FROM task WHERE TaskID = ?";

    // Prepare the statement
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        return false; // Return false if query preparation fails
    }

    // Bind the parameter and execute the query
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    // Get the result
    $result = mysqli_stmt_get_result($stmt);

    // Check if any record was returned
    if (mysqli_num_rows($result) > 0) {
        // Fetch the record and assign to a variable
        $task = mysqli_fetch_assoc($result);

        // Close the statement
        mysqli_stmt_close($stmt);

        // Close the connection
        mysqli_close($conn);

        return $task; // Return the task data
    } else {
        // Close the statement
        mysqli_stmt_close($stmt);

        // Close the connection
        mysqli_close($conn);
        
        return false; // Return false if no record found
    }
}
?>
