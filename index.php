<?php 

require('config.php');
 
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
    <title>Home Page</title>

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
<body>
    <div class="dark-overlay">
        <div class="container" align="center">
            <div class="heading" >
                <img src="./img/bsu.jpg" alt="">
                <h3>Welcome to Benue State University, Makurdi (BSUM),<br> Online Certificate Verification system.</h3>
            </div>
			
			<div class="row">
			<div class="col-md-4"></div>
            <div class="col-md-4 bg" style="padding-top: 50px;">
                <h4>Login or Create a free account</h4>
        <form method="POST">
<p>Have account? <a href="login.php" class='btn btn-primary'>Click here to login</a></p>
<p>New User? <a href="register.php" class='btn btn-success'>Click here to register</a></p>
 
		</form>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
