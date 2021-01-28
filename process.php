

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
$Department_Name = mysqli_real_escape_string($link, $_REQUEST['Department_Name']);
$Employee_Email = mysqli_real_escape_string($link, $_REQUEST['Employee_Email']);
$Employee_Phone_Number = mysqli_real_escape_string($link, $_REQUEST['Employee_Phone_Number']);

// Attempt insert query execution
$sql = "INSERT INTO Employee (Employee_Name, Employee_Department_ID,Employee_Email,Employee_Phone_Number,Employee_Finger_Print_ID,Employee_Login_ID) VALUES 
('$Employee_Name',(SELECT Department_ID FROM Department WHERE Department_Name='$Department_Name'),
 '$Employee_Email',' $Employee_Phone_Number',
 (SELECT Finger_Print_ID  FROM Finger_Print WHERE finger_print_Desc='$Employee_Name'),
 (SELECT Login_ID FROM `login` WHERE Login_Name='$Employee_Name'))";
if(mysqli_query($link, $sql)){
     header("location: sideBar.html");
     exit();
    } else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>