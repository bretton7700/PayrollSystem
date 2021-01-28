<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "7700pusheR", "payroll system");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$Leave_ID=$_REQUEST["Leave_ID"];
echo $Leave_ID;


// Attempt insert query execution

$sql = "DELETE FROM `Leave` WHERE Leave_ID='$Leave_ID'";
if(mysqli_query($link, $sql)){
    
    header("location: LeaveEdit.php");
    exit();
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
