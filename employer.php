<!DOCTYPE html>
<html>
<head>
    <title>Employer Dashboard</title>
    <style>
       
body {
    font-family: Arial, sans-serif;
    text-align: center;
    margin: 0;
    padding: 0;
    background: radial-gradient(circle at 10% 20%, rgb(69, 86, 102) 0%, rgb(34, 34, 34) 90%);
}

.container {
    background: radial-gradient(circle at 10% 20%, rgb(69, 86, 102) 0%, rgb(34, 34, 34) 90%);
    border: 1px solid #ccc;
    border-radius: 5px;
    margin: 20px auto;
    max-width: 400px;
    padding: 20px;
    color: white;
}

h1 {
    color: white;
}

.dashboard-button {
    background-color: #3498db;
    color: white;
    border: none;
    padding: 10px 20px;
    margin: 10px;
    cursor: pointer;
}

.dashboard-button:hover {
    background-color: #1d7ca7;
}

    </style>
</head>
<body>
    <?php
    session_start();

    if (!isset($_SESSION['id'])) {
        header('Location: choice.php');
        exit();
    }

    require_once('connection.php');

    $id = $_SESSION['id'];

    $stmt = $pdo->prepare("SELECT username FROM employerlogin WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $employer = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>

    <div class="container">
        <h1>Welcome, <?php echo $employer['username']; ?></h1>
        <button class="dashboard-button" onclick="location.href='employee_details.php'">Employee Details</button>
        <button class="dashboard-button" onclick="location.href='job_applicants.php'">Job Applicants List</button>
        <button class="dashboard-button" onclick="location.href='choice.php'">Logout</button>
    </div>
</body>
</html>
