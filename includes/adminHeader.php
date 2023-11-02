<?php
if(!isset($_SESSION['username'])) {
    header('Location: ../');
}

$username = $_SESSION['username'];
$usersColl = $db->users;
$user = $usersColl->findOne(['username' => $username]);

$basename = basename($_SERVER['REQUEST_URI'], '.php');
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
    <title>Admin</title>
</head>
<body>

<div class="wrapper">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-sm navbar-light bg-light p-0">
            <div class="container-fluid">
                <a href="index.php" class="navbar-brand" style="color: #fff;">Admin >>></a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
                   <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
				<li class="nav-item px-2">
                        <a href="./index.php" class="nav-link <?php echo $basename == 'Home' ? 'active-a'  : '' ?> ">Home</a>
                    </li>
					<li class="nav-item px-2">
                        <a href="../register.php" class="nav-link <?php echo $basename == 'register' ? 'active-a'  : '' ?> ">Register</a>
                    </li>
                    <li class="nav-item px-2">
                        <a href="viewAllregistered.php" class="nav-link <?php echo $basename == 'ViewAll' ? 'active-a'  : '' ?> ">ViewAll</a>
                    </li>
                    <li class="nav-item px-2">
                        <a href="viewSingle.php" class="nav-link <?php echo $basename == 'viewSingle' ? 'active-a'  : '' ?> ">ViewSingle</a>
                    </li>
                    <li class="nav-item px-2">
                        <a href="viewAllcert.php" class="nav-link <?php echo $basename == 'Cert_Details' ? 'active-a'  : '' ?> "> CertDetails</a>
                    </li>
                   
					<li class="nav-item px-2">
                        <a href="../verify.php" class="nav-link <?php echo $basename == 'verify' ? 'active-a'  : '' ?> ">verify</a>
                    </li>
					<li class="nav-item px-2">
                        <a href="changePassword.php" class="nav-link <?php echo $basename == 'changePassword' ? 'active-a'  : '' ?> ">ChangePassword</a>
                    </li>
					<li class="nav-item px-2">
                        <a href="profile.php" class="nav-link <?php echo $basename == 'profile' ? 'active-a'  : '' ?> ">Profile</a>
                    </li>
					<li class="nav-item px-2">
                        <a href="logout.php" class="nav-link <?php echo $basename == 'logout' ? 'active-a'  : '' ?> ">Logout</a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown mr-3">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <?php echo $user->name; ?>
                    </a>
                    <div class="dropdown-menu">
                    <a href="profile.php" class="dropdown-item">
                        <i class="fa fa-user-circle"></i> Profile
                    </a>
                    <a href="logout.php" class="dropdown-item">
                        <i class="fa fa-user-times"></i> Logout
                    </a>
                    </div>
                </li>
                </ul>
            </div>
            </div>
        </nav>



