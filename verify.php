<?php 
require('includes/function.php');
require('config.php');
include_once('includes/header.php'); 

if(isset($_POST['submit'])){
$code = $_POST['code'];
header('Location: view_single_certificate.php?c='.$code);}
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
    <title>Welcome</title>

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
        <div class="container">
            
            <div class="row">
			<div class="col-md-4"></div>
            <div class="col-md-4 bg" style="padding-top: 50px;">
                <h4>Enter your verification details here!</h4>
          
                <form method="POST">
                       
                        <div class="form-group">
                            <label for="password">Certificate number</label>
                            <input type="password" name="code" required class="form-control" placeholder="Enter Certificate number here">
                        </div>
                       
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary">Verify</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>