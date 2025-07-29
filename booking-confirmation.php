<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation - RentACar.com</title>
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
        
        /* Confirmation section */
        .confirmation-section {
            padding: 3rem 0;
        }
        
        .confirmation-card {
            background-color: white;
            border-radius: 8px;
            padding: 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
        }
        
        .confirmation-icon {
            font-size: 4rem;
            color: #4CAF50;
            margin-bottom: 1rem;
        }
        
        .confirmation-title {
            font-size: 2rem;
            color: #003580;
            margin-bottom: 1rem;
        }
        
        .confirmation-message {
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }
        
        .booking-details {
            background-color: #f9f9f9;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            text-align: left;
        }
        
        .booking-number {
            font-size: 1.2rem;
            font-weight: bold;
            color: #003580;
            margin-bottom: 1rem;
            text-align: center;
        }
        
        .details-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }
        
        .detail-group {
            margin-bottom: 1rem;
        }
        
        .detail-label {
            font-weight: 500;
            color: #666;
            margin-bottom: 0.3rem;
        }
        
        .detail-value {
            font-weight: 600;
            color: #333;
        }
        
        .car-details {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .car-image {
            width: 120px;
            height: 80px;
            background-color: #eee;
            background-size: cover;
            background-position: center;
            margin-right: 1rem;
            border-radius: 4px;
        }
        
        .car-info h3 {
            margin-bottom: 0.3rem;
            color: #003580;
        }
        
        .price-summary {
            margin-top: 1.5rem;
            border-top: 1px solid #ddd;
            padding-top: 1.5rem;
        }
        
        .price-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
        }
        
        .total-price {
            font-size: 1.3rem;
            font-weight: bold;
            color: #003580;
            margin-top: 0.5rem;
            text-align: right;
        }
        
        .action-buttons {
            margin-top: 2rem;
        }
        
        .primary-btn {
            display: inline-block;
            background-color: #003580;
            color: white;
            padding: 12px 25px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            margin-right: 1rem;
            transition: background-color 0.3s;
        }
        
        .primary-btn:hover {
            background-color: #00285e;
        }
        
        .secondary-btn {
            display: inline-block;
            background-color: #febb02;
            color: #003580;
            padding: 12px 25px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            transition: background-color 0.3s;
        }
        
        .secondary-btn:hover {
            background-color: #e9aa00;
        }
        
        /* Footer */
        footer {
            background-color: #002855;
            color: white;
            padding: 3rem 0 1.5rem;
            margin-top: 3rem;
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
            
            .action-buttons {
                display: flex;
                flex-direction: column;
            }
            
            .primary-btn, .secondary-btn {
                margin-right: 0;
                margin-bottom: 1rem;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <?php
    // Check if form was submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get form data
        $car_id = isset($_POST['car_id']) ? $_POST['car_id'] : '';
        $pickup_location = isset($_POST['pickup_location']) ? $_POST['pickup_location'] : '';
        $dropoff_location = isset($_POST['dropoff_location']) ? $_POST['dropoff_location'] : '';
        $pickup_date = isset($_POST['pickup_date']) ? $_POST['pickup_date'] : '';
        $pickup_time = isset($_POST['pickup_time']) ? $_POST['pickup_time'] : '';
        $dropoff_date = isset($_POST['dropoff_date']) ? $_POST['dropoff_date'] : '';
        $dropoff_time = isset($_POST['dropoff_time']) ? $_POST['dropoff_time'] : '';
        $total_price = isset($_POST['total_price']) ? $_POST['total_price'] : '';
        
        $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
        $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        
        // Get car details
        $car = null;
        if ($car_id) {
            $stmt = $conn->prepare("SELECT * FROM cars WHERE id = ?");
            $stmt->execute([$car_id]);
            $car = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        
        // Get location names
        $pickup_location_name = '';
        $dropoff_location_name = '';
        
        if ($pickup_location) {
            $stmt = $conn->prepare("SELECT name FROM locations WHERE id = ?");
            $stmt->execute([$pickup_location]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                $pickup_location_name = $result['name'];
            }
        }
        
        if ($dropoff_location) {
            $stmt = $conn->prepare("SELECT name FROM locations WHERE id = ?");
            $stmt->execute([$dropoff_location]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                $dropoff_location_name = $result['name'];
            }
        }
        
        // Calculate rental duration in days
        $pickup_datetime = new DateTime($pickup_date . ' ' . $pickup_time);
        $dropoff_datetime = new DateTime($dropoff_date . ' ' . $dropoff_time);
        $interval = $pickup_datetime->diff($dropoff_datetime);
        $days = $interval->days;
        if ($interval->h > 0 || $interval->i > 0) {
            $days += 1; // Partial day counts as full day
        }
        if ($days < 1) $days = 1;
        
        // Generate booking number
        $booking_number = 'RNT' . strtoupper(substr(md5(uniqid(rand(), true)), 0, 8));
        
        // In a real application, you would save the booking to the database here
        // For this demo, we'll just display the confirmation
    } else {
        // If not submitted via form, redirect to home
        header('Location: index.php');
        exit;
    }
    ?>

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

    <!-- Confirmation Section -->
    <section class="confirmation-section">
        <div class="container">
            <div class="confirmation-card">
                <div class="confirmation-icon">✓</div>
                <h1 class="confirmation-title">Booking Confirmed!</h1>
                <p class="confirmation-message">Thank you for your booking. We've sent a confirmation email to <?php echo htmlspecialchars($email); ?> with all the details.</p>
                
                <div class="booking-details">
                    <div class="booking-number">Booking #<?php echo $booking_number; ?></div>
                    
                    <div class="car-details">
                        <div class="car-image" style="background-image: url('https://source.unsplash.com/300x200/?' . <?php echo urlencode($car['make'] . ' ' . $car['model']); ?>);"></div>
                        <div class="car-info">
                            <h3><?php echo htmlspecialchars($car['make'] . ' ' . $car['model'] . ' (' . $car['year'] . ')'); ?></h3>
                            <p><?php echo htmlspecialchars($car['car_type']); ?></p>
                        </div>
                    </div>
                    
                    <div class="details-grid">
                        <div>
                            <div class="detail-group">
                                <div class="detail-label">Pickup Location</div>
                                <div class="detail-value"><?php echo htmlspecialchars($pickup_location_name); ?></div>
                            </div>
                            <div class="detail-group">
                                <div class="detail-label">Pickup Date & Time</div>
                                <div class="detail-value"><?php echo date('M d, Y', strtotime($pickup_date)); ?> at <?php echo date('g:i A', strtotime($pickup_time)); ?></div>
                            </div>
                        </div>
                        <div>
                            <div class="detail-group">
                                <div class="detail-label">Drop-off Location</div>
                                <div class="detail-value"><?php echo htmlspecialchars($dropoff_location_name); ?></div>
                            </div>
                            <div class="detail-group">
                                <div class="detail-label">Drop-off Date & Time</div>
                                <div class="detail-value"><?php echo date('M d, Y', strtotime($dropoff_date)); ?> at <?php echo date('g:i A', strtotime($dropoff_time)); ?></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="detail-group">
                        <div class="detail-label">Renter Information</div>
                        <div class="detail-value"><?php echo htmlspecialchars($first_name . ' ' . $last_name); ?></div>
                        <div class="detail-value"><?php echo htmlspecialchars($email); ?></div>
                        <div class="detail-value"><?php echo htmlspecialchars($phone); ?></div>
                    </div>
                    
                    <div class="price-summary">
                        <div class="price-row">
                            <span>Car Rental (<?php echo $days; ?> day<?php echo $days > 1 ? 's' : ''; ?>)</span>
                            <span>$<?php echo number_format($car['price_per_day'] * $days, 2); ?></span>
                        </div>
                        <div class="price-row">
                            <span>Insurance</span>
                            <span>Included</span>
                        </div>
                        <div class="price-row">
                            <span>Taxes & Fees</span>
                            <span>Included</span>
                        </div>
                        <div class="total-price">
                            Total: $<?php echo number_format($total_price, 2); ?>
                        </div>
                    </div>
                </div>
                
                <div class="action-buttons">
                    <a href="index.php" class="primary-btn">Return to Home</a>
                    <a href="#" class="secondary-btn" onclick="window.print(); return false;">Print Confirmation</a>
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
</body>
</html>
