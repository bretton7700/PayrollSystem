
<?php
// connect to the database
$link = mysqli_connect("localhost", "root", "7700pusheR", "payroll system");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$Leave_ID=$_REQUEST["Leave_ID"];



$query = "SELECT * FROM  `Leave` WHERE Leave_ID= $Leave_ID LIMIT 1";
$result = mysqli_query($link, $query);
?>

<body>
    <h1>leave update</h1>
    <hr>
    <table style=" width:'50%'!important " class='table' >
        <tr bgcolor='#CCCCCC'>
            <th>Leave_ID</th>
            <th>Leave_Employee_ID</th>
            <th>Leave_Start_Date</th>
            <th>Leave_End_Date</th>
        </tr>
        <?php while ($res = mysqli_fetch_array($result)) { ?>
        <tr id ="<?php echo $res['Leave_ID']; ?>">
            <form action="updateLeave.php" method="post">
                <td><input type="hidden" name="Leave_ID" value="<?php echo $res['Leave_ID']; ?>"></td>
                <td><input type="text" name="Leave_Employee_ID" value="<?php echo $res['Leave_Employee_ID']; ?>"></td>
                <td><input type="text" name="Leave_Start_Date" value="<?php echo $res['Leave_Start_Date']; ?>"></td>
                <td><input type="text" name="Leave_End_Date" value="<?php echo $res['Leave_End_Date']; ?>"></td>
                
                <input type="Submit" name="update" value='update'>
            </form>
        </tr>
        <?php } ?>
  
    </table>
</body>