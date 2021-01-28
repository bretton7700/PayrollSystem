<?php
// connect to the database
$link = mysqli_connect("localhost", "root", "7700pusheR", "payroll system");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// get results from database
$sql="SELECT * FROM Department ";
$result = mysqli_query($link,$sql);


?>
<html>
<head>
    <title>Update Employee Details</title>
    <link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" >
  



  <link rel="stylesheet" a href="css/style.css">
</head>
<body>
    <h1>Department update</h1>





    <hr>
    <table style=" width:'50%'!important " class='table' >
        <tr bgcolor='#CCCCCC'>
            <th>Department_ID</th>
            <th>Department_Name</th>
            <th>Department_Desc</th>
              <th>Edit</th>
              <th>DELETE</th>
        </tr>
        <?php while ($res = mysqli_fetch_array($result)) { ?>
        <tr id='<?php echo $res['Department_ID']; ?>'>
            <form action="tablesDepartment.php" method="post">
                <td style="visibility:hidden;"><?php echo $res['Department_ID']; ?></td>
                <td><?php echo $res['Department_Name']; ?></td>
                <td><?php echo $res['Department_Desc']; ?></td>
                <td><a href="tablesDepartment.php?Department_ID=<?php echo $res['Department_ID']; ?>">edit</a></td>
                <td><a href="deleteDepartment.php?Department_ID=<?php echo $res['Department_ID']; ?>">Delete</a></td>


                
            </form>
        </tr>
        <?php } ?>
  
    </table>
</body>
</html>