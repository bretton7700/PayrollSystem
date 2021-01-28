<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "7700pusheR", "payroll system");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$Employee_Name = mysqli_real_escape_string($link, $_REQUEST['Employee_Name']);

// Attempt insert query execution


$sql="UPDATE Timeslot SET Timeslot_Check_Out_Time = NOW() ";
if(mysqli_query($link, $sql)){
     header("location: timeslot.html");
     exit();
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>