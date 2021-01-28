<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "7700pusheR", "payroll system");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$Finger_Print_ID=$_REQUEST["Finger_Print_ID"];
echo $Finger_Print_ID;


// Attempt insert query execution

$sql = "DELETE FROM Finger_Print WHERE Finger_Print_ID='$Finger_Print_ID'";
if(mysqli_query($link, $sql)){
    
    header("location: fingerPrintEdit.php");
    exit();
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
