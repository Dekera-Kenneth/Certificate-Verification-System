<?php
require('../config.php');
$p = null;

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $error = '';
    if (isset($_POST['submit'])) {

        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
        $matno = isset($_POST['matno']) ? $_POST['matno'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $address = isset($_POST['address']) ? $_POST['address'] : '';
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        $usersColl = $db->users;

        $users = $usersColl->updateOne(
            ['id' => $id],
            ['$set' => [
                'name' => $name,
                'gender' => $gender,
                'matno' => $matno,
                'email' => $email,
                'phone' => $phone,
                'address' => $address,
                'username' => $username,
                'password' => $password
            ]]

        );
        if ($users) {
            $_SESSION['success'] = "User updated successfully";
            header("Location: viewAllregistered.php");
        }
    }

} else {
    echo "error encountered";
}
?>
<?php

$p = $db->users->findOne(array('id' => $_GET['id']));

$error = '';

$id = $p->_id;
$name = $p->name;
$gender = $p->gender;
$matno = $p->matno;
$email = $p->email;
$phone = $p->phone;
$address = $p->address;
$username =  $p->username;
$password = $p->password;
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
    <title>edit</title>

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

                    <h3>Edit User Info</h3>

                    <form method="POST" action="edit.php?id=<?php echo $_GET['id']; ?>">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" required class="form-control" placeholder="Enter full name" value="<?php echo $name; ?>">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender:</label>
                            Male<input type="radio" name="gender" value="<?php echo $gender; ?>" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Female<input type="radio" name="gender" value="<?php echo $gender; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="matno">Matric number</label>
                            <input type="matno" name="matno" required class="form-control" placeholder="Enter Matric number" value="<?php echo $matno; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" required class="form-control" placeholder="Enter email" value="<?php echo $email; ?>">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="number" name="phone" required class="form-control" placeholder="Enter phone number" value="<?php echo $phone; ?>">
                        </div>
                        <div class="form-group">
                            <label for="address">Permanent Home Address</label>
                            <textarea name="address" id="address" class="form-control" rows="2" value="<?php echo $address; ?>" required><?php echo $address; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="username" name="username" required class="form-control" placeholder="Enter username" value="<?php echo $username; ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" required class="form-control" placeholder="Enter password" value="<?php echo $password; ?>">
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="id" value="<?php echo $id; ?>" />
                            <button type="submit" name="submit" value="submit" class="btn btn-success">Submit</button>
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