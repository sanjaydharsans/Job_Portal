<!DOCTYPE html>
<html>
<head>
    <title>Employer Dashboard</title>
    <style>
    
    *{
        margin: 0;
        padding: 0;
    }
    .banner-area{
        background-image: url('https://images.pexels.com/photos/245240/pexels-photo-245240.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
        background-position: center center;
        background-size:cover ;
        /* -webkit-background-size:cover ; */
        height: 100vh;
        width: auto;
        margin: auto;
    }
    .menu{
        float: right;
        list-style: none;
        margin-top:30px;
    }
    .menu ul li{
        display: inline-block;
    }
    .menu ul li a{
        color: #fff;
        text-decoration: none;
        padding: 5px 15px;
        font-family: 'poppins' ,sans-serif;
        font-size: 16px;
    }
    .menu ul li a:hover{
        color: rgb(199, 139, 255);
    }
    /* .logo{
        height: 20%;
        float: left;
        color: azure;
        list-style: none;
        
    } */
    .banner-text{
        position: absolute;
        width: 600px;
        height: 300px;
        margin: 20% 30%;
        text-align: center;
    }
    .banner-text h1{
        text-align: center;
        color:black;
        
        text-transform: uppercase;
        font-size: 60px;
        font-family: 'poppins' , sans-serif;
    }
    .banner-text p{
        color: white;
        font-size: 18px;
    }
    .banner-text a{
       
        padding: 10px 25px;
        text-decoration: none;
        text-transform: uppercase;
        font-size: 14px;
        margin-top: 20px;
        display: inline-block;
        color: #fff;
    }
    .banner-text a:hover{
        background-color: white;
        color: rgba(68, 25, 109, 0.623);
        font-weight: bold;
    }
    .welcome-message {
            position: absolute;
            top: 10px;
            left: 10px;
            color: black;
            font-size: 40px;
            font-family: 'poppins', sans-serif;
        }
    </style>

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

   


    <div class="banner-area">
    <header>
           <div class="menu">
           <h1 class="welcome-message">Welcome, <?php echo $employer['username']; ?></h1>
           <ul>
         <li><a href ="employee_details.php">Employee Details</a></li>  
         <li><a href="jobapplicants.php">Job Applicants List</li> 
         <li><a href="approved.php">Approved List</li> 
         <li><a href="choice.php">Logout</li> 
        
        
           </ul>
        </div>
    </header>
    <div class="banner-text">
            <h1>Welcome</h1>
            <p>You don't have to be great to start but you have to start to be great. </p>
            
            
        </div>
</body>
</html>
