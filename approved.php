<?php
// Assuming you've established a database connection
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'jobportal';

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define the query to retrieve data from the applied_jobs table
$sql = "SELECT * FROM applied_jobs WHERE status = 'approved'";

$result = $conn->query($sql);

echo '<html>
<head>
    <style>
    body {
        font-family: Arial, sans-serif;
        color: white;
        text-align: center;
        padding: 20px;
        background: radial-gradient(circle at 10% 20%, rgb(69, 86, 102) 0%, rgb(34, 34, 34) 90%);
    }
        table {
            border-collapse: collapse;
            width: 50%;
            margin-top: 20px; /* Add some margin to lower the table */
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
       
        .back-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none
            
        }
    </style>
</head>
<body>
<a class="back-button" href="javascript:history.back()">Back</a>';

if ($result->num_rows > 0) {
    // Output data of approved members
    echo "<table>";
    echo "<tr><th>Title</th><th>Description</th></tr>";

    while ($row = $result->fetch_assoc()) {
        $Title = $row["Title"];
        $Description = $row["Description"];
        echo "<tr><td>$Title</td><td>$Description</td></tr>";
    }

    echo "</table>";
} else {
    echo "No approved members found.";
}

echo '</body>
</html>';

$conn->close();
?>
