<!DOCTYPE html>
<html>
<head>
    <title>Essence</title>
    <style>
        body { font-family: 'Montserrat', sans-serif; margin: 0; padding: 0; background: #f5f5f5; }
        header { background-color: #6d4c41; padding: 20px; text-align: center; color: white; }
        nav a { margin: 0 15px; text-decoration: none; color: white; font-weight: bold; }
        nav a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <header>
        <h1>Essence</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="products.php">Products</a>
            <a href="about.php">About</a>
            <a href="contact.php">Contact</a>
            <a href="cart.php">Cart</a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="logout.php">Logout</a>
            <?php elseif (isset($_SESSION['admin'])): ?>
                <a href="admin/dashboard.php">Dashboard</a>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="login.php">Login</a>
                <a href="signup.php">Signup</a>
            <?php endif; ?>
        </nav>
    </header>
