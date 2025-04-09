<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IR Tech - Irregular Technology</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    body { background-color: #0f0f0f; color: #f5f5f5; font-family: 'Segoe UI', sans-serif; }
  </style>
</head>
<body class="bg-gray-900 text-white">
  <header class="p-5 shadow-md bg-gray-800 flex justify-between items-center">
    <a href="index.php" class="text-3xl font-bold">IR Tech</a>
    <nav>
      <a href="aboutus.php" class="mx-2 hover:text-purple-400">About Us</a>
      <a href="product.php" class="mx-2 hover:text-purple-400">Products</a>
      <a href="cart.php" class="mx-2 hover:text-purple-400">Cart</a>
      <a href="order_history.php" class="mx-2 hover:text-purple-400">Orders</a>
      <a href="contact.php" class="mx-2 hover:text-purple-400">Contact</a>
      <?php if(isset($_SESSION['user_id'])): ?>
        <a href="logout.php" class="mx-2 hover:text-red-400">Logout</a>
      <?php else: ?>
        <a href="login.php" class="mx-2 hover:text-green-400">Login</a>
        <a href="register.php" class="mx-2 hover:text-blue-400">Register</a>
      <?php endif; ?>
    </nav>
  </header>
  <main class="p-6">
