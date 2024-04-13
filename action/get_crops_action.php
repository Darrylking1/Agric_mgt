<?php
// Include the connection file
include_once '../settings/connection.php';

// Function to fetch crops based on user ID
function getCropsByUserId($userId) {
    global $conn; // Access the global database connection variable

    // Prepare SQL statement to select crops based on user ID
    $query = "SELECT * FROM crop WHERE UserID = ?";

    // Prepare and bind parameters
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $userId);

    // Execute query
    mysqli_stmt_execute($stmt);

    // Get result
    $result = mysqli_stmt_get_result($stmt);

    // Initialize an array to store fetched crops
    $crops = array();

    // Fetch crops and store them in the array
    while ($row = mysqli_fetch_assoc($result)) {
        $crops[] = $row;
    }

    // Return the array of crops
    return $crops;
}
?>

