<?php
if (isset($_POST['login'])) {
    require_once('connection.php'); // Include the database connection file

    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        // Prepare and execute a SQL query to fetch user data
        // $stmt = $pdo->prepare("SELECT * FROM `login` WHERE username = '$username'; ");
        // $stmt->execute([$username]);
        // $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if a user with the given username exists and the password is correct
        // echo "<p>`$user`</p>" ;
        // if ($user && password_verify($password, $user['password'])) {
        //     echo "<p>Login successful!</p>";
        //     // Redirect to a secured page
        //     // header("Location: secured_page.php");
        // } else {
        //     echo "<p>Invalid username or password. Please try again.</p>";
        // }


        // Assuming $pdo is your PDO connection object and $username is the user input

// Prepare the SQL statement
$stmt = $pdo->prepare("SELECT * FROM `login` WHERE username = :username");

// Bind the parameter
$stmt->bindParam(':username', $username, PDO::PARAM_STR);

// Execute the statement
$stmt->execute();

// Fetch the results
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$actualpassword = $result[0]['password'];
if ($password == $actualpassword) {
        echo "<p>Login successful!</p>";
        // Redirect to a secured page
         header("Location: choice.php");
        exit();
    } else {
        echo "<p>Invalid username or password. Please try again.</p>";
    }
// $check = $firstObject->username;

// Now you can work with the $result variable, which contains the fetched data
    } catch (PDOException $e) {
        // Handle database query errors
        echo "Database Error: " . $e->getMessage();
    }
}
?>
