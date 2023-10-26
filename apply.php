<!DOCTYPE html>
<html lang="en">
<head>
   
</head>
<body>
<?php

var_dump($_GET);

if (isset($_GET['Job_Title']) && isset($_GET['Job_Description']) && isset($_GET['Posted_On']) && isset($_GET['id'])) {
   
    $Job_Title = $_GET['Job_Title'];
    $Job_Description = $_GET['Job_Description'];
    $Date = $_GET['Posted_On'];
    $id = $_GET['id'];

    
    // $host = 'localhost';
    // $username = 'root';
    // $password = '';
    // $database = 'jobportal';

    
 
// Check connection
$link = mysqli_connect("localhost", "root", "", "jobportal");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// $sql = "INSERT INTO applied_jobs (Job_Title, Job_Description, Posted_On, id) VALUES (:Job_Title, :Job_Description, :Date, :id)";
$sql = "INSERT INTO applied_jobs (Job_Title, Job_Description, Posted_On, id) VALUES (?, ?, ?, ?)";

if(mysqli_query($link, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
 

//     try {
//         // Create a new PDO instance
//         $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);

//         // Set the PDO error mode to exception
//         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//         // Prepare an SQL INSERT query to insert the job application
//         $insertQuery = "INSERT INTO applied_jobs (Job_Title, Job_Description, Posted_On, id) VALUES (:Job_Title, :Job_Description, :Date, :id)";

//         // Create a prepared statement
//         $stmt = $pdo->prepare($insertQuery);

//         // Bind parameters
//         $stmt->bindParam(':Job_Title', $Job_Title, PDO::PARAM_STR);
//         $stmt->bindParam(':Job_Description', $Job_Description, PDO::PARAM_STR);
//         $stmt->bindParam(':Date', $Date, PDO::PARAM_STR);
//         $stmt->bindParam(':id', $id, PDO::PARAM_INT);

//         // Execute the INSERT query
//         if ($stmt->execute()) {
//             echo "Application submitted successfully!";
//             // Redirect to a confirmation page or back to the job listings
//             header("Location: jobs.php");
//         } else {
//             echo "Failed to submit the application.";
//         }
//     } catch (PDOException $e) {
//         echo 'Database Error: ' . $e->getMessage();
//     }
// } else {
//     // Handle if any of the required parameters are missing
//     echo "Invalid job application request.";
}
?>

<p>You have successfully applied for this job.</p>
<p>Further details about the hiring process will be notified through your email.</p>
<a href="jobs.php" class="back">Back to Job Listings</a>
</body>
</html>
