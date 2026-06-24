<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'saha_traders');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    die(json_encode(['error' => 'সংযোগ ব্যর্থ: ' . $conn->connect_error]));
}
?>
