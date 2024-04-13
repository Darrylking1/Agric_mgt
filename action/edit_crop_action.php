<?php
// Include the connection file
include_once '../settings/connection.php';

// Check if crop ID is provided and form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['crop_id'])) {
    // Collect form data
    $cropId = $_POST['crop_id'];
    $newCropName = $_POST['cropName']; // Assuming cropName is the field being edited
    $newPlantingDate = $_POST['plantingDate'];
    $newExpectedHarvestDate = $_POST['expectedHarvestDate'];
    $newNotes = $_POST['notes'];

    // Write the UPDATE query
    $query = "UPDATE crop 
              SET CropName = ?, PlantingDate = ?, ExpectedHarvestDate = ?, Notes = ? 
              WHERE CropID = ?";

    // Prepare the statement
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        // Error handling if statement preparation fails
        header("Location: ../views/crop_mgt.php?error=sql_error");
        exit();
    } else {
        // Bind parameters and execute the query
        mysqli_stmt_bind_param($stmt, "ssssi", $newCropName, $newPlantingDate, $newExpectedHarvestDate, $newNotes, $cropId);

        if (mysqli_stmt_execute($stmt)) {
            // Redirect back to crop control view page after successful edit
            header("Location: ../views/crop_mgt.php?edit=success");
            exit();
        } else {
            // Error handling if execution fails
            header("Location: ../views/crop_mgt.php?error=edit_failed");
            exit();
        }
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    // Redirect to crop control view page if crop ID is not provided or form is not submitted
    header("Location: ../views/crop_mgt.php");
    exit();
}
?>
