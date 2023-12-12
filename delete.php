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

    // Get the job title from the POST request
    $jobTitle = $_POST['Job_Title'];

    // Your SQL query to perform the "Delete" operation (modify as needed)
    $query = "DELETE FROM applied_jobs WHERE Title = :jobTitle";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':jobTitle', $jobTitle);
    $stmt->execute();

    echo 'Job with title "' . $jobTitle . '" has been deleted.';
} catch (PDOException $e) {
    echo 'Database Error: ' . $e->getMessage();
}
?>
