<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "7700pusheR", "payroll system");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$today = date('Y-m-d, g:i a');
$currentDate = date('Y-m-d h:i:s');

$Employee_Name = mysqli_real_escape_string($link, $_REQUEST['Employee_Name']);

// Attempt insert query execution
$sql = "INSERT INTO Timeslot (Timeslot_Check_In_Time , Timeslot_Check_Out_Time ,Timeslot_Employee_ID) VALUES ('$currentDate', '$currentDate ', (SELECT Employee_ID FROM Employee WHERE Employee_Name='$Employee_Name'))";
if(mysqli_query($link, $sql)){
     header("location: timeslot.html");
     exit();
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>


