<?php
// Include the core file to check if the user is logged in
include_once '../settings/core.php';

// Include the get_task_action.php file
include_once '../action/task_action.php';

// Check if the task ID is provided in the URL
if (!isset($_GET['id'])) {
    // Redirect to task management page if the task ID is not provided
    header("Location: ../views/task_mgt.php");
    exit();
}

// Retrieve task ID from the URL and store it in a variable
$taskId = $_GET['id'];

// Execute the function to get a task based on ID and assign the output to a variable
$task = getTaskById($taskId);

// Check if task data is available
if (!$task) {
    // Redirect to task management page if task data is not found
    header("Location: ../views/task_mgt.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    
    <!-- External Stylesheet -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    
    <!-- JavaScript for form validation -->
    <script src="../js/validation.js" defer></script>
</head>
<body>
    <h2>Edit Task</h2>
    <form action="../action/edit_task_action.php" method="POST" onsubmit="return confirmEdit()">
        <!-- Hidden input field to store task ID -->
        <input type="hidden" name="task_id" value="<?php echo $taskId; ?>">

        <!-- Task Name Field -->
        <div class="form-group">
            <label for="taskName">Task Name:</label>
            <input type="text" id="taskName" name="taskName" value="<?php echo $task['TaskName']; ?>" required>
        </div>

        <!-- Description Field -->
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description"><?php echo $task['Description']; ?></textarea>
        </div>

        <!-- Due Date Field -->
        <div class="form-group">
            <label for="dueDate">Due Date:</label>
            <input type="date" id="dueDate" name="dueDate" value="<?php echo $task['DueDate']; ?>" required>
        </div>

        <!-- Status Field -->
        <div class="form-group">
            <label for="status">Status:</label>
            <select id="status" name="status">
                <option value="1" <?php if($task['SID'] == 1) echo 'selected'; ?>>Complete</option>
                <option value="2" <?php if($task['SID'] == 2) echo 'selected'; ?>>Incomplete</option>
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit">Edit Task</button>
    </form>

    <script>
        // Function to display confirmation alert before editing task
        function confirmEdit() {
            return confirm("Are you sure you want to edit the task?");
        }
    </script>
</body>
</html>
