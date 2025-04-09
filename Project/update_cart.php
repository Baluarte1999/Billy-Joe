<?php
session_start();
include 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$quantities = $_POST['quantity'];

foreach ($quantities as $cart_id => $quantity) {
    if ($quantity <= 0) {
        continue;
    }

    $query = "UPDATE cart SET quantity = ? WHERE user_id = ? AND id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iii", $quantity, $user_id, $cart_id);
    $stmt->execute();
}

header("Location: cart.php");
exit();
?>
