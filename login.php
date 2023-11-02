<?php
require('config.php');

$error = '';
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

if(isset($_POST['submit'])){
    $usersColl = $db->users;

    $rowCount = count($usersColl->find(['username' => $username, 'password' => $password])->toArray());

    if($rowCount > 0) {
        $user = $usersColl->findOne(['username' => $username, 'password' => $password]);
        $_SESSION['username'] = $username;
        if($user->role == 'admin') {
            header('Location: backend/');
        }else {
            header('Location: verify.php');
        }
    }else {
        $error = '<div class="alert alert-danger">Invalid Username or password</div>';
    }
}


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
    <title>Login Page</title>

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
            
			<div class="row">
			<div class="col-md-4"></div>
            <div class="col-md-4 bg" style="padding-top: 50px;">
                <h4>Login or Create a free account</h4>
               
                <form method="POST">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="username" name="username" required class="form-control"   placeholder="Enter username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" required class="form-control" placeholder="Enter password">
                        </div>
                        <p>New User? <a href='register.php'>Click here to register</a></p>
                        <div class="form-group">
						<h3><a href='forgotpassword.php'>forgot password?</a></h3>
                            <button align="center" type="submit" name="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
