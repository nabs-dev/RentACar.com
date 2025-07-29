<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results - RentACar.com</title>
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
        
        /* Search summary */
        .search-summary {
            background-color: #003580;
            color: white;
            padding: 2rem 0;
        }
        
        .search-details {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
        }
        
        .search-info {
            flex: 1;
            min-width: 300px;
        }
        
        .search-info h1 {
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
        }
        
        .search-info p {
            font-size: 1.1rem;
            opacity: 0.9;
        }
        
        .modify-search {
            background-color: #febb02;
            color: #003580;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .modify-search:hover {
            background-color: #e9aa00;
        }
        
        /* Main content layout */
        .results-container {
            display: flex;
            flex-wrap: wrap;
            margin: 2rem 0;
        }
        
        /* Filters sidebar */
        .filters {
            width: 250px;
            margin-right: 2rem;
        }
        
        .filter-card {
            background-color: white;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .filter-title {
            font-size: 1.2rem;
            margin-bottom: 1rem;
            color: #003580;
            font-weight: 600;
        }
        
        .filter-group {
            margin-bottom: 1rem;
        }
        
        .filter-group:last-child {
            margin-bottom: 0;
        }
        
        .filter-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }
        
        .checkbox-group {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
        }
        
        .checkbox-group input {
            margin-right: 0.5rem;
        }
        
        .price-inputs {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .price-inputs input {
            width: 45%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        
        .price-inputs span {
            margin: 0 5px;
        }
        
        .apply-filters {
            background-color: #003580;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 4px;
            margin-top: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .apply-filters:hover {
            background-color: #00285e;
        }
        
        /* Results list */
        .results-list {
            flex: 1;
            min-width: 300px;
        }
        
        .results-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .results-count {
            font-size: 1.2rem;
            font-weight: 500;
        }
        
        .sort-options {
            display: flex;
            align-items: center;
        }
        
        .sort-options label {
            margin-right: 0.5rem;
        }
        
        .sort-options select {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        
        /* Car card */
        .car-card {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-bottom: 1.5rem;
            display: flex;
            flex-wrap: wrap;
        }
        
        .car-image {
            width: 300px;
            height: 200px;
            background-color: #eee;
            background-size: cover;
            background-position: center;
        }
        
        .car-info {
            flex: 1;
            min-width: 300px;
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
        }
        
        .car-title {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            color: #003580;
        }
        
        .car-type {
            color: #666;
            margin-bottom: 1rem;
        }
        
        .car-features {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 1rem;
        }
        
        .feature {
            margin-right: 1.5rem;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            color: #666;
        }
        
        .car-description {
            margin-bottom: 1rem;
            color: #555;
            flex-grow: 1;
        }
        
        .car-price-section {
            width: 200px;
            padding: 1.5rem;
            background-color: #f9f9f9;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        
        .car-price {
            font-size: 1.8rem;
            font-weight: bold;
            color: #003580;
            margin-bottom: 0.5rem;
        }
        
        .price-details {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }
        
        .view-btn {
            display: inline-block;
            background-color: #febb02;
            color: #003580;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            transition: background-color 0.3s;
            width: 100%;
            text-align: center;
        }
        
        .view-btn:hover {
            background-color: #e9aa00;
        }
        
        /* No results */
        .no-results {
            background-color: white;
            border-radius: 8px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .no-results h2 {
            color: #003580;
            margin-bottom: 1rem;
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
            
            .filters {
                width: 100%;
                margin-right: 0;
                margin-bottom: 2rem;
            }
            
            .car-image, .car-info, .car-price-section {
                width: 100%;
            }
            
            .car-price-section {
                padding: 1.5rem;
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

    <?php
    // Get search parameters
    $pickup_location = isset($_GET['pickup_location']) ? $_GET['pickup_location'] : '';
    $dropoff_location = isset($_GET['dropoff_location']) ? $_GET['dropoff_location'] : '';
    $pickup_date = isset($_GET['pickup_date']) ? $_GET['pickup_date'] : '';
    $pickup_time = isset($_GET['pickup_time']) ? $_GET['pickup_time'] : '';
    $dropoff_date = isset($_GET['dropoff_date']) ? $_GET['dropoff_date'] : '';
    $dropoff_time = isset($_GET['dropoff_time']) ? $_GET['dropoff_time'] : '';
    
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
    
    // Get filter parameters
    $car_type = isset($_GET['car_type']) ? $_GET['car_type'] : [];
    $min_price = isset($_GET['min_price']) ? $_GET['min_price'] : '';
    $max_price = isset($_GET['max_price']) ? $_GET['max_price'] : '';
    $sort = isset($_GET['sort']) ? $_GET['sort'] : 'price_asc';
    
    // Build query
    $query = "SELECT * FROM cars WHERE 1=1";
    $params = [];
    
    // Apply car type filter
    if (!empty($car_type)) {
        $placeholders = implode(',', array_fill(0, count($car_type), '?'));
        $query .= " AND car_type IN ($placeholders)";
        $params = array_merge($params, $car_type);
    }
    
    // Apply price filters
    if ($min_price !== '') {
        $query .= " AND price_per_day >= ?";
        $params[] = $min_price;
    }
    
    if ($max_price !== '') {
        $query .= " AND price_per_day <= ?";
        $params[] = $max_price;
    }
    
    // Apply sorting
    switch ($sort) {
        case 'price_asc':
            $query .= " ORDER BY price_per_day ASC";
            break;
        case 'price_desc':
            $query .= " ORDER BY price_per_day DESC";
            break;
        case 'name_asc':
            $query .= " ORDER BY make ASC, model ASC";
            break;
        case 'name_desc':
            $query .= " ORDER BY make DESC, model DESC";
            break;
        default:
            $query .= " ORDER BY price_per_day ASC";
    }
    
    // Execute query
    $stmt = $conn->prepare($query);
    $stmt->execute($params);
    $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $car_count = count($cars);
    
    // Get all car types for filter
    $stmt = $conn->prepare("SELECT DISTINCT car_type FROM cars ORDER BY car_type");
    $stmt->execute();
    $car_types = $stmt->fetchAll(PDO::FETCH_COLUMN);
    ?>

    <!-- Search Summary -->
    <section class="search-summary">
        <div class="container">
            <div class="search-details">
                <div class="search-info">
                    <h1>Available Cars</h1>
                    <p>
                        <?php echo htmlspecialchars($pickup_location_name); ?> to <?php echo htmlspecialchars($dropoff_location_name); ?><br>
                        <?php echo date('M d, Y', strtotime($pickup_date)); ?> <?php echo date('g:i A', strtotime($pickup_time)); ?> - 
                        <?php echo date('M d, Y', strtotime($dropoff_date)); ?> <?php echo date('g:i A', strtotime($dropoff_time)); ?><br>
                        (<?php echo $days; ?> day<?php echo $days > 1 ? 's' : ''; ?>)
                    </p>
                </div>
                <button class="modify-search" onclick="window.location.href='index.php'">Modify Search</button>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container">
        <div class="results-container">
            <!-- Filters Sidebar -->
            <div class="filters">
                <form action="results.php" method="GET">
                    <!-- Hidden fields to maintain search parameters -->
                    <input type="hidden" name="pickup_location" value="<?php echo htmlspecialchars($pickup_location); ?>">
                    <input type="hidden" name="dropoff_location" value="<?php echo htmlspecialchars($dropoff_location); ?>">
                    <input type="hidden" name="pickup_date" value="<?php echo htmlspecialchars($pickup_date); ?>">
                    <input type="hidden" name="pickup_time" value="<?php echo htmlspecialchars($pickup_time); ?>">
                    <input type="hidden" name="dropoff_date" value="<?php echo htmlspecialchars($dropoff_date); ?>">
                    <input type="hidden" name="dropoff_time" value="<?php echo htmlspecialchars($dropoff_time); ?>">
                    
                    <div class="filter-card">
                        <h3 class="filter-title">Filter Results</h3>
                        
                        <div class="filter-group">
                            <label class="filter-label">Car Type</label>
                            <?php foreach ($car_types as $type): ?>
                            <div class="checkbox-group">
                                <input type="checkbox" id="type-<?php echo htmlspecialchars($type); ?>" name="car_type[]" value="<?php echo htmlspecialchars($type); ?>" 
                                    <?php echo in_array($type, $car_type) ? 'checked' : ''; ?>>
                                <label for="type-<?php echo htmlspecialchars($type); ?>"><?php echo htmlspecialchars($type); ?></label>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        
                        <div class="filter-group">
                            <label class="filter-label">Price Range (per day)</label>
                            <div class="price-inputs">
                                <input type="number" name="min_price" placeholder="Min $" value="<?php echo htmlspecialchars($min_price); ?>">
                                <span>-</span>
                                <input type="number" name="max_price" placeholder="Max $" value="<?php echo htmlspecialchars($max_price); ?>">
                            </div>
                        </div>
                        
                        <button type="submit" class="apply-filters">Apply Filters</button>
                    </div>
                </form>
            </div>
            
            <!-- Results List -->
            <div class="results-list">
                <div class="results-header">
                    <div class="results-count"><?php echo $car_count; ?> cars found</div>
                    <div class="sort-options">
                        <label for="sort-select">Sort by:</label>
                        <select id="sort-select" onchange="updateSort(this.value)">
                            <option value="price_asc" <?php echo $sort === 'price_asc' ? 'selected' : ''; ?>>Price (Low to High)</option>
                            <option value="price_desc" <?php echo $sort === 'price_desc' ? 'selected' : ''; ?>>Price (High to Low)</option>
                            <option value="name_asc" <?php echo $sort === 'name_asc' ? 'selected' : ''; ?>>Name (A to Z)</option>
                            <option value="name_desc" <?php echo $sort === 'name_desc' ? 'selected' : ''; ?>>Name (Z to A)</option>
                        </select>
                    </div>
                </div>
                
                <?php if ($car_count > 0): ?>
                    <?php foreach ($cars as $car): ?>
                        <div class="car-card">
                            <div class="car-image" style="background-image: url('https://source.unsplash.com/300x200/?' . <?php echo urlencode($car['make'] . ' ' . $car['model']); ?>);"></div>
                            <div class="car-info">
                                <h2 class="car-title"><?php echo htmlspecialchars($car['make'] . ' ' . $car['model'] . ' (' . $car['year'] . ')'); ?></h2>
                                <p class="car-type"><?php echo htmlspecialchars($car['car_type']); ?></p>
                                <div class="car-features">
                                    <span class="feature"><?php echo htmlspecialchars($car['seats']); ?> Seats</span>
                                    <span class="feature"><?php echo htmlspecialchars($car['fuel_type']); ?></span>
                                    <span class="feature">Air Conditioning</span>
                                    <span class="feature">Automatic</span>
                                </div>
                                <p class="car-description"><?php echo htmlspecialchars(substr($car['description'], 0, 150) . '...'); ?></p>
                            </div>
                            <div class="car-price-section">
                                <div class="car-price">$<?php echo number_format($car['price_per_day'] * $days, 2); ?></div>
                                <p class="price-details">$<?php echo number_format($car['price_per_day'], 2); ?> per day × <?php echo $days; ?> days</p>
                                <a href="car-details.php?id=<?php echo $car['id']; ?>&pickup_location=<?php echo urlencode($pickup_location); ?>&dropoff_location=<?php echo urlencode($dropoff_location); ?>&pickup_date=<?php echo urlencode($pickup_date); ?>&pickup_time=<?php echo urlencode($pickup_time); ?>&dropoff_date=<?php echo urlencode($dropoff_date); ?>&dropoff_time=<?php echo urlencode($dropoff_time); ?>" class="view-btn">View Details</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="no-results">
                        <h2>No cars found matching your criteria</h2>
                        <p>Try adjusting your filters or search for different dates.</p>
                        <button class="modify-search" onclick="window.location.href='index.php'">Modify Search</button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

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
        // Function to update sort parameter and reload page
        function updateSort(sortValue) {
            // Get current URL
            let url = new URL(window.location.href);
            let params = new URLSearchParams(url.search);
            
            // Update or add sort parameter
            params.set('sort', sortValue);
            
            // Redirect to new URL with updated parameters
            window.location.href = window.location.pathname + '?' + params.toString();
        }
    </script>
</body>
</html>
