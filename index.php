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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Essence - Premium Perfumes</title>
    <style>
        /* Global Styles */
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
        
        .btn {
            display: inline-block;
            background: var(--primary-color);
            color: var(--white);
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .btn:hover {
            background: var(--dark-color);
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
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://images.unsplash.com/photo-1528740561666-dc2479dc08ab?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            height: 500px;
            display: flex;
            align-items: center;
            text-align: center;
            color: var(--white);
        }
        
        .hero-content {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .hero h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }
        
        .hero p {
            font-size: 20px;
            margin-bottom: 30px;
        }
        
        /* Featured Section */
        .featured {
            padding: 80px 0;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 50px;
            font-size: 36px;
            color: var(--primary-color);
        }
        
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 30px;
        }
        
        .product-card {
            background: var(--white);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        
        .product-card:hover {
            transform: translateY(-10px);
        }
        
        .product-img {
            height: 250px;
            overflow: hidden;
        }
        
        .product-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .product-card:hover .product-img img {
            transform: scale(1.1);
        }
        
        .product-info {
            padding: 20px;
        }
        
        .product-name {
            font-size: 18px;
            margin-bottom: 10px;
        }
        
        .product-price {
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 15px;
        }
        
        /* Footer */
        footer {
            background: var(--dark-color);
            color: var(--white);
            padding: 50px 0 20px;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            margin-bottom: 30px;
        }
        
        .footer-column h3 {
            font-size: 20px;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }
        
        .footer-column h3::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 2px;
            background: var(--secondary-color);
        }
        
        .footer-column ul li {
            margin-bottom: 10px;
        }
        
        .footer-column ul li a {
            color: var(--secondary-color);
            transition: color 0.3s ease;
        }
        
        .footer-column ul li a:hover {
            color: var(--white);
        }
        
        .social-links {
            display: flex;
            gap: 15px;
        }
        
        .social-links a {
            color: var(--white);
            background: var(--primary-color);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        
        .social-links a:hover {
            background: var(--secondary-color);
            color: var(--dark-color);
        }
        
        .footer-bottom {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        /* Auth Pages */
        .auth-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 80vh;
            padding: 40px 0;
        }
        
        .auth-form {
            background: var(--white);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }
        
        .auth-form h2 {
            text-align: center;
            margin-bottom: 30px;
            color: var(--primary-color);
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }
        
        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        
        .form-group input:focus {
            outline: none;
            border-color: var(--primary-color);
        }
        
        .auth-form .btn {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            margin-top: 10px;
        }
        
        .auth-extra {
            text-align: center;
            margin-top: 20px;
        }
        
        /* About Page */
        .about-section {
            padding: 80px 0;
        }
        
        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
        }
        
        .about-img {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .about-img img {
            width: 100%;
            height: auto;
            display: block;
        }
        
        .about-text h2 {
            font-size: 36px;
            margin-bottom: 20px;
            color: var(--primary-color);
        }
        
        .about-text p {
            margin-bottom: 15px;
        }
        
        /* Contact Page */
        .contact-section {
            padding: 80px 0;
        }
        
        .contact-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
        }
        
        .contact-info h3 {
            font-size: 24px;
            margin-bottom: 20px;
            color: var(--primary-color);
        }
        
        .contact-details {
            margin-bottom: 30px;
        }
        
        .contact-details div {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .contact-details i {
            margin-right: 15px;
            color: var(--primary-color);
            font-size: 20px;
        }
        
        .contact-form .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            min-height: 150px;
            resize: vertical;
        }
        
        .contact-form .form-group textarea:focus {
            outline: none;
            border-color: var(--primary-color);
        }
        
        /* Products Page */
        .products-section {
            padding: 80px 0;
        }
        
        .filter-section {
            margin-bottom: 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }
        
        .filter-group {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .filter-group select {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        
        /* Cart Sidebar */
        .cart-sidebar {
            position: fixed;
            top: 0;
            right: -400px;
            width: 400px;
            height: 100%;
            background: var(--white);
            box-shadow: -5px 0 15px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            transition: right 0.3s ease;
            overflow-y: auto;
        }
        
        .cart-sidebar.open {
            right: 0;
        }
        
        .cart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            border-bottom: 1px solid #eee;
        }
        
        .close-cart {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: var(--text-color);
        }
        
        .cart-items {
            padding: 20px;
        }
        
        .cart-item {
            display: flex;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        
        .cart-item-img {
            width: 80px;
            height: 80px;
            margin-right: 15px;
        }
        
        .cart-item-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 5px;
        }
        
        .cart-item-details {
            flex: 1;
        }
        
        .cart-item-name {
            font-weight: 500;
            margin-bottom: 5px;
        }
        
        .cart-item-price {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .cart-item-actions {
            display: flex;
            align-items: center;
        }
        
        .quantity-control {
            display: flex;
            align-items: center;
            margin-right: 15px;
        }
        
        .quantity-btn {
            width: 25px;
            height: 25px;
            background: var(--secondary-color);
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        
        .quantity {
            margin: 0 10px;
        }
        
        .remove-item {
            background: none;
            border: none;
            color: #ff5252;
            cursor: pointer;
        }
        
        .cart-summary {
            padding: 20px;
            border-top: 1px solid #eee;
        }
        
        .cart-total {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            font-weight: 700;
            font-size: 18px;
        }
        
        .checkout-btn {
            width: 100%;
            padding: 12px;
            font-size: 16px;
        }
        
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        
        .overlay.active {
            opacity: 1;
            visibility: visible;
        }
        
        /* Checkout Page */
        .checkout-section {
            padding: 80px 0;
        }
        
        .checkout-container {
            display: grid;
            grid-template-columns: 1fr 350px;
            gap: 50px;
        }
        
        .checkout-form h3 {
            font-size: 24px;
            margin-bottom: 20px;
            color: var(--primary-color);
        }
        
        .checkout-summary {
            background: var(--white);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            height: fit-content;
        }
        
        .checkout-summary h3 {
            font-size: 24px;
            margin-bottom: 20px;
            color: var(--primary-color);
        }
        
        .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        
        .summary-total {
            font-weight: 700;
            font-size: 18px;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }
        
        /* Responsive Styles */
        @media (max-width: 992px) {
            .about-content,
            .contact-container,
            .checkout-container {
                grid-template-columns: 1fr;
            }
            
            .about-img {
                order: -1;
            }
            
            .checkout-summary {
                margin-top: 50px;
            }
        }
        
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 36px;
            }
            
            .hero p {
                font-size: 18px;
            }
            
            .nav-links {
                display: none;
            }
            
            .cart-sidebar {
                width: 100%;
                right: -100%;
            }
        }
        
        @media (max-width: 576px) {
            .hero {
                height: 400px;
            }
            
            .hero h1 {
                font-size: 30px;
            }
            
            .section-title {
                font-size: 28px;
            }
            
            .auth-form {
                padding: 30px 20px;
            }
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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

    <!-- Main Content (changes based on page) -->
    <main>
        <!-- Home Page -->
        <section class="hero">
            <div class="hero-content">
                <h1>Discover Your Signature Scent</h1>
                <p>Explore our exquisite collection of premium perfumes crafted with the finest ingredients from around the world.</p>
                <a href="products.php" class="btn">Shop Now</a>
            </div>
        </section>

       

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>Essence</h3>
                    <p>Premium perfumes crafted with passion and the finest ingredients from around the world.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-pinterest"></i></a>
                    </div>
                </div>
                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="products.php">Products</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Customer Service</h3>
                    <ul>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Shipping & Returns</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Contact Us</h3>
                    <ul>
                        <li><i class="fas fa-map-marker-alt"></i> 123 Perfume Street, Fragrance City</li>
                        <li><i class="fas fa-phone"></i> +1 (555) 123-4567</li>
                        <li><i class="fas fa-envelope"></i> info@essence.com</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2023 Essence. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Cart Sidebar -->
    <div class="cart-sidebar" id="cart-sidebar">
        <div class="cart-header">
            <h3>Your Cart</h3>
            <button class="close-cart" id="close-cart">&times;</button>
        </div>
        <div class="cart-items" id="cart-items">
            <!-- Cart items will be added here dynamically -->
            <p class="empty-cart-message">Your cart is empty</p>
        </div>
        <div class="cart-summary">
            <div class="cart-total">
                <span>Total:</span>
                <span id="cart-total">$0.00</span>
            </div>
            <a href="checkout.html" class="btn checkout-btn">Proceed to Checkout</a>
        </div>
    </div>
    <div class="overlay" id="overlay"></div>

    <!-- Login Page (hidden by default) -->
    <div id="login-page" style="display: none;">
        <div class="auth-container">
            <div class="auth-form">
                <h2>Login</h2>
                <form id="login-form">
                    <div class="form-group">
                        <label for="login-email">Email</label>
                        <input type="email" id="login-email" required>
                    </div>
                    <div class="form-group">
                        <label for="login-password">Password</label>
                        <input type="password" id="login-password" required>
                    </div>
                    <button type="submit" class="btn">Login</button>
                </form>
                <div class="auth-extra">
                    <p>Don't have an account? <a href="signup.html">Sign up here</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Signup Page (hidden by default) -->
    <div id="signup-page" style="display: none;">
        <div class="auth-container">
            <div class="auth-form">
                <h2>Create Account</h2>
                <form id="signup-form">
                    <div class="form-group">
                        <label for="signup-name">Full Name</label>
                        <input type="text" id="signup-name" required>
                    </div>
                    <div class="form-group">
                        <label for="signup-email">Email</label>
                        <input type="email" id="signup-email" required>
                    </div>
                    <div class="form-group">
                        <label for="signup-password">Password</label>
                        <input type="password" id="signup-password" required>
                    </div>
                    <div class="form-group">
                        <label for="signup-confirm">Confirm Password</label>
                        <input type="password" id="signup-confirm" required>
                    </div>
                    <button type="submit" class="btn">Sign Up</button>
                </form>
                <div class="auth-extra">
                    <p>Already have an account? <a href="login.html">Login here</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- About Page (hidden by default) -->
    <div id="about-page" style="display: none;">
        <section class="about-section">
            <div class="container">
                <div class="about-content">
                    <div class="about-text">
                        <h2>Our Story</h2>
                        <p>Founded in 2010, Essence began as a small boutique perfumery with a passion for creating unique, memorable scents. Our founder, a master perfumer with over 20 years of experience, wanted to bring the art of fine fragrance to everyone.</p>
                        <p>Today, we've grown into a globally recognized brand, but we've never lost sight of our roots. Each Essence perfume is still handcrafted in small batches using only the finest natural ingredients sourced from ethical suppliers around the world.</p>
                        <p>We believe that a fragrance should be as unique as the person wearing it. That's why we offer a wide range of scents to suit every personality and occasion, from light and floral to deep and mysterious.</p>
                    </div>
                    <div class="about-img">
                        <img src="https://images.unsplash.com/photo-1595425964079-6b5af0a80a4e?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Our Perfume Lab">
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Contact Page (hidden by default) -->
    <div id="contact-page" style="display: none;">
        <section class="contact-section">
            <div class="container">
                <h2 class="section-title">Contact Us</h2>
                <div class="contact-container">
                    <div class="contact-info">
                        <h3>Get in Touch</h3>
                        <div class="contact-details">
                            <div>
                                <i class="fas fa-map-marker-alt"></i>
                                <span>123 Perfume Street, Fragrance City, FC 12345</span>
                            </div>
                            <div>
                                <i class="fas fa-phone"></i>
                                <span>+1 (555) 123-4567</span>
                            </div>
                            <div>
                                <i class="fas fa-envelope"></i>
                                <span>info@essence.com</span>
                            </div>
                            <div>
                                <i class="fas fa-clock"></i>
                                <span>Monday - Friday: 9:00 AM - 6:00 PM</span>
                            </div>
                        </div>
                        <h3>Follow Us</h3>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-pinterest"></i></a>
                        </div>
                    </div>
                    <div class="contact-form">
                        <h3>Send Us a Message</h3>
                        <form id="contact-form">
                            <div class="form-group">
                                <label for="contact-name">Name</label>
                                <input type="text" id="contact-name" required>
                            </div>
                            <div class="form-group">
                                <label for="contact-email">Email</label>
                                <input type="email" id="contact-email" required>
                            </div>
                            <div class="form-group">
                                <label for="contact-subject">Subject</label>
                                <input type="text" id="contact-subject" required>
                            </div>
                            <div class="form-group">
                                <label for="contact-message">Message</label>
                                <textarea id="contact-message" required></textarea>
                            </div>
                            <button type="submit" class="btn">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Products Page (hidden by default) -->
    <div id="products-page" style="display: none;">
        <section class="products-section">
            <div class="container">
                <h2 class="section-title">Our Perfumes</h2>
                <div class="filter-section">
                    <div class="filter-group">
                        <label for="category-filter">Category:</label>
                        <select id="category-filter">
                            <option value="all">All</option>
                            <option value="floral">Floral</option>
                            <option value="woody">Woody</option>
                            <option value="citrus">Citrus</option>
                            <option value="oriental">Oriental</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label for="sort-by">Sort by:</label>
                        <select id="sort-by">
                            <option value="featured">Featured</option>
                            <option value="price-low">Price: Low to High</option>
                            <option value="price-high">Price: High to Low</option>
                            <option value="name-asc">Name: A-Z</option>
                            <option value="name-desc">Name: Z-A</option>
                        </select>
                    </div>
                </div>
                <div class="products-grid">
                    <!-- Product 1 -->
                    <div class="product-card" data-category="floral">
                        <div class="product-img">
                            <img src="https://images.unsplash.com/photo-1594035910387-fea47794261f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Midnight Oud">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Midnight Oud</h3>
                            <p class="product-price">$89.99</p>
                            <button class="btn add-to-cart" data-id="1" data-name="Midnight Oud" data-price="89.99" data-image="https://images.unsplash.com/photo-1594035910387-fea47794261f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80">Add to Cart</button>
                        </div>
                    </div>
                    
                    <!-- Product 2 -->
                    <div class="product-card" data-category="floral">
                        <div class="product-img">
                            <img src="https://images.unsplash.com/photo-1615228939092-4c8ccc6b297a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Vanilla Orchid">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Vanilla Orchid</h3>
                            <p class="product-price">$75.99</p>
                            <button class="btn add-to-cart" data-id="2" data-name="Vanilla Orchid" data-price="75.99" data-image="https://images.unsplash.com/photo-1615228939092-4c8ccc6b297a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80">Add to Cart</button>
                        </div>
                    </div>
                    
                    <!-- Product 3 -->
                    <div class="product-card" data-category="citrus">
                        <div class="product-img">
                            <img src="https://images.unsplash.com/photo-1615634262413-ae6fcc0a4d1a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Citrus Blossom">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Citrus Blossom</h3>
                            <p class="product-price">$65.99</p>
                            <button class="btn add-to-cart" data-id="3" data-name="Citrus Blossom" data-price="65.99" data-image="https://images.unsplash.com/photo-1615634262413-ae6fcc0a4d1a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80">Add to Cart</button>
                        </div>
                    </div>
                    
                    <!-- Product 4 -->
                    <div class="product-card" data-category="oriental">
                        <div class="product-img">
                            <img src="https://images.unsplash.com/photo-1594035910387-fea47794261f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Amber Noir">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Amber Noir</h3>
                            <p class="product-price">$95.99</p>
                            <button class="btn add-to-cart" data-id="4" data-name="Amber Noir" data-price="95.99" data-image="https://images.unsplash.com/photo-1594035910387-fea47794261f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80">Add to Cart</button>
                        </div>
                    </div>
                    
                    <!-- Product 5 -->
                    <div class="product-card" data-category="woody">
                        <div class="product-img">
                            <img src="https://images.unsplash.com/photo-1615634262413-ae6fcc0a4d1a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Sandalwood Mystique">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Sandalwood Mystique</h3>
                            <p class="product-price">$85.99</p>
                            <button class="btn add-to-cart" data-id="5" data-name="Sandalwood Mystique" data-price="85.99" data-image="https://images.unsplash.com/photo-1615634262413-ae6fcc0a4d1a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80">Add to Cart</button>
                        </div>
                    </div>
                    
                    <!-- Product 6 -->
                    <div class="product-card" data-category="floral">
                        <div class="product-img">
                            <img src="https://images.unsplash.com/photo-1615228939092-4c8ccc6b297a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Rose Elixir">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Rose Elixir</h3>
                            <p class="product-price">$78.99</p>
                            <button class="btn add-to-cart" data-id="6" data-name="Rose Elixir" data-price="78.99" data-image="https://images.unsplash.com/photo-1615228939092-4c8ccc6b297a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80">Add to Cart</button>
                        </div>
                    </div>
                    
                    <!-- Product 7 -->
                    <div class="product-card" data-category="citrus">
                        <div class="product-img">
                            <img src="https://images.unsplash.com/photo-1615634262413-ae6fcc0a4d1a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Lemon Zest">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Lemon Zest</h3>
                            <p class="product-price">$62.99</p>
                            <button class="btn add-to-cart" data-id="7" data-name="Lemon Zest" data-price="62.99" data-image="https://images.unsplash.com/photo-1615634262413-ae6fcc0a4d1a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80">Add to Cart</button>
                        </div>
                    </div>
                    
                    <!-- Product 8 -->
                    <div class="product-card" data-category="oriental">
                        <div class="product-img">
                            <img src="https://images.unsplash.com/photo-1594035910387-fea47794261f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Spice Route">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name">Spice Route</h3>
                            <p class="product-price">$88.99</p>
                            <button class="btn add-to-cart" data-id="8" data-name="Spice Route" data-price="88.99" data-image="https://images.unsplash.com/photo-1594035910387-fea47794261f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Checkout Page (hidden by default) -->
    <div id="checkout-page" style="display: none;">
        <section class="checkout-section">
            <div class="container">
                <h2 class="section-title">Checkout</h2>
                <div class="checkout-container">
                    <div class="checkout-form">
                        <h3>Billing Details</h3>
                        <form id="billing-form">
                            <div class="form-group">
                                <label for="first-name">First Name</label>
                                <input type="text" id="first-name" required>
                            </div>
                            <div class="form-group">
                                <label for="last-name">Last Name</label>
                                <input type="text" id="last-name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="tel" id="phone" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" id="address" required>
                            </div>
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" id="city" required>
                            </div>
                            <div class="form-group">
                                <label for="country">Country</label>
                                <select id="country" required>
                                    <option value="">Select Country</option>
                                    <option value="US">United States</option>
                                    <option value="UK">United Kingdom</option>
                                    <option value="CA">Canada</option>
                                    <option value="AU">Australia</option>
                                    <option value="FR">France</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="zip">ZIP Code</label>
                                <input type="text" id="zip" required>
                            </div>
                            
                            <h3>Payment Method</h3>
                            <div class="form-group">
                                <div class="payment-method">
                                    <input type="radio" id="credit-card" name="payment" checked>
                                    <label for="credit-card">Credit Card</label>
                                </div>
                                <div class="payment-method">
                                    <input type="radio" id="paypal" name="payment">
                                    <label for="paypal">PayPal</label>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="card-number">Card Number</label>
                                <input type="text" id="card-number" required>
                            </div>
                            <div class="form-group">
                                <label for="card-name">Name on Card</label>
                                <input type="text" id="card-name" required>
                            </div>
                            <div class="form-group-row">
                                <div class="form-group">
                                    <label for="expiry">Expiry Date</label>
                                    <input type="text" id="expiry" placeholder="MM/YY" required>
                                </div>
                                <div class="form-group">
                                    <label for="cvv">CVV</label>
                                    <input type="text" id="cvv" required>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn">Place Order</button>
                        </form>
                    </div>
                    <div class="checkout-summary">
                        <h3>Your Order</h3>
                        <div id="checkout-items">
                            <!-- Order items will be added here dynamically -->
                        </div>
                        <div class="summary-item">
                            <span>Subtotal</span>
                            <span id="subtotal">$0.00</span>
                        </div>
                        <div class="summary-item">
                            <span>Shipping</span>
                            <span>$5.99</span>
                        </div>
                        <div class="summary-item summary-total">
                            <span>Total</span>
                            <span id="order-total">$0.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        // Simple page routing
        document.addEventListener('DOMContentLoaded', function() {
            // Get current page from URL
            const path = window.location.pathname.split('/').pop();
            
            // Hide all pages
            document.querySelector('main').style.display = 'none';
            document.getElementById('login-page').style.display = 'none';
            document.getElementById('signup-page').style.display = 'none';
            document.getElementById('about-page').style.display = 'none';
            document.getElementById('contact-page').style.display = 'none';
            document.getElementById('products-page').style.display = 'none';
            document.getElementById('checkout-page').style.display = 'none';
            
            // Show current page
            if (path === 'login.html') {
                document.getElementById('login-page').style.display = 'block';
            } else if (path === 'signup.html') {
                document.getElementById('signup-page').style.display = 'block';
            } else if (path === 'about.html') {
                document.getElementById('about-page').style.display = 'block';
            } else if (path === 'contact.html') {
                document.getElementById('contact-page').style.display = 'block';
            } else if (path === 'products.html') {
                document.getElementById('products-page').style.display = 'block';
            } else if (path === 'checkout.html') {
                document.getElementById('checkout-page').style.display = 'block';
                updateCheckoutItems();
            } else {
                document.querySelector('main').style.display = 'block';
            }
            
            // Cart functionality
            const cartToggle = document.getElementById('cart-toggle');
            const closeCart = document.getElementById('close-cart');
            const cartSidebar = document.getElementById('cart-sidebar');
            const overlay = document.getElementById('overlay');
            
            cartToggle.addEventListener('click', function(e) {
                e.preventDefault();
                cartSidebar.classList.add('open');
                overlay.classList.add('active');
            });
            
            closeCart.addEventListener('click', function() {
                cartSidebar.classList.remove('open');
                overlay.classList.remove('active');
            });
            
            overlay.addEventListener('click', function() {
                cartSidebar.classList.remove('open');
                overlay.classList.remove('active');
            });
            
            // Add to cart functionality
            const addToCartButtons = document.querySelectorAll('.add-to-cart');
            addToCartButtons.forEach(button => {
                button.addEventListener('click', addToCartClicked);
            });
            
            // Initialize cart
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            updateCartCount();
            
            // Form submissions
            const loginForm = document.getElementById('login-form');
            if (loginForm) {
                loginForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    alert('Login functionality would be implemented here');
                    // In a real app, you would send this data to your server
                });
            }
            
            const signupForm = document.getElementById('signup-form');
            if (signupForm) {
                signupForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    alert('Signup functionality would be implemented here');
                    // In a real app, you would send this data to your server
                });
            }
            
            const contactForm = document.getElementById('contact-form');
            if (contactForm) {
                contactForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    alert('Thank you for your message! We will get back to you soon.');
                    contactForm.reset();
                });
            }
            
            const billingForm = document.getElementById('billing-form');
            if (billingForm) {
                billingForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    alert('Thank you for your order! Your payment has been processed.');
                    // Clear cart
                    cart = [];
                    localStorage.setItem('cart', JSON.stringify(cart));
                    updateCartCount();
                    // Redirect to home page
                    window.location.href = 'index.html';
                });
            }
            
            // Filter functionality on products page
            const categoryFilter = document.getElementById('category-filter');
            const sortBy = document.getElementById('sort-by');
            
            if (categoryFilter && sortBy) {
                categoryFilter.addEventListener('change', filterProducts);
                sortBy.addEventListener('change', filterProducts);
            }
        });
        
        function addToCartClicked(event) {
            const button = event.target;
            const productCard = button.closest('.product-card');
            const id = button.getAttribute('data-id');
            const name = button.getAttribute('data-name');
            const price = button.getAttribute('data-price');
            const image = button.getAttribute('data-image');
            
            addItemToCart(id, name, price, image);
            updateCartCount();
        }
        
        function addItemToCart(id, name, price, image) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            
            // Check if item already in cart
            const existingItem = cart.find(item => item.id === id);
            
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({
                    id: id,
                    name: name,
                    price: parseFloat(price),
                    image: image,
                    quantity: 1
                });
            }
            
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartItems();
        }
        
        function updateCartCount() {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            const cartCount = document.querySelector('.cart-count');
            
            const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
            cartCount.textContent = totalItems;
        }
        
        function updateCartItems() {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            const cartItems = document.getElementById('cart-items');
            const cartTotal = document.getElementById('cart-total');
            
            // Clear cart items
            cartItems.innerHTML = '';
            
            if (cart.length === 0) {
                cartItems.innerHTML = '<p class="empty-cart-message">Your cart is empty</p>';
                cartTotal.textContent = '$0.00';
                return;
            }
            
            let total = 0;
            
            cart.forEach(item => {
                const itemTotal = item.price * item.quantity;
                total += itemTotal;
                
                const cartItemElement = document.createElement('div');
                cartItemElement.className = 'cart-item';
                cartItemElement.innerHTML = `
                    <div class="cart-item-img">
                        <img src="${item.image}" alt="${item.name}">
                    </div>
                    <div class="cart-item-details">
                        <h4 class="cart-item-name">${item.name}</h4>
                        <p class="cart-item-price">$${item.price.toFixed(2)}</p>
                        <div class="cart-item-actions">
                            <div class="quantity-control">
                                <button class="quantity-btn minus" data-id="${item.id}">-</button>
                                <span class="quantity">${item.quantity}</span>
                                <button class="quantity-btn plus" data-id="${item.id}">+</button>
                            </div>
                            <button class="remove-item" data-id="${item.id}">Remove</button>
                        </div>
                    </div>
                `;
                
                cartItems.appendChild(cartItemElement);
            });
            
            // Add event listeners to quantity buttons
            document.querySelectorAll('.quantity-btn.minus').forEach(button => {
                button.addEventListener('click', decreaseQuantity);
            });
            
            document.querySelectorAll('.quantity-btn.plus').forEach(button => {
                button.addEventListener('click', increaseQuantity);
            });
            
            document.querySelectorAll('.remove-item').forEach(button => {
                button.addEventListener('click', removeItem);
            });
            
            cartTotal.textContent = `$${total.toFixed(2)}`;
        }
        
        function updateCheckoutItems() {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            const checkoutItems = document.getElementById('checkout-items');
            const subtotal = document.getElementById('subtotal');
            const orderTotal = document.getElementById('order-total');
            
            // Clear checkout items
            checkoutItems.innerHTML = '';
            
            if (cart.length === 0) {
                checkoutItems.innerHTML = '<p>No items in cart</p>';
                subtotal.textContent = '$0.00';
                orderTotal.textContent = '$0.00';
                return;
            }
            
            let total = 0;
            
            cart.forEach(item => {
                const itemTotal = item.price * item.quantity;
                total += itemTotal;
                
                const checkoutItemElement = document.createElement('div');
                checkoutItemElement.className = 'summary-item';
                checkoutItemElement.innerHTML = `
                    <span>${item.name} × ${item.quantity}</span>
                    <span>$${itemTotal.toFixed(2)}</span>
                `;
                
                checkoutItems.appendChild(checkoutItemElement);
            });
            
            subtotal.textContent = `$${total.toFixed(2)}`;
            orderTotal.textContent = `$${(total + 5.99).toFixed(2)}`;
        }
        
        function decreaseQuantity(event) {
            const id = event.target.getAttribute('data-id');
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            
            const itemIndex = cart.findIndex(item => item.id === id);
            
            if (itemIndex !== -1) {
                if (cart[itemIndex].quantity > 1) {
                    cart[itemIndex].quantity -= 1;
                } else {
                    cart.splice(itemIndex, 1);
                }
                
                localStorage.setItem('cart', JSON.stringify(cart));
                updateCartItems();
                updateCartCount();
            }
        }
        
        function increaseQuantity(event) {
            const id = event.target.getAttribute('data-id');
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            
            const itemIndex = cart.findIndex(item => item.id === id);
            
            if (itemIndex !== -1) {
                cart[itemIndex].quantity += 1;
                localStorage.setItem('cart', JSON.stringify(cart));
                updateCartItems();
                updateCartCount();
            }
        }
        
        function removeItem(event) {
            const id = event.target.getAttribute('data-id');
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            
            cart = cart.filter(item => item.id !== id);
            
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartItems();
            updateCartCount();
        }
        
        function filterProducts() {
            const category = document.getElementById('category-filter').value;
            const sortBy = document.getElementById('sort-by').value;
            const productCards = document.querySelectorAll('.product-card');
            
            // Filter by category
            productCards.forEach(card => {
                if (category === 'all' || card.getAttribute('data-category') === category) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
            
            // Sort products
            const visibleProducts = Array.from(productCards).filter(card => card.style.display !== 'none');
            
            visibleProducts.sort((a, b) => {
                const nameA = a.querySelector('.product-name').textContent.toLowerCase();
                const nameB = b.querySelector('.product-name').textContent.toLowerCase();
                const priceA = parseFloat(a.querySelector('.product-price').textContent.replace('$', ''));
                const priceB = parseFloat(b.querySelector('.product-price').textContent.replace('$', ''));
                
                switch (sortBy) {
                    case 'price-low':
                        return priceA - priceB;
                    case 'price-high':
                        return priceB - priceA;
                    case 'name-asc':
                        return nameA.localeCompare(nameB);
                    case 'name-desc':
                        return nameB.localeCompare(nameA);
                    default:
                        return 0; // featured - keep original order
                }
            });
            
            // Reorder products in DOM
            const productsGrid = document.querySelector('.products-grid');
            visibleProducts.forEach(product => {
                productsGrid.appendChild(product);
            });
        }
    </script>
</body>
</html>