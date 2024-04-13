<?php
// Include the connection file
include_once '../settings/connection.php';

// Check if crop ID is provided in the URL
if(isset($_GET['id'])) {
    // Retrieve ID from the GET URL and store it in a variable
    $cropId = $_GET['id'];

    // Write the DELETE query using the variable above
    $query = "DELETE FROM crop WHERE CropID = $cropId";

    // Execute the query using the connection from the connection file
    $result = mysqli_query($conn, $query);

    // Check if execution was successful
    if($result) {
        // JavaScript alert message
        echo "<script>alert('Crop deleted successfully');</script>";

        // Redirect to crop display page
        header("Location: ../views/crop_mgt.php");
        exit;
    } else {
        // Take appropriate action (display error on crop management page)
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // Redirect to crop display page if ID is not provided in the URL
    header("Location: ../views/crop_mgt.php");
    exit;
}
?>
