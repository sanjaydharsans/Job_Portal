<!DOCTYPE html>
<html>
<head>
    <title>Employee Details</title>
    <style>
        /* Add this CSS in a separate CSS file, e.g., employee_details_style.css */

body {
    font-family: Arial, sans-serif;
    background: radial-gradient(circle at 10% 20%, rgb(69, 86, 102) 0%, rgb(34, 34, 34) 90%);
    text-align: center;
    margin: 0;
    padding: 0;
}

h1 {
    
    color: white;
    padding: 10px;
}

table {
    border-collapse: collapse;
    background: radial-gradient(circle at 10% 20%, rgb(69, 86, 102) 0%, rgb(34, 34, 34) 90%);
    width: 80%;
    margin: 20px auto;
}

table, th, td {
    border: 1px solid #ccc;
    background: radial-gradient(circle at 10% 20%, rgb(69, 86, 102) 0%, rgb(34, 34, 34) 90%);
    color: white;
}

th, td {
    padding: 10px;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

button {
    background-color: #3498db;
    color: white;
    border: none;
    padding: 10px 20px;
    margin: 10px;
    cursor: pointer;
}

button:hover {
    background-color: #1d7ca7;
}

    </style>
</head>
<body>
    <h1>Employee Details</h1>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Resume</th>
        </tr>
        <?php
        try {
            // Database connection (you may reuse the connection script)
            require_once('connection.php');
            
            // SQL query to retrieve employee details from the "profile" table
            $query = "SELECT name, email, phone, resume FROM profile";
            $result = $pdo->query($query);
            
            // Loop through the results and display each employee's data
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['email']}</td>";
                echo "<td>{$row['phone']}</td>";
                echo "<td>{$row['resume']}</td>";
                echo "</tr>";
            }
        } catch (PDOException $e) {
            // Handle database query errors
            echo "Database Error: " . $e->getMessage();
        }
        ?>
    </table>

    <br>
    <button onclick="location.href='employer.php'">Back</button>
</body>
</html>
