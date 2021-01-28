<?php
// connect to the database
$link = mysqli_connect("localhost", "root", "7700pusheR", "payroll system");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// get results from database
$sql="SELECT * FROM `Leave` ";
$result = mysqli_query($link,$sql);


?>
<html>
<head>
    <title>Update Leave Details</title>
    <link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" >
  



  <link rel="stylesheet" a href="css/style.css">
</head>
<body>
    <h1>Leave update</h1>





    <hr>
    <table style=" width:'50%'!important " class='table' >
        <tr bgcolor='#CCCCCC'>
            <th>Leave_ID</th>
            <th>Leave_Employee_ID</th>
            <th>Leave_Start_Date</th>
            <th>Leave_End_Date</th>
              <th>Edit</th>
              <th>DELETE</th>
        </tr>
        <?php while ($res = mysqli_fetch_array($result)) { ?>
        <tr id='<?php echo $res['Leave_ID']; ?>'>
            <form action="tablesleave.php" method="post">
                <td style="visibility:hidden;"><?php echo $res['Leave_ID']; ?></td>
                <td style="visibility:hidden;"><?php echo $res['Leave_Employee_ID']; ?></td>
                <td><?php echo $res['Leave_Start_Date']; ?></td>
                <td><?php echo $res['Leave_End_Date']; ?></td>
                <td><a href="tablesLeave.php?Leave_ID=<?php echo $res['Leave_ID']; ?>">edit</a></td>
                <td><a href="deleteLeave.php?Leave_ID=<?php echo $res['Leave_ID']; ?>">Delete</a></td>


                
            </form>
        </tr>
        <?php } ?>
  
    </table>
</body>
</html>