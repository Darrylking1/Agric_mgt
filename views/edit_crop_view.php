<?php
// Include the core file to check if the user is logged in
include_once '../settings/core.php';

// Include the get_crop_action.php file
include_once '../action/get_crop_action.php';

// Check if the crop ID is provided in the URL
if (!isset($_GET['id'])) {
    // Redirect to crop management page if the crop ID is not provided
    header("Location: ../views/crop_mgt.php");
    exit();
}

// Retrieve crop ID from the URL and store it in a variable
$cropId = $_GET['id'];

// Execute the function to get a crop based on ID and assign the output to a variable
$crop = getCropById($cropId);

// Check if crop data is available
if (!$crop) {
    // Redirect to crop management page if crop data is not found
    header("Location: ../views/crop_mgt.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Crop</title>
    
    <!-- External Stylesheet -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    
    <!-- JavaScript for form validation -->
    <script src="../js/validation.js" defer></script>
</head>
<body>
    <h2>Edit Crop</h2>
    <form action="../action/edit_crop_action.php" method="POST" onsubmit="return confirmEdit()">
        <!-- Hidden input field to store crop ID -->
        <input type="hidden" name="crop_id" value="<?php echo $cropId; ?>">

        <!-- Crop Name Field -->
        <div class="form-group">
            <label for="cropName">Crop Name:</label>
            <input type="text" id="cropName" name="cropName" value="<?php echo $crop['CropName']; ?>" required>
        </div>

        <!-- Planting Date Field -->
        <div class="form-group">
            <label for="plantingDate">Planting Date:</label>
            <input type="date" id="plantingDate" name="plantingDate" value="<?php echo $crop['PlantingDate']; ?>" required>
        </div>

        <!-- Expected Harvest Date Field -->
        <div class="form-group">
            <label for="expectedHarvestDate">Expected Harvest Date:</label>
            <input type="date" id="expectedHarvestDate" name="expectedHarvestDate" value="<?php echo $crop['ExpectedHarvestDate']; ?>" required>
        </div>

        <!-- Notes Field -->
        <div class="form-group">
            <label for="notes">Notes:</label>
            <textarea id="notes" name="notes"><?php echo $crop['Notes']; ?></textarea>
        </div>

        <!-- Submit Button -->
        <button type="submit">Edit Crop</button>
    </form>

    <script>
        // Function to display confirmation alert before editing crop
        function confirmEdit() {
            return confirm("Are you sure you want to edit the crop?");
        }
    </script>
</body>
</html>