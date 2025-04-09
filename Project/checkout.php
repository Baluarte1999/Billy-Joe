<?php
session_start();
include 'db_connection.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id']; // Store the logged-in user's ID

// Fetch cart items for the logged-in user
$query = "SELECT c.id, p.name, p.price, c.quantity 
          FROM cart c
          JOIN products p ON c.product_id = p.id
          WHERE c.user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .checkout-container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .btn-confirm {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 18px;
        }
        .btn-confirm:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<div class="container checkout-container">
    <h1>Checkout</h1>

    <?php
    // If cart is empty
    if ($result->num_rows > 0) {
        $total_price = 0;
        echo "<table class='table'>";
        echo "<thead><tr><th>Product</th><th>Price</th><th>Quantity</th></tr></thead>";
        echo "<tbody>";

        while ($row = $result->fetch_assoc()) {
            $total_price += $row['price'] * $row['quantity'];
            echo "<tr>
                    <td>" . $row['name'] . "</td>
                    <td>₱" . $row['price'] . "</td>
                    <td>" . $row['quantity'] . "</td>
                  </tr>";
        }

        echo "</tbody></table>";
        echo "<h3>Total Price: ₱" . $total_price . "</h3>";
        echo "<button class='btn-confirm' onclick='confirmOrder()'>Confirm Order</button>";
    } else {
        echo "<p>Your cart is empty.</p>";
    }
    ?>

</div>

<!-- Bootstrap JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    function confirmOrder() {
        alert("Order confirmed! Thank you for shopping with us.");
        window.location.href = 'order_confirmation.php';
    }
</script>

</body>
</html>
