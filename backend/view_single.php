<?php
require('../includes/function.php');
require('../config.php');
include_once('../includes/adminHeader.php'); 

?>



<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>View Single</title>
</head>
<body>

<div class="container"><font color = 'green'><h2>
<table width="1100" border="1px"  class="table table-borderd table-hover" align="center">
   <tr align="center" > <td colspan=10><b>
   <div class="container"><font color = 'green'><h3>
View Single graduate Here!
</h3></a></div>
   
   </b></td></tr>
   <tr bgcolor="silver"> 
	  <td><b>##</b></td>
      <td><b>Full Name</b></td>
      <td><b>Gender</b></td>
	  <td><b>Matric No</b></td>
	  <td><b>email</b></td>
      <td><b>Home Address</b></td>
	  <td><b>Phone</b></td>
	  <td><b>##</b></td>
   </tr></a>

   <?php
$matno = $_GET['c'];
$result = $db->users->find(array('matno' => $matno));
if (count($result)>=1){
	
foreach($result as $p) {
   $error = '';         
 
echo "<tr>";
         echo "<td>".$p->id."</td>";
         echo "<td>".$p->name."</td>";
         echo "<td>".$p->gender."</td>";
		 echo "<td>".$p->matno."</td>";	
		 echo "<td>".$p->email."</td>";
		 echo "<td>".$p->address."</td>";
		 echo "<td>".$p->phone."</td>";
		 echo "<td>";
         echo "<a href='upload_certificate.php?id=".$p->id."' class='btn btn-success'>Upload_Cert_Details </a>";
		

}
   ?>          
   
   					</div> 
					</table>
				</div>  
           </div>
           <?php
}
?>
		</body>
   </html>