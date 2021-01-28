
<?php
// connect to the database
$link = mysqli_connect("localhost", "root", "7700pusheR", "payroll system");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$Finger_Print_ID=$_REQUEST["Finger_Print_ID"];



$query = "SELECT * FROM  Finger_Print WHERE Finger_Print_ID= $Finger_Print_ID LIMIT 1";
$result = mysqli_query($link, $query);
?>

<body>
    <h1>FingerPrint  update</h1>
    <hr>
    <table style=" width:'50%'!important " class='table' >
        <tr bgcolor='#CCCCCC'>
            <th>Finger_Print_ID</th>
            <th>Finger_Print_Desc</th>
            <th>Finger_Print_image</th>
        </tr>
        <?php while ($res = mysqli_fetch_array($result)) { ?>
        <tr id ="<?php echo $res['Finger_Print_ID']; ?>">
            <form action="updateFingerPrint.php" method="post">
                <td><input type="hidden" name="Finger_Print_ID" value="<?php echo $res['Finger_Print_ID']; ?>"></td>
                <td><input type="text" name="Finger_Print_Desc" value="<?php echo $res['Finger_Print_Desc']; ?>"></td>
                <td><input type="file" name="Finger_Print_image" value="<?php echo $res['Finger_Print_image']; ?>"></td>
                
                <input type="Submit" name="update" value='update'>
            </form>
        </tr>
        <?php } ?>
  
    </table>
</body>