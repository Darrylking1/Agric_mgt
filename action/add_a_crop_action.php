<?php
// Include the connection file
include_once '../settings/connection.php';

// Check if the crop name is set in the POST request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cropName'])) {
    // Retrieve form data
    $cropName = $_POST['cropName'];
    $plantingDate = $_POST['plantingDate'];
    $expectedHarvestDate = $_POST['expectedHarvestDate'];
    $notes = $_POST['notes'];

    // Get the user ID from the session (assuming you store user ID in a session variable)
    session_start();
    $userId = $_SESSION['user_id'];

    // Write the INSERT query
    $query = "INSERT INTO crop (UserID, CropName, PlantingDate, ExpectedHarvestDate, Notes) VALUES (?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        // If preparation fails, redirect to an error page
        header("Location: ../error.php");
        exit();
    }

    // Bind parameters and execute the query
    mysqli_stmt_bind_param($stmt, "issss", $userId, $cropName, $plantingDate, $expectedHarvestDate, $notes);

    if (mysqli_stmt_execute($stmt)) {
        // Redirect back to the form after adding the crop
        header("Location: ../views/crop_mgt.php");
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
