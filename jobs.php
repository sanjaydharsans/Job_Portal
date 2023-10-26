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

        .search-input {
            padding: 5px;
        }

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
    </style>
</head>
<body>
    <h1>Job Listings</h1>
    <a href="employee.php" class ="apply-button">Back</a>

    <div class="search-sort-container">
        <input type="text" class="search-input" id="search" placeholder="Search Jobs">
        <select class="sort-select" id="sort">
            <option value="title_asc">Sort by Title (A-Z)</option>
            <option value="title_desc">Sort by Title (Z-A)</option>
            <option value="date_asc">Sort by Date (Oldest first)</option>
            <option value="date_desc">Sort by Date (Newest first)</option>
        </select>
    </div>

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
            $query = "SELECT * FROM jobs";
            $stmt = $pdo->prepare($query);
            $stmt->execute();

            // Fetch all rows as associative arrays
            $jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Display job data
           
          
            foreach ($jobs as $job) {
                echo '<div class="job-item">';
                echo '<h3>' . $job['Job_Title'] . '</h3>';
                echo '<p>' . $job['Job_Description'] . '</p>';
                echo '<p>Date Posted: ' . $job['Posted_On'] . '</p>';
                echo '<a href="apply.php?job_id=' . $job['id'] . '" class="apply-button">Apply</a>';
                echo '</div>';
            }
            
          
            
        } catch (PDOException $e) {
            echo 'Database Error: ' . $e->getMessage();
        }
        ?>
    </div>

    <script>
        // JavaScript for filtering and sorting
        const searchInput = document.getElementById('search');
        const sortSelect = document.getElementById('sort');
        const jobList = document.querySelector('.job-list');

        searchInput.addEventListener('input', filterJobs);
        sortSelect.addEventListener('change', sortJobs);

        function filterJobs() {
            const searchTerm = searchInput.value.toLowerCase();
            const jobItems = jobList.querySelectorAll('.job-item');

            jobItems.forEach((item) => {
                const jobTitle = item.querySelector('h3').textContent.toLowerCase();
                if (jobTitle.includes(searchTerm)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        }

        function sortJobs() {
            const sortValue = sortSelect.value;
            const jobItems = Array.from(jobList.querySelectorAll('.job-item'));

            jobItems.sort((a, b) => {
                const jobTitleA = a.querySelector('h3').textContent.toLowerCase();
                const jobTitleB = b.querySelector('h3').textContent.toLowerCase();

                if (sortValue === 'title_asc') {
                    return jobTitleA.localeCompare(jobTitleB);
                } else if (sortValue === 'title_desc') {
                    return jobTitleB.localeCompare(jobTitleA);
                } else if (sortValue === 'date_asc') {
                    const dateA = new Date(a.querySelector('p:last-child').textContent);
                    const dateB = new Date(b.querySelector('p:last-child').textContent);
                    return dateA - dateB;
                } else if (sortValue === 'date_desc') {
                    const dateA = new Date(a.querySelector('p:last-child').textContent);
                    const dateB = new Date(b.querySelector('p:last-child').textContent);
                    return dateB - dateA;
                }
            });

            jobList.innerHTML = '';
            jobItems.forEach((item) => {
                jobList.appendChild(item);
            });
        }
    </script>
</body>
</html>
