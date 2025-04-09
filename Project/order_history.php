<?php include 'header.php'; ?>

<h2 class="text-3xl font-semibold mb-4">Your Order History</h2>

<?php
include 'db_connection.php';
$user_id = $_SESSION['user_id'];

$result = $conn->query("SELECT * FROM orders WHERE user_id = $user_id");

if ($result->num_rows > 0) {
  echo '<table class="w-full table-auto">';
  echo '<thead><tr><th>Order ID</th><th>Total</th><th>Shipping Address</th><th>Status</th><th>Date</th></tr></thead>';
  echo '<tbody>';

  while ($row = $result->fetch_assoc()) {
    echo '<tr>
            <td>' . $row['id'] . '</td>
            <td>$' . $row['total'] . '</td>
            <td>' . $row['shipping_address'] . '</td>
            <td>' . $row['status'] . '</td>
            <td>' . $row['created_at'] . '</td>
          </tr>';
  }

  echo '</tbody>';
  echo '</table>';
} else {
  echo '<p>No orders found.</p>';
}

include 'footer.php';
?>
