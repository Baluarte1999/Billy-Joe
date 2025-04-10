<?php include 'header.php'; ?>
<h2 class="text-3xl font-semibold mb-4">Your Cart</h2>

<?php
include 'db_connection.php';
$user_id = $_SESSION['user_id'];
$total = 0;
/*$result = $conn->query("SELECT * FROM cart JOIN products ON cart.product_id = products.id 
WHERE cart.user_id = $user_id");*/
$sql = "SELECT * FROM cart JOIN products ON cart.product_id = products.id WHERE cart.order_id = $user_id";
$result = $conn->query($sql);
if(!$result){
  die("Query Failed: " . $conn->error);
}

echo '<table class="w-full table-auto">';
echo '<thead><tr><th>Product</th><th>Price</th><th>Quantity</th><th>Total</th><th>Action</th></tr></thead>';
echo '<tbody>';

while ($row = $result->fetch_assoc()) {
  $total_price = $row['price'] * $row['quantity'];
  echo '<tr>
          <td>'.$row['name'].'</td>
          <td>$'.$row['price'].'</td>
          <td>'.$row['quantity'].'</td>
          <td>$'.$total_price.'</td>
          <td><a href="remove-cart.php?id='.$row['id'].'" class="text-red-500">Remove</a></td>
        </tr>';
  $total += $total_price;
}
if(isset($_POST['buy_now'])){
  $product_id = $_POST['id'];
  $product_name = $_POST['name'];
  $product_price = $_POST['price'];
  $product_description = $_POST['description'];
  $quantity = $_POST['quantity'];

  if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}
}

echo '</tbody>';
echo '</table>';
echo '<p class="mt-4 text-xl">Total: $'.$total.'</p>';
echo '<a href="checkout.php" class="mt-4 bg-purple-700 text-white px-4 py-2 rounded hover:bg-purple-500">Proceed to Checkout</a>';

?>

<?php include 'footer.php'; ?>
