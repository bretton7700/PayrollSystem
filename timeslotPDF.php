<?php
function fetch_data(){
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "7700pusheR", "payroll system");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
  $output = '';  
 $sql = "SELECT * FROM Timeslot";


 $result = mysqli_query($link, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                         <td style="visibility:hidden;">'.$row["Timeslot_ID"].'</td>
                          <td>'.$row["Timeslot_Check_In_Time"].'</td>  
                          <td>'.$row["Timeslot_Check_Out_Time"].'</td>  
                          <td style="visibility:hidden;">'.$row["Timeslot_Employee_ID"].'</td>
                          
                     </tr>  
                          ';  
      }  
      return $output;  
    }
 if(isset($_POST["generate_pdf"]))  
 {  
      require_once('tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Generate HTML Table Data To PDF From MySQL Database Using TCPDF In PHP");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 11);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '  
      <h4 align="center">Generate HTML Table Data </h4><br /> 
      <table border="1" cellspacing="0" cellpadding="3">  
           <tr>                     <th width="15%">Timeslot_ID</th>  
                               <th width="15%">Timeslot_Check_In_Time</th>  
                               <th width="15%">Timeslot_Check_Out_Time</th>  
                            <th width="15%">Timeslot_Employee_ID</th> 
                                
           </tr>  
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('file.pdf', 'D');  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>GENERATE Timeslot TABLE</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />            
      </head>  
      <body>  
           <br />
           <div class="container">  
                <h4 align="center"> Generate TimeslotTable Data </h4><br />  
                <div class="table-responsive">  
                    <div class="col-md-12" align="right">
                     <form action="timeslotPDF.php"  method="POST">  
                          <input type="submit" name="generate_pdf" class="btn btn-success" value="Download PDF" />  
                         
                     </form>  
                     </div>
                     <br/>
                     <br/>
                     <table class="table table-bordered">  
                          <tr>  
                            <th style="visibility:hidden;" width="15%">Timeslot_ID</th>  
                               <th style="visibility:hidden;" width="15%">Timeslot_Check_In_Time</th>  
                               <th  style="visibility:hidden;" width="15%">Timeslot_Check_Out_Time</th>  
                            <th  style="visibility:hidden;" width="15%">Timeslot_Employee_ID</th>  
                               
                                
                          </tr>  
                     <?php  
                     echo fetch_data();  
                     ?>  
                     </table>  
                </div>  
           </div>  
      </body>  

      