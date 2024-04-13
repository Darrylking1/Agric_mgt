<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Crop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
<h1>Add Crop</h1>
    <!-- Create a form for adding crops -->
    <form action="../action/add_a_crop_action.php" method="POST" onsubmit="return validateForm()">
        <label for="cropName">Crop Name:</label>
        <input type="text" id="cropName" name="cropName" required><br>
        
        <label for="plantingDate">Planting Date:</label>
        <input type="date" id="plantingDate" name="plantingDate" required><br>
        
        <label for="expectedHarvestDate">Expected Harvest Date:</label>
        <input type="date" id="expectedHarvestDate" name="expectedHarvestDate" required><br>
        
        <label for="notes">Notes:</label>
        <textarea id="notes" name="notes"></textarea><br>
        
        <!-- Add other input fields as needed -->
        <button type="submit" onclick="alert('You have successfully added a crop')">Add Crop</button>
    </form>

    <!-- Include necessary JavaScript for form validation -->
    <script src="script.js"></script>
</body>
</html>
