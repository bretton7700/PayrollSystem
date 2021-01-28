<?php
// connect to the database
$link = mysqli_connect("localhost", "root", "7700pusheR", "payroll system");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// get results from database
$sql="SELECT * FROM `Login` ";
$result = mysqli_query($link,$sql);


?>
<html>
<head>
    <title>Update Login Details</title>
    <link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" >
  



  <link rel="stylesheet" a href="css/style.css">
</head>
<body>
    <h1>Login update</h1>





    <hr>
    <table style=" width:'50%'!important " class='table' >
        <tr bgcolor='#CCCCCC'>
            <th>Login_ID</th>
            <th>Login_Name</th>
            <th>Login_Password</th>
            <th>Login_Rank</th>
              <th>Edit</th>
              <th>DELETE</th>
        </tr>
        <?php while ($res = mysqli_fetch_array($result)) { ?>
        <tr id='<?php echo $res['Login_id']; ?>'>
            <form action="tablesLogin.php" method="post">
                <td style="visibility:hidden;"><?php echo $res['Login_id']; ?></td>
                <td><?php echo $res['Login_Name']; ?></td>
                <td><?php echo $res['Login_Password']; ?></td>
                <td><?php echo $res['Login_rank']; ?></td>
                <td><a href="tablesLogin.php?Login_id=<?php echo $res['Login_id']; ?>">edit</a></td>
                <td><a href="deleteLogin.php?Login_id=<?php echo $res['Login_id']; ?>">Delete</a></td>


                
            </form>
        </tr>
        <?php } ?>
  
    </table>
</body>
</html>