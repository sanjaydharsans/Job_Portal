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
            position: relative; /* Added for positioning the buttons */
        }

        .buttons {
            position: absolute;
            right: 10px;
            top: 10px;
        }

        .approve-button,
        .delete-button {
            padding: 5px 10px;
            margin-right: 5px;
            background-color: #27ae60;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .approve-button:hover {
            background-color: #219952;
        }

        .delete-button {
            background-color: #e74c3c;
        }

        .delete-button:hover {
            background-color: #c0392b;
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
    <h1>Job Listings</h1>

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
                echo '<div class="buttons">';
                echo '<button class="approve-button" onclick="approveJob(\'' . $job['Title'] . '\')">Approve</button>';
                echo '<button class="delete-button" onclick="deleteJob(\'' . $job['Title'] . '\')">Delete</button>';
                echo '</div>';
                echo '</div>';
            }
        } catch (PDOException $e) {
            echo 'Database Error: ' . $e->getMessage();
        }
        ?>
    </div>

    <script>
        function approveJob(jobTitle) {
            // Send a POST request to the PHP script to mark the job as approved
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'approve.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Handle the response from the PHP script if needed
                    console.log(xhr.responseText); // Log the response to the console
                    // You can update the UI or perform other actions based on the response here
                }
            };
            xhr.send('Job_Title=' + jobTitle);
        }

        function deleteJob(jobTitle) {
            // Send a POST request to the PHP script to delete the job
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'delete.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Handle the response from the PHP script if needed
                    console.log(xhr.responseText); // Log the response to the console
                    // You can update the UI or perform other actions based on the response here
                }
            };
            xhr.send('Job_Title=' + jobTitle);
        }
    </script>
    <button onclick="location.href='employer.php'">Back</button>
</body>
</html>
