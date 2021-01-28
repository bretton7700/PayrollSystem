<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "7700pusheR", "payroll system");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$Finger_Print_Desc = mysqli_real_escape_string($link, $_REQUEST['Finger_Print_Desc']);
$Finger_Print_Image = mysqli_real_escape_string($link, $_REQUEST['Finger_Print_Image']);


// Attempt insert query execution
$sql = "INSERT INTO Finger_Print (Finger_Print_ID, Finger_Print_Desc,Finger_Print_Image) VALUES ('Finger_Print_ID','$Finger_Print_Desc', '$Finger_Print_Image')";
if(mysqli_query($link, $sql)){
   header("location: sideBar.html");
   exit();
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>