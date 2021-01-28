<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "7700pusheR", "payroll system");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$Department_Name = mysqli_real_escape_string($link, $_REQUEST['Department_Name']);
$Department_Desc = mysqli_real_escape_string($link, $_REQUEST['Department_Desc']);


// Attempt insert query execution
$sql = "INSERT INTO Department (Department_ID, Department_Name,Department_Desc) VALUES ('Department_ID','$Department_Name', '$Department_Desc')";
if(mysqli_query($link, $sql)){
   header("location: sideBar.html");
   exit();
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>