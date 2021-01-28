
<?php
// connect to the database
$link = mysqli_connect("localhost", "root", "7700pusheR", "payroll system");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$Employee_ID=$_REQUEST["Employee_ID"];



$query = "SELECT * FROM Employee WHERE Employee_ID= $Employee_ID LIMIT 1";
$result = mysqli_query($link, $query);
?>

<body>
    <h1>Employee update</h1>
    <hr>
    <table style=" width:'50%'!important " class='table' >
        <tr bgcolor='#CCCCCC'>
            <th>Employee_ID</th>
            <th>Employee_Name</th>
            <th>Employee_Login_ID</th>
            <th>Employee_Department_ID</th>
            <th>Employee_Email</th>
             <th>Employee_Phone_Number</th>
              <th>Employee_Finger_Print_ID</th>
        </tr>
        <?php while ($res = mysqli_fetch_array($result)) { ?>
        <tr id ="<?php echo $res['Employee_ID']; ?>">
            <form action="update.php" method="post">
                <td><input type="hidden" name="Employee_ID" value="<?php echo $res['Employee_ID']; ?>"></td>
                <td><input type="text" name="Employee_Name" value="<?php echo $res['Employee_Name']; ?>"></td>
                <td><input type="hidden" name="Employee_Login_ID" value="<?php echo $res['Employee_Login_ID']; ?>"></td>
                <td><input type="hidden" name="Employee_Department_ID" value="<?php echo $res['Employee_Department_ID']; ?>"></td>
                <td><input type="text" name="Employee_Email" value="<?php echo $res['Employee_Email']; ?>"></td>
                <td><input type="text" name="Employee_Phone_Number" value="<?php echo $res['Employee_Phone_Number']; ?>"></td>
                <td><input type="hidden" name="Employee_Finger_Print_ID" value="<?php echo $res['Employee_Finger_Print_ID']; ?>"></td>

                <input type="Submit" name="update" value='update'>
            </form>
        </tr>
        <?php } ?>
  
    </table>
</body>







