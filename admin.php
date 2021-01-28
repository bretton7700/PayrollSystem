<?php
// connect to the database
$link = mysqli_connect("localhost", "root", "7700pusheR", "payroll system");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// get results from database
$sql="SELECT * FROM Employee ";
$result = mysqli_query($link,$sql);


?>
<html>
<head>
    <title>Update Employee Details</title>
    <link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" >
  



  <link rel="stylesheet" a href="css/style.css">
</head>
<body>
    <h1>Employee update</h1>

<form action="generatePDF.php">
			<div class="">

				<div class="row">
					<div class="col-sm-3">
						


						<hr class="mb-3">
						<input class="btn btn-success" type="submit" value="generate PDF" name="login_btn">

					</div>
				</div>
		</form>




    <hr>
    <table style=" width:200px;padding :5px; "  >
        <tr bgcolor='#CCCCCC'>
            <th style="width:100px;height:70px ;padding:5px;">Employee_ID</th>
            <th style="width:100px;height:70px ;padding:5px;">Employee_Name</th>
            <th style="width:100px;height:70px ;padding:5px;">Employee_Login_ID</th>
            <th style="width:100px;height:70px ;padding:5px;">Employee_Department_ID</th>
            <th style="width:100px;height:70px ;padding:5px;">Employee_Email</th>
             <th style="width:100px;height:70px ;padding:5px;">Employee_Phone_Number</th>
              <th style="width:100px;height:70px ;padding:5px;">Employee_Finger_Print_ID</th>
              <th style="width:100px;height:70px ;padding:5px;">Edit</th>
              <th style="width:100px;height:70px ;padding:5px;">DELETE</th>
        </tr>
        <?php while ($res = mysqli_fetch_array($result)) { ?>
        <tr id='<?php echo $res['Employee_ID']; ?>'>
            <form action="tables.php" method="post">
                <td style="visibility:hidden;"><?php echo $res['Employee_ID']; ?></td>
                <td><?php echo $res['Employee_Name']; ?></td>
                <td style="visibility:hidden;"><?php echo $res['Employee_Login_ID']; ?></td>
                <td style="visibility:hidden;"><?php echo $res['Employee_Department_ID']; ?></td>
                <td><?php echo $res['Employee_Email']; ?></td>
                <td><?php echo $res['Employee_Phone_Number']; ?></td>
                <td style="visibility:hidden;"><?php echo $res['Employee_Finger_Print_ID']; ?></td>
                <td><a href="worse.php?Employee_ID=<?php echo $res['Employee_ID']; ?>">edit</a></td>
                <td><a href="delete.php?Employee_ID=<?php echo $res['Employee_ID']; ?>">Delete</a></td>


                
            </form>
        </tr>
        <?php } ?>
  
    </table>
</body>
</html>