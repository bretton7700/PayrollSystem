


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
    $sql = "UPDATE Employee SET Employee_ID= '$_POST[Employee_ID]', Employee_Name = '$_POST[Employee_Name]', 
    Employee_Login_ID = '$_POST[Employee_Login_ID]',Employee_Department_ID = '$_POST[Employee_Department_ID]', Employee_Email = '$_POST[Employee_Email]',
     Employee_Phone_Number = '$_POST[Employee_Phone_Number]', 
     Employee_Finger_Print_ID = '$_POST[Employee_Finger_Print_ID]' WHERE Employee_ID = '$_POST[Employee_ID]'";
} else {
    echo "Nothing was posted";
}

if (mysqli_query($conn, $sql)) {
     header("location: admin.php");
     exit();
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>