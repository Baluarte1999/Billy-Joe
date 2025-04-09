<?php
include 'header.php';

if (isset($_GET['id'])) {
  $order_id = $_GET['id'];
  echo '<h2 class="text-3xl font-semibold mb-4">Order Complete</h2>';
  echo '<p>Your order has been placed successfully. Your order ID is ' . $order_id . '. Thank you for shopping with us!</p>';
} else {
  echo '<h2 class="text-3xl font-semibold mb-4">Error</h2>';
  echo '<p>Something went wrong with your order.</p>';
}

include 'footer.php';
?>
