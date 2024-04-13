<?php
// Start session
session_start();

// Include the connection file
include '../settings/connection.php';

// Check if login button was clicked
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data and store in variables
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare SQL statement to select user based on email
    $query = "SELECT * FROM user_profile WHERE Email = ?";

    // Prepare and bind parameters
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);

    // Execute query
    mysqli_stmt_execute($stmt);

    // Get result
    $result = mysqli_stmt_get_result($stmt);

    // Check if any row was returned
    if (mysqli_num_rows($result) == 1) {
        // Fetch user's data
        $user = mysqli_fetch_assoc($result);

        // Verify password using password_verify
        if (password_verify($password, $user['Password'])) {
            // Password is correct, set session variables
            $_SESSION['user_id'] = $user['UserID'];
            $_SESSION['username'] = $user['Username'];

            // Redirect user to dashboard.php
            header("Location: ../admin/dashboard.php");
            exit();
        } else {
            // Incorrect password
            $error_message = "Incorrect password.";
        }
    } else {
        // User not found
        $error_message = "User not registered or incorrect email.";
    }

    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close the connection
    mysqli_close($conn);

    // Redirect back to login page with error message
    header("Location: login.php?error=" . urlencode($error_message));
    exit();
}
?>
