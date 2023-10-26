<!DOCTYPE html>
<html>
<head>
    <title>Job Portal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: radial-gradient(circle at 10% 20%, rgb(69, 86, 102) 0%, rgb(34, 34, 34) 90%);
            text-align: center;
            padding: 20px;
        }

        h1 {
            color: white;
        }

        .button-container {
            margin-top: 20px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 18px;
            background-color: #3498db;
            color: #ffffff;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 10px;
            transition: background-color 0.3s ease-in-out;
        }

        .button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <h1>Welcome to the Job Portal</h1>

    <div class="button-container">
        <a href="profile.php" class="button">Profile</a>
        <a href="jobs.php" class="button">Jobs</a>
        <a href="applied_jobs.php" class="button">Applied Jobs</a>
        <a href="login.php" class="button">Logout</a>
    </div>
</body>
</html>
