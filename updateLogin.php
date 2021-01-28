<?php 

$servername="localhost";
$username="root";
$password="7700pusheR";
$dbname="payroll system";

$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
	die("connection failed: ".$conn->connect_error);
}


if (isset($_POST['update'])) {
    $sql = "UPDATE `Login` SET Login_id= '$_POST[Login_id]', Login_Name = '$_POST[Login_Name]', 
  Login_Password= '$_POST[Login_Password]',Login_rank= '$_POST[Login_rank]' WHERE Login_id = '$_POST[Login_id]'";
} else {
    echo "Nothing was posted";
}

if (mysqli_query($conn, $sql)) {
     header("location: LoginEdit.php");
     exit();
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>