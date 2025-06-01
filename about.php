<?php
session_start();

// Simple login check example:
// Agar 'user_id' session me nahi hai, to login page pe redirect karo
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
        <link rel="icon" type="image/x-icon" href="https://cdn.freelogovectors.net/wp-content/uploads/2023/05/essence-logo-freelogovectors.net_.png">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>About Us - Essence</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        :root {
            --primary-color: #6d4c41;
            --secondary-color: #d7ccc8;
            --accent-color: #a1887f;
            --light-color: #f5f5f5;
            --dark-color: #3e2723;
            --text-color: #333;
            --white: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }

        body {
            background-color: var(--light-color);
            color: var(--text-color);
            line-height: 1.6;
        }

        a {
            text-decoration: none;
            color: var(--primary-color);
        }

        ul {
            list-style: none;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        header {
            background-color: var(--white);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
            color: var(--primary-color);
        }

        .nav-links {
            display: flex;
        }

        .nav-links li {
            margin-left: 30px;
        }

        .nav-links a {
            color: var(--text-color);
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .nav-links a:hover {
            color: var(--primary-color);
        }

        .cart-icon {
            position: relative;
        }

        .cart-count {
            position: absolute;
            top: -10px;
            right: -10px;
            background: var(--primary-color);
            color: var(--white);
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 12px;
        }

        /* Hero Section */
        .hero {
            position: relative;
            background: linear-gradient(rgba(109, 76, 65, 0.6), rgba(109, 76, 65, 0.6)), url('https://images.unsplash.com/photo-1528740561666-dc2479dc08ab?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            text-align: center;
            padding: 0 20px;
            border-radius: 0 0 15px 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 10px;
            text-shadow: 2px 2px 8px rgba(0,0,0,0.7);
        }

        .hero p {
            font-size: 1.25rem;
            max-width: 700px;
            margin: 0 auto;
            text-shadow: 1px 1px 6px rgba(0,0,0,0.6);
        }

        /* About Content */
        .about-section {
            padding: 60px 20px;
            background: var(--white);
            max-width: 900px;
            margin: 40px auto 80px auto;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(109, 76, 65, 0.15);
        }

        .about-section h2 {
            color: var(--primary-color);
            font-size: 2.5rem;
            margin-bottom: 25px;
            text-align: center;
        }

        .about-section p {
            font-size: 1.125rem;
            line-height: 1.8;
            color: #555;
            margin-bottom: 20px;
            text-align: center;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.2rem;
            }

            .hero p {
                font-size: 1rem;
            }

            .about-section {
                padding: 40px 15px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <nav class="navbar">
                <a href="index.php" class="logo">Essence</a>
                <ul class="nav-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="products.php">Products</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="contact.php">Contact</a></li>
                   <li><a href="logout.php" style="color: var(--primary-color); font-weight: 600;">Logout</a></li>
                    <li>
                        <a href="#" class="cart-icon" id="cart-toggle">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="cart-count">0</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero" aria-label="About Essence hero section">
        <div>
            <h1>Discover the Essence of Luxury</h1>
            <p>Experience the finest fragrances that capture tradition and modern elegance.</p>
        </div>
    </section>

    <!-- About Content -->
    <section class="about-section" aria-label="About Essence information">
        <h2>About Essence</h2>
        <p>Essence is a luxury fragrance brand dedicated to bringing you the most enchanting aromas from around the world.</p>
        <p>Founded in 2025, Essence blends tradition with modern sophistication to deliver a fragrance experience like no other.</p>
    </section>
</body>
</html>
