<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
   


<style>
    
*{
    margin: 0;
    padding: 0;
}
.banner-area{
    background-image: url('https://images.pexels.com/photos/187913/pexels-photo-187913.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
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
    padding: 5px 20px;
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
    color:white;
    
    text-transform: uppercase;
    font-size: 60px;
    font-family: 'poppins' , sans-serif;
}
.banner-text p{
    color: #fff;
    font-size: 18px;
}
.banner-text a{
    border: 1px solid #fff;
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
</style>
</head>


<body>
    <div class="banner-area">
    <header>
           <div class="menu">
                <ul>
                    <li><a href="employee.php">Employee</a></li>
                    <li><a href="employerlogin.php">Employer</a></li>
                 
                    
                </ul>
            </div>

        </header>
       
        <div class="banner-text">
            <h1>Welcome</h1>
            <p>If opportunity doesn’t knock, build a door. </p>
          
            
        </div>
        


    </div>
</body>

