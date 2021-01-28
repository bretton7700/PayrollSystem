<?php
// connect to the database
$link = mysqli_connect("localhost", "root", "7700pusheR", "payroll system");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$Login_id=$_REQUEST["Login_id"];



$query = "SELECT * FROM  `Login` WHERE Login_id= $Login_id LIMIT 1";
$result = mysqli_query($link, $query);
?>

<body>
    <h1>Login update</h1>
    <hr>
    <table style=" width:'50%'!important " class='table' >
        <tr bgcolor='#CCCCCC'>
            <th>Login_ID</th>
            <th>Login_Name</th>
            <th>Login_Password</th>
            <th>Login_Rank</th>
        </tr>
        <?php while ($res = mysqli_fetch_array($result)) { ?>
        <tr id ="<?php echo $res['Login_id']; ?>">
            <form action="updateLogin.php" method="post">
                <td><input type="hidden" name="Login_id" value="<?php echo $res['Login_id']; ?>"></td>
                <td><input type="text" name="Login_Name" value="<?php echo $res['Login_Name']; ?>"></td>
                <td><input type="text" name="Login_Password" value="<?php echo $res['Login_Password']; ?>"></td>
                <td><input type="text" name="Login_rank" value="<?php echo $res['Login_rank']; ?>"></td>
                
                <input type="Submit" name="update" value='update'>
            </form>
        </tr>
        <?php } ?>
  
    </table>
</body>