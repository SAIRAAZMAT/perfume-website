<?php
session_start();
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: cart.php");
    exit;
}

$order_id = rand(1000, 9999); // Dummy Order ID for display
$_SESSION['cart'] = []; // Clear cart
?>
<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <style>
        body { font-family: 'Montserrat'; background: #f5f5f5; }
        .box { max-width: 500px; margin: 100px auto; padding: 40px; background: white; border-radius: 12px; box-shadow: 0 8px 20px rgba(0,0,0,0.1); text-align: center; }
        h2 { color: #6d4c41; }
        p { margin-top: 20px; }
        a { text-decoration: none; color: #6d4c41; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="box">
        <h2>Order Confirmed!</h2>
        <p>Thank you for your purchase.</p>
        <p>Your Order ID: <strong>#<?= $order_id ?></strong></p>
        <p><a href="index.php">Return to Home</a></p>
    </div>
</body>
</html>
