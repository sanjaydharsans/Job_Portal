<?php
// Database connection details
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'jobportal';

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);

    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query to fetch applied jobs
    $query = "SELECT * FROM applied_jobs WHERE user_id = :user_id";
    $stmt = $pdo->prepare($query);

    // Bind user_id parameter
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $user_id = 1; // Replace with the actual user ID

    $stmt->execute();

    // Fetch and display the applied jobs
    while ($job = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="job-item">';
        echo '<h3>' . $job['title'] . '</h3>';
        echo '<p>' . $job['description'] . '</p>';
        echo '<p>Date Applied: ' . $job['date_applied'] . '</p>';
        echo '</div>';
    }
} catch (PDOException $e) {
    echo 'Database Error: ' . $e->getMessage();
}
?>
