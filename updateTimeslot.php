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
    $sql = "UPDATE Timeslot SET Timeslot_ID= '$_POST[Timeslot_ID]', Timeslot_Check_Out_Time = '$_POST[Timeslot_Check_Out_Time]', 
    Timeslot_Employee_ID= '$_POST[Timeslot_Employee_ID]',Timeslot_Check_In_Time= '$_POST[Timeslot_Check_In_Time]' WHERE Timeslot_ID = '$_POST[Timeslot_ID]'";
} else {
    echo "Nothing was posted";
}

if (mysqli_query($conn, $sql)) {
     header("location: TimeslotEdit.php");
     exit();
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>