<?php
// connect to the database
$link = mysqli_connect("localhost", "root", "7700pusheR", "payroll system");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


// escape string

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	

// LOGIN USER
function login(){
	global $link, $Login_Name, $errors;

    // grap form values
    $Login_Name = mysqli_real_escape_string($link, $_REQUEST['Login_Name']);


	// make sure form is filled properly
	if (empty($Login_Name)) {
		array_push($errors, "Login_Name is required");
	}
	

	// attempt login if no errors on form


	$query = "SELECT * FROM `Login` WHERE Login_Name='$Login_Name'  LIMIT 1";
	$results = mysqli_query($link, $query);

	if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
		$logged_in_user = mysqli_fetch_assoc($results);
		if ($logged_in_user['Login_rank'] == 'admin') {

			$_SESSION['user'] = $logged_in_user;
		
			header('location: admin.php');		  
		}else{
			$_SESSION['user'] = $logged_in_user;
				

			echo "You are not an admin you can't edit";
			}
		
	}
}




login();








?>
