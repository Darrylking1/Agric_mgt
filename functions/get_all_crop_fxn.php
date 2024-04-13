<?php
// Start session
session_start();

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
        echo "<td>{$crop['Notes']}</td>";
        
        // Add action links for edit and delete with JavaScript alert
        echo "<td><a href='../views/edit_crop_view.php?id=" . $crop['CropID'] . "' onclick='return confirm(\"Are you sure you want to edit this crop?\")'><ion-icon name='create-outline'></ion-icon></a> | ";
        echo "<a href='../action/delete_crop.php?id=" . $crop['CropID'] . "' onclick='return confirm(\"Are you sure you want to delete this crop?\")'><ion-icon name='trash-outline'></ion-icon></a></td>";
        echo "</tr>";
    }
} else {
    // Redirect to login page if user is not logged in
    header("Location: login.php");
    exit();
}
?>
