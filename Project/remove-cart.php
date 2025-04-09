<?php
session_start();
include 'db_connection.php';

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "You must be logged in to remove items from the cart.";
    exit();
}

$user_id = $_SESSION['user_id'];
$cart_id = $_GET['id'];  // The cart item ID to be removed

// Remove the item from the cart
$query = "DELETE FROM cart WHERE user_id = ? AND id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $user_id, $cart_id);
$stmt->execute();

// Redirect back to the cart page after removal
header("Location: cart.php");
exit();
?>
