<?php
// Include the connection file
include_once '../settings/connection.php';

// Retrieve form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $username = $_POST['username'];
    $farmName = $_POST['farmName'];
    $location = $_POST['location'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Encrypt the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Write your INSERT query for user_profile table
    $query = "INSERT INTO user_profile (Username, FarmName, Location, Email, Password) VALUES (?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        die("Error: " . mysqli_error($conn));
    }

    // Bind parameters and execute the query
    mysqli_stmt_bind_param($stmt, "sssss", $username, $farmName, $location, $email, $hashedPassword);

    if (mysqli_stmt_execute($stmt)) {
        // Redirect to login_view page if execution is successful
        header("Location: ../login_view/login.php");
        exit();
    } else {
        // Take appropriate action if execution fails (display error on register_view page)
        // For example, you can redirect back to the registration page with an error message
        header("Location: ../login/register_view.php?error=registration_failed");
        exit();
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Close the connection
mysqli_close($conn);
?>
