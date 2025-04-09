<?php
include 'db_connection.php';

$result = $conn->query("SELECT * FROM products");

if ($result->num_rows > 0) {
  echo '<div class="product-list">';
  while ($row = $result->fetch_assoc()) {
    echo '<div class="product-item">';
    echo '<img src="' . $row['image_url'] . '" alt="' . $row['name'] . '" class="product-image">';
    echo '<h3>' . $row['name'] . '</h3>';
    echo '<p>' . $row['description'] . '</p>';
    echo '<p>Price: $' . $row['price'] . '</p>';
    echo '<p>In Stock: ' . $row['stock'] . '</p>';
    echo '<button class="add-to-cart">Add to Cart</button>';
    echo '</div>';
  }
  echo '</div>';
} else {
  echo '<p>No products found.</p>';
}
?>
