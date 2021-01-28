<?php
// connect to the database
$link = mysqli_connect("localhost", "root", "7700pusheR", "payroll system");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$Timeslot_ID=$_REQUEST["Timeslot_ID"];



$query = "SELECT * FROM  Timeslot WHERE Timeslot_ID= $Timeslot_ID LIMIT 1";
$result = mysqli_query($link, $query);
?>

<body>
    <h1>Timeslot update</h1>
    <hr>
    <table style=" width:'50%'!important " class='table' >
        <tr bgcolor='#CCCCCC'>
            <th>Timeslot_ID</th>
            <th>Timeslot_Check_Out_Time</th>
            <th>Timeslot_Employee_ID</th>
            <th>Timeslot_Check_In_Time</th>
        </tr>
        <?php while ($res = mysqli_fetch_array($result)) { ?>
        <tr id ="<?php echo $res['Timeslot_ID']; ?>">
            <form action="updateTimeslot.php" method="post">
                <td><input type="hidden" name="Timeslot_ID" value="<?php echo $res['Timeslot_ID']; ?>"></td>
                <td><input type="text" name="Timeslot_Check_Out_Time" value="<?php echo $res['Timeslot_Check_Out_Time']; ?>"></td>
                <td><input type="hidden" name="Timeslot_Employee_ID" value="<?php echo $res['Timeslot_Employee_ID']; ?>"></td>
                <td><input type="text" name="Timeslot_Check_In_Time" value="<?php echo $res['Timeslot_Check_In_Time']; ?>"></td>
                
                <input type="Submit" name="update" value='update'>
            </form>
        </tr>
        <?php } ?>
  
    </table>
</body>