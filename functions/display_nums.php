<?php

include_once '../settings/connection.php';
// Function to get the count of completed tasks
// Function to get the count of completed tasks for a specific user
function getCompletedCount($userId) {
    global $conn;
    $query = "SELECT COUNT(*) AS count FROM task WHERE SID = 1 AND UserID = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $count = mysqli_fetch_assoc($result)['count'];
    mysqli_stmt_close($stmt);
    return $count;
}

// Function to get the count of incomplete tasks for a specific user
function getIncompleteCount($userId) {
    global $conn;
    $query = "SELECT COUNT(*) AS count FROM task WHERE SID = 2 AND UserID = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $count = mysqli_fetch_assoc($result)['count'];
    mysqli_stmt_close($stmt);
    return $count;
}

// Function to get the count of crops for a specific user
function getCropsCount($userId) {
    global $conn;
    $query = "SELECT COUNT(*) AS count FROM crop WHERE UserID = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $count = mysqli_fetch_assoc($result)['count'];
    mysqli_stmt_close($stmt);
    return $count;
}



?>
