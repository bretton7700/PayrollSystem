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
$Leave_Start_Date = mysqli_real_escape_string($link, $_REQUEST['Leave_start_date']);
$Leave_End_Date = mysqli_real_escape_string($link, $_REQUEST['Leave_End_Date']);

// Attempt insert query execution
$sql = "INSERT INTO `Leave` (Leave_Employee_ID, Leave_Start_Date, Leave_End_Date) VALUES ((SELECT Employee_ID FROM Employee Where Employee_Name='$Employee_Name'), '$Leave_Start_Date', '$Leave_End_Date')";
if(mysqli_query($link, $sql)){
     header("location: leave.html");
     exit();
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>