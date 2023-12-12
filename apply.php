<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
  
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $Title = $_POST['Job_Title'];
      $Description = $_POST['Job_Description'];
      $Date = $_POST['Posted_On'];
  
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "jobportal";
    
      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
    
      
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }
  
      // Sanitize input to prevent SQL injection
      // $sanitizedName = $conn->real_escape_string($Title);
      // $sanitizedAge = $conn->real_escape_string($Description);
      // $sanitizedMobile = $conn->real_escape_string($Date);
  
      // Prepare SQL query
      $sql = "INSERT INTO applied_jobs (Title, Description, Date) VALUES ('$Title', '$Description', '$Date')";
  
      if ($conn->query($sql) === TRUE) {
          echo "New record added successfully!";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
  
      // Close connection
      $conn->close();
  } else {
      // Handle other request methods if necessary
      echo "Only POST requests are allowed.";
  }
?>
<p>Applied successfully</p>
</body>
</html>

