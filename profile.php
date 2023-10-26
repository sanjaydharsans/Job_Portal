<!DOCTYPE html>
<html>
<head>
    <title>Job Application Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: radial-gradient(circle at 10% 20%, rgb(69, 86, 102) 0%, rgb(34, 34, 34) 90%);
        }

        h2 {
            text-align: center;
            color: white;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background: radial-gradient(circle at 10% 20%, rgb(69, 86, 102) 0%, rgb(34, 34, 34) 90%);
            padding: 40px;
            border-radius: 5px;
            box-shadow: 0px 0px 5px 2px #888888;
            color: white;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="file"] {
            color: white;
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            background: radial-gradient(circle at 10% 20%, rgb(69, 86, 102) 0%, rgb(34, 34, 34) 90%);
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Job Application Form</h2>
    <form action="profile.php" method="POST" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>

        <label for="phone">Phone:</label>
        <input type="tel" name="phone" required><br><br>

        <label for="resume">Resume (PDF only):</label>
        <input type="file" name="resume" accept=".pdf" required><br><br>

        <input type="submit" value="Submit Application">
    </form>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database configuration
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'jobportal';

    // Connect to the database
    $conn = new mysqli($hostname, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Process form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Check if a resume file was uploaded
    if (isset($_FILES['resume'])) {
        $resume = file_get_contents($_FILES['resume']['tmp_name']);
    }

    // Perform basic validation
    if (!empty($name) && !empty($email) && !empty($phone)) {
        // SQL query to insert data into the "profile" table
        $sql = "INSERT INTO profile (name, email, phone, resume) VALUES (?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssb", $name, $email, $phone, $resume);

        if ($stmt->execute()) {
            echo "Application submitted successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the database connection
        $stmt->close();
    } else {
        echo "Please fill in all the required fields.";
    }

    $conn->close();
}
?>
