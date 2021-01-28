<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "7700pusheR", "payroll system");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$Login_Name = mysqli_real_escape_string($link, $_POST['Login_Name']);
$Login_Password = mysqli_real_escape_string($link, $_POST['Login_Password']);

$Login_Password = password_hash($Login_Password,  PASSWORD_DEFAULT);
$Login_Rank = mysqli_real_escape_string($link, $_POST['Login_Rank']);


// Attempt insert query execution
$sql = "INSERT INTO `Login` (Login_Name, Login_Password,Login_Rank ) VALUES ('$Login_Name','$Login_Password','$Login_Rank')";
if(mysqli_query($link, $sql)){
     header("location: sideBar.html");
     exit();
    } else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>












