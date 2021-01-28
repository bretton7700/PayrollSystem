<?php 

$servername="localhost";
$username="root";
$password="7700pusheR";
$dbname="payroll system";

$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
	die("connection failed: ".$conn->connect_error);
}
if(isset($_POST['username'])){
    

    
    $uname = mysqli_real_escape_string($conn, $_POST["username"]);
    $Login_Password = mysqli_real_escape_string($conn, $_POST["password"]);
    $Login_hash = password_hash($Login_Password, PASSWORD_DEFAULT);
    
    #$uname= strip_tags(mysqli_real_escape_string($conn,trim($uname)));
    #$password= strip_tags(mysqli_real_escape_string($conn,trim($password)));
    

    
    $query="select * from `login` where Login_Name='".$uname."'";
    $result =mysqli_query($conn,$query);
        
     if(mysqli_num_rows($result) > 0)  
           {  
                while($row = mysqli_fetch_array($result))  
                {  
                     if(password_verify($Login_Password,$Login_hash))  
                     {  
                          //return true;  
                         header("Location: /Front-End/timeslot.html");
            			 exit();



                     }  
                     else  
                     {  
                          //return false;  
                          echo '<script>alert("Wrong User Details")</script>';  
                     }  
                }  
           }  
           else  
           {  
                echo '<script>alert("Wrong User Details")</script>';  
           }  
      }  
   


$conn->close();
?>






<!DOCTYPE html>
<html>

<head>
	<title> Login Form </title>
	<link rel="stylesheet" a href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
		integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

</head>

<body>

<form method="post" action="#"> 


<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');width:400px; height:400px;margin: auto;">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					 Login
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5">

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="User name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>


					<div class="container-login100-form-btn m-t-32">
						<button name='login' value ="login"class="login100-form-btn">
							Login
						</button>
					</div>
					<div class="container-login100-form-btn m-t-32">
						<button  class="btn btn-warning"><a href="\Front-End\sideBar.html">New Employee</a></button>
					</div>

					
					
				</form>
			
			</div>
		</div>
	</div>




	
	<div id="dropDownSelect1"></div>
	


</form>
	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>

</html>