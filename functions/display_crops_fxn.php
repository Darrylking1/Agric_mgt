<?php
// Start session


// Include the function file
include_once '../action/get_crops_action.php';

// Check if user is logged in
if (isset($_SESSION['user_id'])) {
    // Get the user ID from the session
    $userId = $_SESSION['user_id'];

    // Get crops for the logged-in user using the function
    $crops = getCropsByUserId($userId);

    // Output the fetched crops
    foreach ($crops as $crop) {
        echo "<tr>";
        echo "<td>{$crop['CropName']}</td>";
        echo "<td>{$crop['PlantingDate']}</td>";
        echo "<td>{$crop['ExpectedHarvestDate']}</td>";
        


        echo "</tr>";
    }
} else {
    // Redirect to login page if user is not logged in
    header("Location: login.php");
    exit();
}
?>