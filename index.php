<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RentACar.com - Find Your Perfect Rental Car</title>
    <style>
        /* Reset and base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
        }
        
        /* Header styles */
        header {
            background-color: #003580;
            color: white;
            padding: 1rem 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 2rem;
            font-weight: bold;
            color: white;
            text-decoration: none;
        }
        
        .logo span {
            color: #febb02;
        }
        
        nav ul {
            display: flex;
            list-style: none;
        }
        
        nav ul li {
            margin-left: 1.5rem;
        }
        
        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }
        
        nav ul li a:hover {
            color: #febb02;
        }
        
        /* Hero section */
        .hero {
            background-image: linear-gradient(rgba(0, 53, 128, 0.7), rgba(0, 53, 128, 0.7)), url('https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            height: 500px;
            display: flex;
            align-items: center;
            color: white;
            text-align: center;
        }
        
        .hero-content {
            width: 100%;
        }
        
        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }
        
        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }
        
        /* Search form */
        .search-form {
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            max-width: 900px;
            margin: -50px auto 3rem;
            position: relative;
        }
        
        .form-row {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 1rem;
        }
        
        .form-group {
            flex: 1;
            min-width: 200px;
            margin: 0 10px 15px 0;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
            color: #555;
        }
        
        .form-group select,
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }
        
        .search-btn {
            background-color: #003580;
            color: white;
            border: none;
            padding: 12px 25px;
            font-size: 1rem;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
            margin-top: 10px;
        }
        
        .search-btn:hover {
            background-color: #00285e;
        }
        
        /* Featured cars section */
        .section-title {
            text-align: center;
            margin-bottom: 2rem;
            font-size: 2rem;
            color: #003580;
        }
        
        .cars-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }
        
        .car-card {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .car-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        
        .car-image {
            height: 180px;
            background-color: #eee;
            background-size: cover;
            background-position: center;
        }
        
        .car-details {
            padding: 1.5rem;
        }
        
        .car-title {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
            color: #003580;
        }
        
        .car-type {
            color: #666;
            margin-bottom: 0.5rem;
        }
        
        .car-features {
            display: flex;
            margin-bottom: 1rem;
        }
        
        .feature {
            margin-right: 1rem;
            display: flex;
            align-items: center;
            color: #666;
            font-size: 0.9rem;
        }
        
        .car-price {
            font-size: 1.3rem;
            font-weight: bold;
            color: #003580;
            margin-bottom: 1rem;
        }
        
        .view-btn {
            display: inline-block;
            background-color: #febb02;
            color: #003580;
            padding: 8px 15px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            transition: background-color 0.3s;
        }
        
        .view-btn:hover {
            background-color: #e9aa00;
        }
        
        /* Why choose us section */
        .why-us {
            background-color: #003580;
            color: white;
            padding: 4rem 0;
            margin-bottom: 3rem;
        }
        
        .why-us .section-title {
            color: white;
        }
        
        .benefits {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }
        
        .benefit {
            text-align: center;
            padding: 1.5rem;
        }
        
        .benefit-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #febb02;
        }
        
        .benefit h3 {
            margin-bottom: 0.5rem;
        }
        
        /* Footer */
        footer {
            background-color: #002855;
            color: white;
            padding: 3rem 0 1.5rem;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }
        
        .footer-column h3 {
            margin-bottom: 1rem;
            color: #febb02;
        }
        
        .footer-column ul {
            list-style: none;
        }
        
        .footer-column ul li {
            margin-bottom: 0.5rem;
        }
        
        .footer-column ul li a {
            color: #ddd;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-column ul li a:hover {
            color: #febb02;
        }
        
        .copyright {
            text-align: center;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(255,255,255,0.1);
            color: #aaa;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                text-align: center;
            }
            
            nav ul {
                margin-top: 1rem;
            }
            
            .hero h1 {
                font-size: 2.2rem;
            }
            
            .search-form {
                padding: 1.5rem;
            }
            
            .form-group {
                flex: 100%;
                margin-right: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="header-content">
                <a href="index.php" class="logo">Rent<span>ACar</span>.com</a>
                <nav>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#">Cars</a></li>
                        <li><a href="#">Locations</a></li>
                        <li><a href="#">Deals</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Find Your Perfect Rental Car</h1>
                <p>Compare prices from top rental companies and find the perfect car for your trip</p>
            </div>
        </div>
    </section>

    <!-- Search Form -->
    <div class="container">
        <form class="search-form" action="results.php" method="GET">
            <div class="form-row">
                <div class="form-group">
                    <label for="pickup-location">Pickup Location</label>
                    <select id="pickup-location" name="pickup_location" required>
                        <option value="">Select location</option>
                        <?php
                        $stmt = $conn->prepare("SELECT * FROM locations ORDER BY name");
                        $stmt->execute();
                        $locations = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        
                        foreach($locations as $location) {
                            echo "<option value='" . $location['id'] . "'>" . $location['name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="dropoff-location">Drop-off Location</label>
                    <select id="dropoff-location" name="dropoff_location" required>
                        <option value="">Select location</option>
                        <?php
                        foreach($locations as $location) {
                            echo "<option value='" . $location['id'] . "'>" . $location['name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="pickup-date">Pickup Date</label>
                    <input type="date" id="pickup-date" name="pickup_date" required min="<?php echo date('Y-m-d'); ?>">
                </div>
                <div class="form-group">
                    <label for="pickup-time">Pickup Time</label>
                    <input type="time" id="pickup-time" name="pickup_time" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="dropoff-date">Drop-off Date</label>
                    <input type="date" id="dropoff-date" name="dropoff_date" required min="<?php echo date('Y-m-d'); ?>">
                </div>
                <div class="form-group">
                    <label for="dropoff-time">Drop-off Time</label>
                    <input type="time" id="dropoff-time" name="dropoff_time" required>
                </div>
            </div>
            <button type="submit" class="search-btn">Search Available Cars</button>
        </form>
    </div>

    <!-- Featured Cars Section -->
    <div class="container">
        <h2 class="section-title">Featured Cars</h2>
        <div class="cars-grid">
            <?php
            $stmt = $conn->prepare("SELECT * FROM cars ORDER BY RAND() LIMIT 6");
            $stmt->execute();
            $featured_cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            foreach($featured_cars as $car) {
                echo '
                <div class="car-card">
                    <div class="car-image" style="background-image: url(\'https://source.unsplash.com/300x200/?' . urlencode($car['make'] . ' ' . $car['model']) . '\');"></div>
                    <div class="car-details">
                        <h3 class="car-title">' . $car['make'] . ' ' . $car['model'] . ' (' . $car['year'] . ')</h3>
                        <p class="car-type">' . $car['car_type'] . '</p>
                        <div class="car-features">
                            <span class="feature">' . $car['seats'] . ' Seats</span>
                            <span class="feature">' . $car['fuel_type'] . '</span>
                        </div>
                        <p class="car-price">$' . number_format($car['price_per_day'], 2) . ' / day</p>
                        <a href="car-details.php?id=' . $car['id'] . '" class="view-btn">View Details</a>
                    </div>
                </div>
                ';
            }
            ?>
        </div>
    </div>

    <!-- Why Choose Us Section -->
    <section class="why-us">
        <div class="container">
            <h2 class="section-title">Why Choose RentACar.com</h2>
            <div class="benefits">
                <div class="benefit">
                    <div class="benefit-icon">💰</div>
                    <h3>Best Price Guarantee</h3>
                    <p>We offer the best rates and will match any lower price you find.</p>
                </div>
                <div class="benefit">
                    <div class="benefit-icon">🚗</div>
                    <h3>Wide Selection</h3>
                    <p>Choose from economy, luxury, SUVs, and more to fit your needs.</p>
                </div>
                <div class="benefit">
                    <div class="benefit-icon">⭐</div>
                    <h3>Quality Vehicles</h3>
                    <p>All our vehicles are regularly serviced and maintained.</p>
                </div>
                <div class="benefit">
                    <div class="benefit-icon">🛡️</div>
                    <h3>24/7 Support</h3>
                    <p>Our customer service team is available around the clock.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>RentACar.com</h3>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Press</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Customer Service</h3>
                    <ul>
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Feedback</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Rental Information</h3>
                    <ul>
                        <li><a href="#">Rental Locations</a></li>
                        <li><a href="#">Car Types</a></li>
                        <li><a href="#">Rental Requirements</a></li>
                        <li><a href="#">Rental Policies</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Legal</h3>
                    <ul>
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Cookie Policy</a></li>
                        <li><a href="#">Security</a></li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2023 RentACar.com. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // JavaScript for form validation and date handling
        document.addEventListener('DOMContentLoaded', function() {
            const pickupDateInput = document.getElementById('pickup-date');
            const dropoffDateInput = document.getElementById('dropoff-date');
            const searchForm = document.querySelector('.search-form');
            
            // Set minimum date for pickup to today
            const today = new Date().toISOString().split('T')[0];
            pickupDateInput.min = today;
            
            // Update dropoff minimum date when pickup date changes
            pickupDateInput.addEventListener('change', function() {
                dropoffDateInput.min = this.value;
                
                // If dropoff date is before new pickup date, update it
                if (dropoffDateInput.value && dropoffDateInput.value < this.value) {
                    dropoffDateInput.value = this.value;
                }
            });
            
            // Form validation
            searchForm.addEventListener('submit', function(e) {
                const pickupLocation = document.getElementById('pickup-location').value;
                const dropoffLocation = document.getElementById('dropoff-location').value;
                const pickupDate = pickupDateInput.value;
                const dropoffDate = dropoffDateInput.value;
                const pickupTime = document.getElementById('pickup-time').value;
                const dropoffTime = document.getElementById('dropoff-time').value;
                
                if (!pickupLocation || !dropoffLocation || !pickupDate || !dropoffDate || !pickupTime || !dropoffTime) {
                    e.preventDefault();
                    alert('Please fill in all fields');
                    return;
                }
                
                // Check if pickup date is not in the past
                if (new Date(pickupDate) < new Date(today)) {
                    e.preventDefault();
                    alert('Pickup date cannot be in the past');
                    return;
                }
                
                // Check if dropoff date is not before pickup date
                if (new Date(dropoffDate) < new Date(pickupDate)) {
                    e.preventDefault();
                    alert('Drop-off date cannot be before pickup date');
                    return;
                }
                
                // If same day rental, check that dropoff time is after pickup time
                if (pickupDate === dropoffDate && dropoffTime <= pickupTime) {
                    e.preventDefault();
                    alert('For same-day rentals, drop-off time must be after pickup time');
                    return;
                }
            });
        });
    </script>
</body>
</html>
