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
    $sql = "UPDATE `Leave` SET Leave_ID= '$_POST[Leave_ID]', Leave_Employee_ID = '$_POST[Leave_Employee_ID]', 
    Leave_Start_Date= '$_POST[Leave_Start_Date]',Leave_End_Date= '$_POST[Leave_End_Date]' WHERE Leave_ID = '$_POST[Leave_ID]'";
} else {
    echo "Nothing was posted";
}

if (mysqli_query($conn, $sql)) {
     header("location: LeaveEdit.php");
     exit();
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>