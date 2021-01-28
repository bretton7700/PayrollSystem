<?php
// connect to the database
$link = mysqli_connect("localhost", "root", "7700pusheR", "payroll system");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// get results from database
$sql="SELECT * FROM Timeslot ";
$result = mysqli_query($link,$sql);


?>
<html>
<head>
    <title>Update Timeslot Details</title>
    <link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" >
  



  <link rel="stylesheet" a href="css/style.css">
</head>
<body>
    <h1>Timeslot update</h1>





    <hr>
    <table style=" width:'50%'!important " class='table' >
        <tr bgcolor='#CCCCCC'>
            <th>Timeslot_ID</th>
            <th>Timeslot_Check_Out_Time</th>
            <th>Timeslot_Employee_ID</th>
            <th>Timeslot_Check_In_Time</th>
              <th>Edit</th>
              <th>DELETE</th>
        </tr>
        <?php while ($res = mysqli_fetch_array($result)) { ?>
        <tr id='<?php echo $res['Timeslot_ID']; ?>'>
            <form action="tablesTimeslot.php" method="post">
                <td><?php echo $res['Timeslot_ID']; ?></td>
                <td><?php echo $res['Timeslot_Check_Out_Time']; ?></td>
                <td><?php echo $res['Timeslot_Employee_ID']; ?></td>
                <td><?php echo $res['Timeslot_Check_In_Time']; ?></td>
                <td><a href="tablesTimeslot.php?Timeslot_ID=<?php echo $res['Timeslot_ID']; ?>">edit</a></td>
                <td><a href="deleteTimeslot.php?Timeslot_ID=<?php echo $res['Timeslot_ID']; ?>">Delete</a></td>


                
            </form>
        </tr>
        <?php } ?>
  
    </table>
</body>
</html>