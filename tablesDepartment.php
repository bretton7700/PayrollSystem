




<?php
// connect to the database
$link = mysqli_connect("localhost", "root", "7700pusheR", "payroll system");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$Department_ID=$_REQUEST["Department_ID"];



$query = "SELECT * FROM Department WHERE Department_ID= $Department_ID LIMIT 1";
$result = mysqli_query($link, $query);
?>

<body>
    <h1>Department update</h1>
    <hr>
    <table style=" width:'50%'!important " class='table' >
        <tr bgcolor='#CCCCCC'>
            <th>Department_ID</th>
            <th>Department_Name</th>
            <th>Department_Desc</th>
        </tr>
        <?php while ($res = mysqli_fetch_array($result)) { ?>
        <tr id ="<?php echo $res['Department_ID']; ?>">
            <form action="updateDepartment.php" method="post">
                <td><input type="hidden" name="Department_ID" value="<?php echo $res['Department_ID']; ?>"></td>
                <td><input type="text" name="Department_Name" value="<?php echo $res['Department_Name']; ?>"></td>
                <td><input type="text" name="Department_Desc" value="<?php echo $res['Department_Desc']; ?>"></td>
                
                <input type="Submit" name="update" value='update'>
            </form>
        </tr>
        <?php } ?>
  
    </table>
</body>