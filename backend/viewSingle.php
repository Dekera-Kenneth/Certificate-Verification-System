<?php 
require('../includes/function.php');
require('../config.php');
include_once('../includes/adminHeader.php'); 


?>
	
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>View Single</title>

    <style>
        body {
            position: relative;
            background: url('./img/st.jpg') no-repeat;
            background-size: cover;
            background-position: center;
            height: 100vh;
            color: #fff;
        }

        .dark-overlay {
            background-color: rgba(0, 0, 0, 0.7);
            position: absolute;
            top: 10;
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
<body>
    <div class="dark-overlay">
        <div class="container" align="center">
            
            <div class="row">
			<div class="col-md-4"></div>
            <div class="col-md-4 bg" style="padding-top: 50px;">
                <h4>Search By Matric Number</h4>          
                <form method="POST">
                       
                        <div class="form-group">
                            <label for="matno">Matric number</label>
                            <input type="matno" name="matno" required class="form-control" placeholder="Enter Matric number here">
                        </div>
                       
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-success">View Single</button>
                        </div>
                    </form>
<?php

if(isset($_POST['submit'])){
   $matno = $_POST['matno'];
   header('Location: view_single.php?c='.$matno);
   }

?>

                </div>
            </div>
        </div>
    </div>

</body>
</html>