<?php  
 function fetch_data()  
 {  
      $output = '';  
      $conn = mysqli_connect("localhost", "root", "7700pusheR", "Payroll System");  
      $sql = "SELECT * FROM Employee";  
      $result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                           <td style="visibility:hidden;">'.$row["Employee_ID"].'</td> 
                          <td>'.$row["Employee_Name"].'</td>  
                          <td style="visibility:hidden;">'.$row["Employee_Login_ID"].'</td> 
                 <td style="visibility:hidden;">'.$row["Employee_Department_ID"].'</td> 
                      
                         
                          <td>'.$row["Employee_Email"].'</td> 
                          <td>'.$row["Employee_Phone_Number"].'</td>
                             <td style="visibility:hidden;">'.$row["Employee_Finger_Print_ID"].'</td> 
                           
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
           <tr>  
                            <th width="15%">Employee_ID</th>
                               <th width="15%">Employee_Name</th>  
                               <th width="15%">Employee_Login_ID</th>
                            <th width="15%">Employee_Department_ID</th>
                               <th width="15%">Employee_Email</th>  
                               <th width="15%">Employee_Phone_Number</th> 
                           <th width="15%">Employee_Finger_Print_ID</th>
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
           <title>GENERATE EMPLOYEE TABLE</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />            
      </head>  
      <body>  
           <br />
           <div class="container">  
                <h4 align="center"> Generate Employee Table Data </h4><br />  
                <div class="table-responsive">  
                    <div class="col-md-12" align="right">
                     <form   method="POST">  
                          <input type="submit" name="generate_pdf" class="btn btn-success" value="Download PDF" />  
                         
                     </form>  
                     </div>
                     <br/>
                     <br/>
                     <table class="table table-bordered">  
                          <tr>  
                           
                             <th width="50%">Employee_ID</th>
                               <th width="50%">Employee_Name</th>  
                               <th width="50%">Employee_Login_ID</th>
                            <th width="50%">Employee_Department_ID</th>
                               <th width="50%">Employee_Email</th>  
                               <th width="50%">Employee_Phone_Number</th> 
                           <th width="50%">Employee_Finger_Print_ID</th>
                             
                          </tr>  
                     <?php  
                     echo fetch_data();  
                     ?>  
                     </table>  
                </div>  
           </div>  
      </body>  