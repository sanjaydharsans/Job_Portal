<!DOCTYPE html>
<html>
<head>
    <title>Job Listings</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: white;
            text-align: center;
            padding: 20px;
            background: radial-gradient(circle at 10% 20%, rgb(69, 86, 102) 0%, rgb(34, 34, 34) 90%);
        }

        h1 {
            color: white;
        }

        .job-list {
            margin-top: 20px;
            text-align: left;
        }

        .job-item {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }

        .search-sort-container {
            margin-top: 20px;
        }

        .search-input,
        .sort-select {
            padding: 5px;
        }

        .apply-button {
            display: inline-block;
            padding: 8px 16px;
            background-color: #27ae60;
            color: #ffffff;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .apply-button:hover {
            background-color: #219952;
        }
        .back-button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            position: absolute;
            top: 10px; 
            right: 10px; 
        }

        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Applied List</h1>
    <button class="back-button" onclick="window.location.href = 'employee.php'">back</button>
    <div class="job-list">
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

            // Query to fetch job data
            $query = "SELECT * FROM applied_jobs";
            $stmt = $pdo->prepare($query);
            $stmt->execute();

            // Fetch all rows as associative arrays
            $jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Display job data
            foreach ($jobs as $job) {
                echo '<div class="job-item">';
                echo '<h3>' . $job['Title'] . '</h3>';
                echo '<p>' . $job['Description'] . '</p>';
                echo '<p>Date Posted: ' . $job['Date'] . '</p>';
                echo '</div>';
            }
        } catch (PDOException $e) {
            echo 'Database Error: ' . $e->getMessage();
        }
        ?>
    </div>

    <script>
        function applyJob(title, description, postedOn) {
            // Send a POST request to the PHP script
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'apply.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Handle the response from the PHP script if needed
                    console.log(xhr.responseText); // Log the response to the console
                    // You can update the UI or perform other actions based on the response here
                }
            };
            xhr.send('Job_Title=' + title + '&Job_Description=' + description + '&Posted_On=' + postedOn);
        }
    </script>
</body>
</html>