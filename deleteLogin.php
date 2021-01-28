<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "7700pusheR", "payroll system");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$Login_id=$_REQUEST["Login_id"];
echo $Login_id;


// Attempt insert query execution

$sql = "DELETE FROM`Login` WHERE Login_id='$Login_id'";
if(mysqli_query($link, $sql)){
    
    header("location: loginEdit.php");
    exit();
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
