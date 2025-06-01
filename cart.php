<?php
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
if (isset($_GET['add'])) {
    $product_id = $_GET['add'];
    if (!isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] = 1;
    } else {
        $_SESSION['cart'][$product_id]++;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>
    <style>
        body { font-family: 'Montserrat'; background: #f5f5f5; }
        .container { max-width: 800px; margin: 80px auto; padding: 30px; background: #fff; border-radius: 10px; box-shadow: 0 8px 20px rgba(0,0,0,0.1); }
        h2 { color: #6d4c41; text-align: center; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 12px; border-bottom: 1px solid #ddd; }
        .btn { padding: 10px 15px; background: #6d4c41; color: #fff; border: none; border-radius: 8px; cursor: pointer; }
        .btn:hover { background: #3e2723; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Your Cart</h2>
        <?php if (empty($_SESSION['cart'])): ?>
            <p>Your cart is empty.</p>
        <?php else: ?>
            <form action="checkout.php" method="POST">
                <table>
                    <tr><th>Product ID</th><th>Quantity</th></tr>
                    <?php foreach ($_SESSION['cart'] as $id => $qty): ?>
                        <tr><td><?= $id ?></td><td><?= $qty ?></td></tr>
                    <?php endforeach; ?>
                </table>
                <button class="btn" type="submit">Proceed to Checkout</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
