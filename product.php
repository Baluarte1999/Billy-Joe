<?php
include 'db_connection.php';
include ("header.php");

/*$result = $conn->query("SELECT * FROM products");

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
?>*/

// graphics.php - Simple PHP page to display graphics cards and simulate a buy feature

$pdo = new PDO("mysql:host=localhost;dbname=db_structure","root","");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $pdo->query("SELECT * FROM products");
$products = $stmt->fetchAll();
?><!DOCTYPE html><html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="css/product.css">
</head>
<body>
    <div class="product-container">
        <h2><strong>Products</strong></h2>
        <p>Products > Graphics Card</p>
        <div class="product-grid">
            <?php
            $products = [
                ["NVIDIA GeForce RTX 2060", "img1.jpg"],
                ["NVIDIA GeForce GTX 1660 Ti", "img2.jpg"],
                ["NVIDIA GeForce RTX 3070", "img3.jpg"],
                ["NVIDIA GeForce GTX 1080 Ti", "img4.jpg"],
                ["NVIDIA GeForce GTX 1650", "img5.jpg"],
                ["NVIDIA GeForce GTX 1660 SUPER", "img6.jpg"],
                ["NVIDIA GeForce RTX 3060 Ti", "img7.jpg"],
                ["NVIDIA GeForce RTX 3090", "img8.jpg"],
                ["NVIDIA GeForce RTX 4080 SUPER", "img9.jpg"],
                ["NVIDIA GeForce GTX 1070", "img10.jpg"]
            ];
            foreach ($products as $product) {
                echo "<div class='card'>";
                echo "<img src='" . $product[1] . "' alt='" . $product[0] . "'>";
                echo "<div>" . $product[0] . "</div>";
                echo "<div class='price'>₱ 10,000</div>";
                echo "<button class='buy-btn' type = 'submit' name = 'buy_now' onclick=\"alert('You have selected: " . $product[0] . "')\">BUY NOW</button>";
                echo "</div>";
            }

            
            ?>
        </div>
    </div>
</body>
</html>
<?php include 'footer.php'; ?>