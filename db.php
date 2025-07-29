<?php
// Database connection
$host = "localhost";
$dbname = "dbciqulway8bk6";
$username = "u8gr0sjr9p4p4";
$password = "9yxuqyo3mt85";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}
?>
