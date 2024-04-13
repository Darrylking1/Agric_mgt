<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
<h1>Add Task</h1>
    <!-- Create a form for adding tasks -->
    <form action="../action/add_task_action.php" method="POST" onsubmit="return validateForm()">
        <label for="taskName">Task Name:</label>
        <input type="text" id="taskName" name="taskName" required><br>
        
        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea><br>
        
        <label for="dueDate">Due Date:</label>
        <input type="date" id="dueDate" name="dueDate" required><br>
        
        <!-- Assuming SID is for status ID, you can use a select dropdown to choose status -->
        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="1">Complete</option>
            <option value="2">Incomplete</option>
            <option value="3">just added</option>
        </select><br>
        
        <!-- Add other input fields as needed -->
        <button type="submit" onclick="alert('You have successfully added a task')">Add Task</button>
    </form>

    <!-- Include necessary JavaScript for form validation -->
    <script src="script.js"></script>
</body>
</html>
