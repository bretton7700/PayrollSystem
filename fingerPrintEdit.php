<?php
// connect to the database
$link = mysqli_connect("localhost", "root", "7700pusheR", "payroll system");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// get results from database
$sql="SELECT * FROM Finger_Print ";
$result = mysqli_query($link,$sql);


?>
<html>
<head>
    <title>Update FingerPrints Details</title>
    <link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" >
  



  <link rel="stylesheet" a href="css/style.css">
</head>
<body>
    <h1>FingerPrint update</h1>





    <hr>
    <table style=" width:'50%'!important " class='table' >
        <tr bgcolor='#CCCCCC'>
            <th>Finger_Print_ID</th>
            <th>Finger_Print_Desc</th>
            <th>Finger_Print_image</th>
             <th>Edit</th>
            <th>DELETE</th>
        </tr>
        <?php while ($res = mysqli_fetch_array($result)) { ?>
        <tr id='<?php echo $res['Finger_Print_ID']; ?>'>
            <form action="tablesFingerPrint.php" method="post" enctype='multipart/form-data'>
                <td style="visibility:hidden;"><?php echo $res['Finger_Print_ID']; ?></td>
                <td><?php echo $res['Finger_Print_Desc']; ?></td>
                <td><?php echo $res['Finger_Print_image']; ?></td>
                <td><a href="tablesFingerPrint.php?Finger_Print_ID=<?php echo $res['Finger_Print_ID']; ?>">edit</a></td>
                <td><a href="deleteFingerPrint.php?Finger_Print_ID=<?php echo $res['Finger_Print_ID']; ?>">Delete</a></td>


                
            </form>
        </tr>
        <?php } ?>
  
    </table>
</body>
</html>