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
    $sql = "UPDATE Department SET Department_ID= '$_POST[Department_ID]', Department_Name = '$_POST[Department_Name]', 
    Department_Desc= '$_POST[Department_Desc]' WHERE Department_ID = '$_POST[Department_ID]'";
} else {
    echo "Nothing was posted";
}

if (mysqli_query($conn, $sql)) {
     header("location: departmentsEdit.php");
     exit();
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>