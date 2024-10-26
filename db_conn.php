<?php
// Start the session

// Database connection settings
$host = 'localhost'; // Host name
$db = 'tournament_db'; // Database name
$user = 'root'; // Username
$pass = ''; // Password

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
