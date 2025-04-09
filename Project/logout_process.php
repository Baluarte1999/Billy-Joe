<?php
// logout_process.php
include 'db_connection.php';
session_start();

// Log user out (you can track the logout event here)
$user_id = $_SESSION['user_id'];
$logout_time = date('Y-m-d H:i:s');
$stmt = $conn->prepare("INSERT INTO user_activity (user_id, activity, timestamp) VALUES (?, ?, ?)");
$stmt->bind_param("iss", $user_id, $activity, $logout_time);
$activity = "Logged out";
$stmt->execute();
$stmt->close();

// Destroy session and logout
session_unset();
session_destroy();
header("Location: index.php");
exit;
?>
