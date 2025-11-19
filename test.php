<?php
require_once 'db.php';
echo "<h2>✅ Database connected successfully!</h2>";
echo "<p>Host: " . htmlspecialchars(getenv('DB_HOST')) . "</p>";
echo "<p>DB: " . htmlspecialchars(getenv('DB_NAME')) . "</p>";
?>
