<?php
// Start session
session_start();

// Check if user is logged in
if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
    // Destroy the session
    session_unset();
    session_destroy();

    // Display JavaScript alert after logging out
    echo "<script>
            alert('You have successfully logged out.');
            window.location.href = 'login.php';
          </script>";
    exit();
} else {
    // If user is not logged in, redirect to the login page
    header("Location: login.php");
    exit();
}
?>
