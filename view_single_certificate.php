<?php
require('config.php');

$id = $_GET['c'];
$result = $db->certificates->find(array('id' => $id));
if (count($result)>=1){
	
}
foreach($result as $coll) {
		
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Verification Result Page</title>

    <style>
      
		 body {
            position: relative;
          
            background-size: cover;
            background-position: center;
            height: 140vh;
            color: #fff;
        }
		

        .dark-overlay {
            background-color: rgba(0, 0, 0, 0.7);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .heading {
            background-color: #f4f8f5;
            color: green;
        }

        .bg {
            background-color: white;
            color: green;
            padding: 10px;
        }

        .bg h4 {
            text-align: center;
        }

    </style>
</head>
<body id="c1" name="c1">
    <div class="dark-overlay">
        <div class="container" align="center">
			<div class="col-md-3"></div>
            <div class="col-md-7 bg" style="padding-top: 50px;">
		  
<form action="createpdf" method="POST" id="ce">
			<h4><p align="right"><?php echo $coll->id;?> </p> </h4> 

	<table width="100%"> 
		<tr>
			<td> <p align="center"> <img src="./img/bsu.JPG"alt=""> </p> </td>
		</tr>
	</table>

	<div class="form-group"><h3>BENUE STATE UNIVERSITY</h3></div>
    
	<div class="form-group"><h4>This is to certify that</h4></div>
						
    <div class="form-group"><h2><?php echo $coll->name;?></h2></div>
	
     <div class="form-group">
        <h4>Having completed an approved course of study </br>
		and passed the prescribed examinations,</br>
		has this day, under the authority of the senate,</br>
		been awarded the degree of</h4>                      
	</div>
	
    <div class="form-group"><h2><?php echo $coll->degree;?></h2></div>
						<div>
								</div>
        <div class="form-group">
	<table width="100%"> 
		<tr>
			<td> <p align="center"> <img src="./img/bsum.JPG"alt=""> </p> </td>
			<td>  <h4>VICE CHANCELLOR </h4> </td>
		</tr>
	</table>
		</div>
		
<div class="form-group">
	<table width="100%"> 
	<tr>
<td><p align="center"><h4>Date:<?php echo $coll->date_of_graduation;?></h4></p></td>
<td> <h4>REGISTRAR </h4> </td></tr>
	</table>
</div>
		<style type="text/css">
@media print {
    #printbtn {
        display :  none;
    }
}
</style>
<input id ="printbtn" type="button" value="Print Slip" onclick="window.print();" >	
    
	</form>
	
		</div>
	      
		</div>
        </div>
    </div>
	
<?php
}
?>
    <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
