<?php

require('config.php');


$error = '';
$id = isset($_POST['id']) ? $_POST['id'] : '';
$name = isset($_POST['name']) ? $_POST['name'] : '';
$gender = isset($_POST['gender']) ? $_POST['gender'] : '';
$matno = isset($_POST['matno']) ? $_POST['matno'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$address = isset($_POST['address']) ? $_POST['address'] : '';
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$cpassword = isset($_POST['cpassword']) ? $_POST['cpassword'] : '';

if(isset($_POST['submit'])){
    
    $usersColl = $db->users;

    $rowCount = count($usersColl->find(['username' => $_POST['username']])->toArray());

    if($rowCount > 0) {
        $error = '<div class="alert alert-danger">This username already exists</div>';
    }elseif($password !== $cpassword){
        $error = '<div class="alert alert-danger">Passwords do not match</div>';
    }else {
        $insert = $usersColl->insertOne([
			'id' => (string) mt_rand(100000,999999),
            'name' => $name,
			'gender' => $gender,
            'matno' => $matno,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'username' => $username,
            'password' => $password,
            'role' => 'student',
            'profile_img' => '',
            'date_added' => date('y-m-d h:i:s a', time())
        ]);
    
        $_SESSION['username'] = $username;

        header("Location: index.php");
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
    <title>Register</title>

    <style>
      
		 body {
            position: relative;
            background: url('./img/st.jpg') no-repeat;
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
<body>
    <div class="dark-overlay">
        <div class="container" align="center">

		   <div class="row">
			<div class="col-md-4"></div>
            <div class="col-md-4 bg" style="padding-top: 50px;">
		   
                <h3>Register</h3>
                <small>Have an account? <a href="login.php">Go to login</a></small>
                <?php echo $error; ?>
                <form method="POST">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" required class="form-control" placeholder="Enter full name">
                        </div>
						
						<div class="form-group">
                            <label for="matno">Matric number</label>
                            <input type="matno" name="matno" required class="form-control" placeholder="Enter Matric number">
                        </div>
						<div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" required class="form-control" value="<?php echo $email; ?>"  placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="number" name="phone" required class="form-control" placeholder="Enter phone number">
                        </div>
                        <div class="form-group">
                            <label for="address">Permanent Home Address</label>
                            <textarea name="address" id="address" class="form-control" rows="2" required></textarea>
                        </div>
						<div class="form-group">
                            <label for="username">Username</label>
                            <input type="username" name="username" required class="form-control" placeholder="Enter username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" required class="form-control" placeholder="Enter password">
                        </div>
                        <div class="form-group">
                            <label for="cpassword">Confirm Password</label>
                            <input type="password" name="cpassword" required class="form-control" placeholder="Enter password">
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender:</label>
                            Male<input type="radio" name="gender" value="Male" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							Female<input type="radio" name="gender" value="Female">
                        </div>

                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
