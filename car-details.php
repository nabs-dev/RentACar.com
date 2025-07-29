<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Details - RentACar.com</title>
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
        
        /* Breadcrumbs */
        .breadcrumbs {
            padding: 1rem 0;
            background-color: white;
            border-bottom: 1px solid #eee;
        }
        
        .breadcrumbs ul {
            display: flex;
            list-style: none;
        }
        
        .breadcrumbs ul li {
            margin-right: 0.5rem;
        }
        
        .breadcrumbs ul li:after {
            content: '>';
            margin-left: 0.5rem;
            color: #999;
        }
        
        .breadcrumbs ul li:last-child:after {
            content: '';
        }
        
        .breadcrumbs ul li a {
            color: #003580;
            text-decoration: none;
        }
        
        .breadcrumbs ul li a:hover {
            text-decoration: underline;
        }
        
        /* Car details section */
        .car-details-section {
            margin: 2rem 0;
        }
        
        .car-details-container {
            display: flex;
            flex-wrap: wrap;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .car-gallery {
            width: 60%;
            min-width: 300px;
        }
        
        .main-image {
            width: 100%;
            height: 400px;
            background-color: #eee;
            background-size: cover;
            background-position: center;
        }
        
        .thumbnails {
            display: flex;
            padding: 1rem;
            background-color: #f9f9f9;
        }
        
        .thumbnail {
            width: 80px;
            height: 60px;
            margin-right: 0.5rem;
            background-color: #ddd;
            background-size: cover;
            background-position: center;
            cursor: pointer;
            border: 2px solid transparent;
            transition: border-color 0.3s;
        }
        
        .thumbnail:hover, .thumbnail.active {
            border-color: #003580;
        }
        
        .car-info {
            width: 40%;
            min-width: 300px;
            padding: 2rem;
        }
        
        .car-title {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            color: #003580;
        }
        
        .car-type {
            color: #666;
            margin-bottom: 1.5rem;
        }
        
        .car-features {
            margin-bottom: 1.5rem;
        }
        
        .features-title {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
            color: #003580;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0.5rem;
        }
        
        .feature {
            display: flex;
            align-items: center;
            color: #555;
        }
        
        .feature:before {
            content: '✓';
            margin-right: 0.5rem;
            color: #003580;
            font-weight: bold;
        }
        
        .car-description {
            margin-bottom: 1.5rem;
        }
        
        .description-title {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
            color: #003580;
        }
        
        /* Booking summary */
        .booking-summary {
            background-color: #f9f9f9;
            border-radius: 8px;
            padding: 1.5rem;
            margin-top: 2rem;
        }
        
        .summary-title {
            font-size: 1.2rem;
            margin-bottom: 1rem;
            color: #003580;
        }
        
        .summary-details {
            margin-bottom: 1rem;
        }
        
        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid #eee;
        }
        
        .summary-row:last-child {
            border-bottom: none;
        }
        
        .summary-label {
            font-weight: 500;
        }
        
        .total-price {
            font-size: 1.5rem;
            font-weight: bold;
            color: #003580;
            text-align: right;
            margin-bottom: 1rem;
        }
        
        .book-btn {
            display: block;
            width: 100%;
            background-color: #febb02;
            color: #003580;
            border: none;
            padding: 12px;
            font-size: 1rem;
            font-weight: 500;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-align: center;
            text-decoration: none;
        }
        
        .book-btn:hover {
            background-color: #e9aa00;
        }
        
        /* Tabs section */
        .tabs-section {
            margin: 2rem 0;
        }
        
        .tabs {
            display: flex;
            border-bottom: 1px solid #ddd;
        }
        
        .tab {
            padding: 1rem 1.5rem;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            border-bottom: none;
            margin-right: 0.5rem;
            border-radius: 4px 4px 0 0;
            cursor: pointer;
            font-weight: 500;
            color: #666;
            transition: background-color 0.3s;
        }
        
        .tab.active {
            background-color: white;
            color: #003580;
            border-bottom: 1px solid white;
            margin-bottom: -1px;
        }
        
        .tab-content {
            display: none;
            padding: 2rem;
            background-color: white;
            border: 1px solid #ddd;
            border-top: none;
            border-radius: 0 0 4px 4px;
        }
        
        .tab-content.active {
            display: block;
        }
        
        .tab-content h3 {
            margin-bottom: 1rem;
            color: #003580;
        }
        
        /* Similar cars section */
        .similar-cars {
            margin: 2rem 0;
        }
        
        .similar-cars-title {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            color: #003580;
        }
        
        .cars-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
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
        
        .car-card-image {
            height: 180px;
            background-color: #eee;
            background-size: cover;
            background-position: center;
        }
        
        .car-card-details {
            padding: 1.5rem;
        }
        
        .car-card-title {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
            color: #003580;
        }
        
        .car-card-type {
            color: #666;
            margin-bottom: 0.5rem;
        }
        
        .car-card-features {
            display: flex;
            margin-bottom: 1rem;
        }
        
        .car-card-price {
            font-size: 1.3rem;
            font-weight: bold;
            color: #003580;
            margin-bottom: 1rem;
        }
        
        /* Booking form */
        .booking-form {
            background-color: white;
            border-radius: 8px;
            padding: 2rem;
            margin-top: 2rem;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .form-title {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            color: #003580;
        }
        
        .form-row {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 1rem;
        }
        
        .form-group {
            flex: 1;
            min-width: 250px;
            margin-right: 1rem;
            margin-bottom: 1rem;
        }
        
        .form-group:last-child {
            margin-right: 0;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }
        
        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }
        
        .form-check {
            margin-bottom: 1rem;
        }
        
        .form-check input {
            margin-right: 0.5rem;
        }
        
        .submit-btn {
            background-color: #003580;
            color: white;
            border: none;
            padding: 12px 25px;
            font-size: 1rem;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .submit-btn:hover {
            background-color: #00285e;
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
            
            .car-gallery, .car-info {
                width: 100%;
            }
            
            .main-image {
                height: 300px;
            }
            
            .features-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <?php
    // Get car ID and booking details from URL
    $car_id = isset($_GET['id']) ? $_GET['id'] : '';
    $pickup_location = isset($_GET['pickup_location']) ? $_GET['pickup_location'] : '';
    $dropoff_location = isset($_GET['dropoff_location']) ? $_GET['dropoff_location'] : '';
    $pickup_date = isset($_GET['pickup_date']) ? $_GET['pickup_date'] : '';
    $pickup_time = isset($_GET['pickup_time']) ? $_GET['pickup_time'] : '';
    $dropoff_date = isset($_GET['dropoff_date']) ? $_GET['dropoff_date'] : '';
    $dropoff_time = isset($_GET['dropoff_time']) ? $_GET['dropoff_time'] : '';
    
    // Calculate rental duration in days
    $pickup_datetime = new DateTime($pickup_date . ' ' . $pickup_time);
    $dropoff_datetime = new DateTime($dropoff_date . ' ' . $dropoff_time);
    $interval = $pickup_datetime->diff($dropoff_datetime);
    $days = $interval->days;
    if ($interval->h > 0 || $interval->i > 0) {
        $days += 1; // Partial day counts as full day
    }
    if ($days < 1) $days = 1;
    
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
    
    // Get similar cars
    $similar_cars = [];
    if ($car) {
        $stmt = $conn->prepare("SELECT * FROM cars WHERE car_type = ? AND id != ? ORDER BY RAND() LIMIT 3");
        $stmt->execute([$car['car_type'], $car_id]);
        $similar_cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // If car not found, redirect to home
    if (!$car) {
        echo "<script>window.location.href = 'index.php';</script>";
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

    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="results.php?pickup_location=<?php echo urlencode($pickup_location); ?>&dropoff_location=<?php echo urlencode($dropoff_location); ?>&pickup_date=<?php echo urlencode($pickup_date); ?>&pickup_time=<?php echo urlencode($pickup_time); ?>&dropoff_date=<?php echo urlencode($dropoff_date); ?>&dropoff_time=<?php echo urlencode($dropoff_time); ?>">Search Results</a></li>
                <li><?php echo htmlspecialchars($car['make'] . ' ' . $car['model']); ?></li>
            </ul>
        </div>
    </div>

    <!-- Car Details Section -->
    <section class="car-details-section">
        <div class="container">
            <div class="car-details-container">
                <div class="car-gallery">
                    <div class="main-image" id="main-image" style="background-image: url('https://source.unsplash.com/800x400/?' . <?php echo urlencode($car['make'] . ' ' . $car['model']); ?>);"></div>
                    <div class="thumbnails">
                        <div class="thumbnail active" style="background-image: url('https://source.unsplash.com/800x400/?' . <?php echo urlencode($car['make'] . ' ' . $car['model']); ?>);" onclick="changeImage(this, 'https://source.unsplash.com/800x400/?' . <?php echo urlencode($car['make'] . ' ' . $car['model']); ?>);"></div>
                        <div class="thumbnail" style="background-image: url('https://source.unsplash.com/800x400/?' . <?php echo urlencode($car['make'] . ' ' . $car['model'] . ' interior'); ?>);" onclick="changeImage(this, 'https://source.unsplash.com/800x400/?' . <?php echo urlencode($car['make'] . ' ' . $car['model'] . ' interior'); ?>);"></div>
                        <div class="thumbnail" style="background-image: url('https://source.unsplash.com/800x400/?' . <?php echo urlencode($car['make'] . ' ' . $car['model'] . ' back'); ?>);" onclick="changeImage(this, 'https://source.unsplash.com/800x400/?' . <?php echo urlencode($car['make'] . ' ' . $car['model'] . ' back'); ?>);"></div>
                        <div class="thumbnail" style="background-image: url('https://source.unsplash.com/800x400/?' . <?php echo urlencode($car['make'] . ' ' . $car['model'] . ' side'); ?>);" onclick="changeImage(this, 'https://source.unsplash.com/800x400/?' . <?php echo urlencode($car['make'] . ' ' . $car['model'] . ' side'); ?>);"></div>
                    </div>
                </div>
                <div class="car-info">
                    <h1 class="car-title"><?php echo htmlspecialchars($car['make'] . ' ' . $car['model'] . ' (' . $car['year'] . ')'); ?></h1>
                    <p class="car-type"><?php echo htmlspecialchars($car['car_type']); ?></p>
                    
                    <div class="car-features">
                        <h3 class="features-title">Features</h3>
                        <div class="features-grid">
                            <div class="feature"><?php echo htmlspecialchars($car['seats']); ?> Seats</div>
                            <div class="feature"><?php echo htmlspecialchars($car['fuel_type']); ?></div>
                            <div class="feature">Air Conditioning</div>
                            <div class="feature">Automatic Transmission</div>
                            <div class="feature">Bluetooth</div>
                            <div class="feature">Cruise Control</div>
                            <div class="feature">GPS Navigation</div>
                            <div class="feature">USB Ports</div>
                        </div>
                    </div>
                    
                    <div class="car-description">
                        <h3 class="description-title">Description</h3>
                        <p><?php echo htmlspecialchars($car['description']); ?></p>
                    </div>
                    
                    <div class="booking-summary">
                        <h3 class="summary-title">Booking Summary</h3>
                        <div class="summary-details">
                            <div class="summary-row">
                                <span class="summary-label">Pickup:</span>
                                <span><?php echo htmlspecialchars($pickup_location_name); ?></span>
                            </div>
                            <div class="summary-row">
                                <span class="summary-label">Pickup Date:</span>
                                <span><?php echo date('M d, Y', strtotime($pickup_date)); ?> at <?php echo date('g:i A', strtotime($pickup_time)); ?></span>
                            </div>
                            <div class="summary-row">
                                <span class="summary-label">Drop-off:</span>
                                <span><?php echo htmlspecialchars($dropoff_location_name); ?></span>
                            </div>
                            <div class="summary-row">
                                <span class="summary-label">Drop-off Date:</span>
                                <span><?php echo date('M d, Y', strtotime($dropoff_date)); ?> at <?php echo date('g:i A', strtotime($dropoff_time)); ?></span>
                            </div>
                            <div class="summary-row">
                                <span class="summary-label">Duration:</span>
                                <span><?php echo $days; ?> day<?php echo $days > 1 ? 's' : ''; ?></span>
                            </div>
                            <div class="summary-row">
                                <span class="summary-label">Rate:</span>
                                <span>$<?php echo number_format($car['price_per_day'], 2); ?> per day</span>
                            </div>
                        </div>
                        <div class="total-price">
                            Total: $<?php echo number_format($car['price_per_day'] * $days, 2); ?>
                        </div>
                        <a href="#booking-form" class="book-btn">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tabs Section -->
    <section class="tabs-section">
        <div class="container">
            <div class="tabs">
                <div class="tab active" onclick="openTab(event, 'rental-policy')">Rental Policy</div>
                <div class="tab" onclick="openTab(event, 'included')">What's Included</div>
                <div class="tab" onclick="openTab(event, 'reviews')">Reviews</div>
            </div>
            
            <div id="rental-policy" class="tab-content active">
                <h3>Rental Policy</h3>
                <p><strong>Age Requirements:</strong> Drivers must be at least 21 years old to rent this vehicle. Drivers under 25 may incur a young driver surcharge.</p>
                <p><strong>Driver's License:</strong> A valid driver's license is required. International drivers may need an International Driving Permit.</p>
                <p><strong>Payment:</strong> A credit card in the renter's name is required for reservation. The card will be charged at the time of pickup.</p>
                <p><strong>Insurance:</strong> Basic insurance is included. Additional coverage options are available at pickup.</p>
                <p><strong>Fuel Policy:</strong> The vehicle will be provided with a full tank of fuel and should be returned with a full tank. Otherwise, a refueling fee will apply.</p>
                <p><strong>Mileage:</strong> Unlimited mileage is included in the rental price.</p>
                <p><strong>Late Return:</strong> Late returns may incur additional charges. Please contact us if you need to extend your rental.</p>
                <p><strong>Cancellation:</strong> Free cancellation up to 48 hours before pickup. Late cancellations may incur a fee.</p>
            </div>
            
            <div id="included" class="tab-content">
                <h3>What's Included</h3>
                <p><strong>Included in Your Rental:</strong></p>
                <ul>
                    <li>Unlimited mileage</li>
                    <li>Basic insurance coverage</li>
                    <li>24/7 roadside assistance</li>
                    <li>Local taxes and fees</li>
                    <li>Vehicle cleaning fee</li>
                </ul>
                
                <p><strong>Available at Additional Cost:</strong></p>
                <ul>
                    <li>Premium insurance coverage</li>
                    <li>GPS navigation system</li>
                    <li>Child safety seats</li>
                    <li>Additional driver fee</li>
                    <li>Fuel purchase option</li>
                </ul>
            </div>
            
            <div id="reviews" class="tab-content">
                <h3>Customer Reviews</h3>
                <div class="review">
                    <h4>John D.</h4>
                    <p>★★★★★</p>
                    <p>Great car, very clean and well-maintained. The pickup process was smooth and the staff was friendly. Would definitely rent again!</p>
                </div>
                <div class="review">
                    <h4>Sarah M.</h4>
                    <p>★★★★☆</p>
                    <p>The car was perfect for our family trip. Comfortable and fuel-efficient. Only giving 4 stars because the pickup took longer than expected.</p>
                </div>
                <div class="review">
                    <h4>Michael T.</h4>
                    <p>★★★★★</p>
                    <p>Excellent service from start to finish. The car was exactly as described and performed flawlessly during our trip.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Similar Cars Section -->
    <section class="similar-cars">
        <div class="container">
            <h2 class="similar-cars-title">Similar Cars You Might Like</h2>
            <div class="cars-grid">
                <?php foreach ($similar_cars as $similar_car): ?>
                <div class="car-card">
                    <div class="car-card-image" style="background-image: url('https://source.unsplash.com/300x200/?' . <?php echo urlencode($similar_car['make'] . ' ' . $similar_car['model']); ?>);"></div>
                    <div class="car-card-details">
                        <h3 class="car-card-title"><?php echo htmlspecialchars($similar_car['make'] . ' ' . $similar_car['model'] . ' (' . $similar_car['year'] . ')'); ?></h3>
                        <p class="car-card-type"><?php echo htmlspecialchars($similar_car['car_type']); ?></p>
                        <div class="car-card-features">
                            <span class="feature"><?php echo htmlspecialchars($similar_car['seats']); ?> Seats</span>
                            <span class="feature"><?php echo htmlspecialchars($similar_car['fuel_type']); ?></span>
                        </div>
                        <p class="car-card-price">$<?php echo number_format($similar_car['price_per_day'], 2); ?> / day</p>
                        <a href="car-details.php?id=<?php echo $similar_car['id']; ?>&pickup_location=<?php echo urlencode($pickup_location); ?>&dropoff_location=<?php echo urlencode($dropoff_location); ?>&pickup_date=<?php echo urlencode($pickup_date); ?>&pickup_time=<?php echo urlencode($pickup_time); ?>&dropoff_date=<?php echo urlencode($dropoff_date); ?>&dropoff_time=<?php echo urlencode($dropoff_time); ?>" class="view-btn">View Details</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Booking Form -->
    <section id="booking-form" class="booking-form">
        <div class="container">
            <h2 class="form-title">Complete Your Booking</h2>
            <form action="booking-confirmation.php" method="POST">
                <input type="hidden" name="car_id" value="<?php echo $car['id']; ?>">
                <input type="hidden" name="pickup_location" value="<?php echo htmlspecialchars($pickup_location); ?>">
                <input type="hidden" name="dropoff_location" value="<?php echo htmlspecialchars($dropoff_location); ?>">
                <input type="hidden" name="pickup_date" value="<?php echo htmlspecialchars($pickup_date); ?>">
                <input type="hidden" name="pickup_time" value="<?php echo htmlspecialchars($pickup_time); ?>">
                <input type="hidden" name="dropoff_date" value="<?php echo htmlspecialchars($dropoff_date); ?>">
                <input type="hidden" name="dropoff_time" value="<?php echo htmlspecialchars($dropoff_time); ?>">
                <input type="hidden" name="total_price" value="<?php echo $car['price_per_day'] * $days; ?>">
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="first-name">First Name</label>
                        <input type="text" id="first-name" name="first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="last-name">Last Name</label>
                        <input type="text" id="last-name" name="last_name" required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" id="phone" name="phone" required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" id="city" name="city" required>
                    </div>
                    <div class="form-group">
                        <label for="zip">Zip Code</label>
                        <input type="text" id="zip" name="zip" required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="country">Country</label>
                        <select id="country" name="country" required>
                            <option value="">Select Country</option>
                            <option value="US">United States</option>
                            <option value="CA">Canada</option>
                            <option value="UK">United Kingdom</option>
                            <option value="AU">Australia</option>
                            <option value="DE">Germany</option>
                            <option value="FR">France</option>
                            <option value="ES">Spain</option>
                            <option value="IT">Italy</option>
                            <option value="JP">Japan</option>
                            <option value="CN">China</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="license">Driver's License Number</label>
                        <input type="text" id="license" name="license" required>
                    </div>
                </div>
                
                <div class="form-check">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">I agree to the terms and conditions</label>
                </div>
                
                <button type="submit" class="submit-btn">Complete Booking</button>
            </form>
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
        // Function to change main image
        function changeImage(thumbnail, imageUrl) {
            // Update main image
            document.getElementById('main-image').style.backgroundImage = `url('${imageUrl}')`;
            
            // Update active thumbnail
            const thumbnails = document.querySelectorAll('.thumbnail');
            thumbnails.forEach(thumb => {
                thumb.classList.remove('active');
            });
            thumbnail.classList.add('active');
        }
        
        // Function to handle tabs
        function openTab(evt, tabName) {
            // Hide all tab content
            const tabContents = document.getElementsByClassName('tab-content');
            for (let i = 0; i < tabContents.length; i++) {
                tabContents[i].classList.remove('active');
            }
            
            // Remove active class from all tabs
            const tabs = document.getElementsByClassName('tab');
            for (let i = 0; i < tabs.length; i++) {
                tabs[i].classList.remove('active');
            }
            
            // Show the selected tab content and mark the button as active
            document.getElementById(tabName).classList.add('active');
            evt.currentTarget.classList.add('active');
        }
    </script>
</body>
</html>
