<?php
session_start();

if (isset($_POST['login'])) {
    require_once('connection.php'); // Include the database connection file

    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        // Prepare a SQL query to fetch the employer's username and password
        $stmt = $pdo->prepare("SELECT * FROM employerlogin WHERE username = :username");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $employer = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($employer && $employer['password'] === $password) {
            $_SESSION['id'] = $employer['id']; // Set the session variable

            // Redirect to the employer dashboard
            header("Location: employer.php");
            exit();
        } else {
            echo "<p>Invalid username or password. Please try again.</p>";
        }
    } catch (PDOException $e) {
        // Handle database query errors
        echo "Database Error: " . $e->getMessage();
    }
}
?>
