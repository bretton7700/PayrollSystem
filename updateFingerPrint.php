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
     
    
    
    $sql = "UPDATE Finger_Print SET Finger_Print_ID= '$_POST[Finger_Print_ID]', 
    Finger_Print_Desc = '$_POST[Finger_Print_Desc]', 
    Finger_Print_image= '$_POST[Finger_Print_image]' WHERE Finger_Print_ID = '$_POST[Finger_Print_ID]'";
} else {
    echo "Nothing was posted";
}

if (mysqli_query($conn, $sql)) {
     header("location: FingerPrintEdit.php");
     exit();
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>


