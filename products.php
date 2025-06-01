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
    <title>Essence - Our Products</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
        
        .nav-links a.active {
            color: var(--primary-color);
            font-weight: 600;
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
        
        /* Products Section */
        .products-section {
            padding: 80px 0;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 50px;
            font-size: 36px;
            color: var(--primary-color);
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
        
        .filter-group label {
            font-weight: 500;
        }
        
        .filter-group select {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background: var(--white);
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .filter-group select:focus {
            outline: none;
            border-color: var(--primary-color);
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
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }
        
        .product-img {
            height: 250px;
            overflow: hidden;
            position: relative;
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
        
        .product-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background: var(--primary-color);
            color: var(--white);
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .product-info {
            padding: 20px;
        }
        
        .product-name {
            font-size: 18px;
            margin-bottom: 10px;
            transition: color 0.3s ease;
        }
        
        .product-card:hover .product-name {
            color: var(--primary-color);
        }
        
        .product-price {
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .old-price {
            text-decoration: line-through;
            color: #999;
            font-size: 14px;
            font-weight: 400;
        }
        
        .product-rating {
            color: #ffc107;
            margin-bottom: 15px;
        }
        
        .add-to-cart {
            width: 100%;
            transition: background 0.3s ease;
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
            transition: background 0.3s ease;
        }
        
        .quantity-btn:hover {
            background: var(--accent-color);
        }
        
        .quantity {
            margin: 0 10px;
        }
        
        .remove-item {
            background: none;
            border: none;
            color: #ff5252;
            cursor: pointer;
            transition: color 0.3s ease;
        }
        
        .remove-item:hover {
            color: #ff0000;
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
        
        /* Responsive Styles */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            
            .cart-sidebar {
                width: 100%;
                right: -100%;
            }
            
            .filter-section {
                flex-direction: column;
                align-items: flex-start;
            }
        }
        
        @media (max-width: 576px) {
            .section-title {
                font-size: 28px;
            }
            
            .products-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <nav class="navbar">
                <a href="index.html" class="logo">Essence</a>
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

    <!-- Products Section -->
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
                        <img src="https://www.dermstore.com/images?url=https://static.thcdn.com/productimg/original/15814459-2675201993134074.jpg&format=webp&auto=avif&width=820&height=820&fit=cover" alt="Midnight Oud">
                        <span class="product-badge">Bestseller</span>
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">Almond Suede</h3>
                        <div class="product-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span>(128)</span>
                        </div>
                        <div class="product-price">
                            $89.99 <span class="old-price">$205.99</span>
                        </div>
                        <button class="btn add-to-cart" data-id="1" data-name="Midnight Oud" data-price="89.99" data-image="https://images.unsplash.com/photo-1594035910387-fea47794261f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80">Add to Cart</button>
                    </div>
                </div>
                
                <!-- Product 2 -->
                <div class="product-card" data-category="floral">
                    <div class="product-img">
                        <img src="https://www.dermstore.com/images?url=https://static.thcdn.com/productimg/original/13997574-4624997336311047.jpg&format=webp&auto=avif&width=820&height=820&fit=cover" alt="Vanilla Orchid">
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">Indigo Smoke </h3>
                        <div class="product-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <span>(95)</span>
                        </div>
                        <div class="product-price">$200.99</div>
                        <button class="btn add-to-cart" data-id="2" data-name="Indigo Smoke " data-price="75.99" data-image="https://images.unsplash.com/photo-1615228939092-4c8ccc6b297a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80">Add to Cart</button>
                    </div>
                </div>
                
                <!-- Product 3 -->
                <div class="product-card" data-category="citrus">
                    <div class="product-img">
                        <img src="https://i.ebayimg.com/images/g/pwEAAOSwo-FjxUYV/s-l960.webp" alt="Citrus Blossom">
                        <span class="product-badge">New</span>
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">ROJA</h3>
                        <div class="product-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span>(210)</span>
                        </div>
                        <div class="product-price">$65.99</div>
                        <button class="btn add-to-cart" data-id="3" data-name="Citrus Blossom" data-price="65.99" data-image="https://images.unsplash.com/photo-1615634262413-ae6fcc0a4d1a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80">Add to Cart</button>
                    </div>
                </div>
                
                <!-- Product 4 -->
                <div class="product-card" data-category="oriental">
                    <div class="product-img">
                        <img src="https://www.dermstore.com/images?url=https://static.thcdn.com/productimg/original/13898926-1674974655164117.jpg&format=webp&auto=avif&width=820&height=820&fit=cover" alt="Amber Noir">
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">Flor y Canto </h3>
                        <div class="product-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span>(76)</span>
                        </div>
                        <div class="product-price">$95.99</div>
                        <button class="btn add-to-cart" data-id="4" data-name="Amber Noir" data-price="95.99" data-image="https://images.unsplash.com/photo-1594035910387-fea47794261f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80">Add to Cart</button>
                    </div>
                </div>
                
                <!-- Product 5 -->
                <div class="product-card" data-category="woody">
                    <div class="product-img">
                        <img src="https://i.ebayimg.com/images/g/9z8AAOSw971mZ0Sh/s-l960.webp" alt="Sandalwood Mystique">
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">Terre D'Hermes </h3>
                        <div class="product-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <span>(42)</span>
                        </div>
                        <div class="product-price">$85.99</div>
                        <button class="btn add-to-cart" data-id="5" data-name="Sandalwood Mystique" data-price="85.99" data-image="https://images.unsplash.com/photo-1615634262413-ae6fcc0a4d1a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80">Add to Cart</button>
                    </div>
                </div>
                
                <!-- Product 6 -->
                <div class="product-card" data-category="floral">
                    <div class="product-img">
                        <img src="https://i.ebayimg.com/images/g/OXoAAOSwHL9oAles/s-l960.webp" alt="Rose Elixir">
                        <span class="product-badge">Sale</span>
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">Ard Al Zaafaran  </h3>
                        <div class="product-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span>(153)</span>
                        </div>
                        <div class="product-price">
                            $78.99 <span class="old-price">$98.99</span>
                        </div>
                        <button class="btn add-to-cart" data-id="6" data-name="Rose Elixir" data-price="78.99" data-image="https://images.unsplash.com/photo-1615228939092-4c8ccc6b297a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80">Add to Cart</button>
                    </div>
                </div>
                
                <!-- Product 7 -->
                <div class="product-card" data-category="citrus">
                    <div class="product-img">
                        <img src="https://i.ebayimg.com/images/g/fcwAAOSwm7RoIcWb/s-l1600.webp" alt="Lemon Zest">
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">Rasasi Hawas</h3>
                        <div class="product-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                            <span>(67)</span>
                        </div>
                        <div class="product-price">$62.99</div>
                        <button class="btn add-to-cart" data-id="7" data-name="Lemon Zest" data-price="62.99" data-image="https://images.unsplash.com/photo-1615634262413-ae6fcc0a4d1a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80">Add to Cart</button>
                    </div>
                </div>
                
                <!-- Product 8 -->
                <div class="product-card" data-category="oriental">
                    <div class="product-img">
                        <img src="https://i.ebayimg.com/images/g/9NsAAOSwdj5nZVSL/s-l1600.webp" alt="Spice Route">
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">Andaleeb Flora</h3>
                        <div class="product-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <span>(89)</span>
                        </div>
                        <div class="product-price">$88.99</div>
                        <button class="btn add-to-cart" data-id="8" data-name="Spice Route" data-price="88.99" data-image="https://images.unsplash.com/photo-1594035910387-fea47794261f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80">Add to Cart</button>
                    </div>
                </div>
            </div>
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
                        <li><a href="index.html">Home</a></li>
                        <li><a href="products.html" class="active">Products</a></li>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="contact.html">Contact</a></li>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
            updateCartItems();
            
            // Filter functionality
            const categoryFilter = document.getElementById('category-filter');
            const sortBy = document.getElementById('sort-by');
            
            categoryFilter.addEventListener('change', filterProducts);
            sortBy.addEventListener('change', filterProducts);
            
            // Set active filter/sort from URL params if present
            const urlParams = new URLSearchParams(window.location.search);
            const categoryParam = urlParams.get('category');
            const sortParam = urlParams.get('sort');
            
            if (categoryParam) {
                categoryFilter.value = categoryParam;
                filterProducts();
            }
            
            if (sortParam) {
                sortBy.value = sortParam;
                filterProducts();
            }
        });
        
        function addToCartClicked(event) {
            const button = event.target;
            const id = button.getAttribute('data-id');
            const name = button.getAttribute('data-name');
            const price = button.getAttribute('data-price');
            const image = button.getAttribute('data-image');
            
            addItemToCart(id, name, price, image);
            updateCartCount();
            
            // Show cart sidebar
            document.getElementById('cart-sidebar').classList.add('open');
            document.getElementById('overlay').classList.add('active');
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
            const sortBy