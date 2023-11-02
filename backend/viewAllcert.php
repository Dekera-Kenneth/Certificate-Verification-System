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
    <title>View All Certificates</title>
</head>
<body>


<div class="container"><font color = 'green'><h2>
<table width="1100" border="1px"  class="table table-borderd table-hover" align="center">
   <tr align="center" > <td colspan=10><b>
   <div class="container"><h3>
View certificate details Here!
</h3></div>
   
   </b></td></tr>
   <tr bgcolor="silver"> 
	  <td><b>##</b></td>
      <td><b>Full Name</b></td>
      <td><b>Department</b></td>
	  <td><b>Degree/class</b></td>
	  <td><b>Date of graduation</b></td>
	  <td colspan = "2"><b>##</b></td>
   </tr></a>
   <?php
$result = $db->certificates->find([]);
		foreach($result as $coll) {
         echo "<tr>";
		 echo "<td>".$coll->id."</td>";
         echo "<td>".$coll->name."</td>";
         echo "<td>".$coll->department."</td>";
		 echo "<td>".$coll->degree."</td>";	
		 echo "<td>".$coll->date_of_graduation."</td>";
		 echo "<td>";
         echo "<a href='edit2.php?id=".$coll->id."' class='btn btn-success'>Edit </a>";
         echo "<td>";
         echo "<a href='viewAllcert.php?id=".$coll->id."' class='btn btn-danger'>Delete </a>";
         "</td>";
         echo "</tr>";
      };
?>						</div> 
					</table>
				</div>  
        	</div>
		</body>
	</html>

