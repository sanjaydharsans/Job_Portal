<?php
// Define your database credentials
$db_host = 'localhost';
$db_name = 'jobportal';
$db_user = 'root';
$db_pass = '';

try {
    // Establish a database connection
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Handle database connection errors
    die("Database Error: " . $e->getMessage());
}
?>
