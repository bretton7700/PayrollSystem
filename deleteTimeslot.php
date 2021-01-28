<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "7700pusheR", "payroll system");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$Timeslot_ID=$_REQUEST["Timeslot_ID"];
echo $Timeslot_ID;


// Attempt insert query execution

$sql = "DELETE FROM Timeslot WHERE Timeslot_ID='$Timeslot_ID'";
if(mysqli_query($link, $sql)){
    
    header("location: TimeslotEdit.php");
    exit();
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
