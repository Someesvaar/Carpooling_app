<?php
// Database connection using environment variables (Railway / Docker)

// Get values from Railway environment
$host = getenv('DB_HOST') ?: 'localhost';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASS') ?: '';
$name = getenv('DB_NAME') ?: 'carpool_db';
$port = getenv('DB_PORT') ?: 3306;

// Improve connection reliability
mysqli_report(MYSQLI_REPORT_OFF); // Prevents crashing on connection warnings
$conn = mysqli_init();

// Optional: avoid hanging if unreachable
$conn->options(MYSQLI_OPT_CONNECT_TIMEOUT, 5);

// Optional (useful if SSL required):
// $conn->options(MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, false);

try {
    $conn->real_connect($host, $user, $pass, $name, (int)$port);
} catch (Exception $e) {
    die("❌ Database connection failed: " . $e->getMessage());
}

// Check final connection
if ($conn->connect_errno) {
    die("❌ DB Error: " . $conn->connect_error);
}

// Everything is good
// echo "✔ DB connected successfully"; // Uncomment for testing
?>
