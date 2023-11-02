<?php
require('../config.php');
include_once('../includes/adminHeader.php'); 

$msg = '';
$role = isset($_POST['role']) ? $_POST['role'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$cpassword = isset($_POST['cpassword']) ? $_POST['cpassword'] : '';
if(isset($_POST['submit'])){

    if($password !== $cpassword){
        $usersCollection = $db->users;
        $usersCollection->updateOne(
            ['_id' => new MongoDB\BSON\ObjectID($user->_id)],
            ['$set' => ['role' => $role]]

        );
            
        $msg = '<div class="alert alert-danger">Passwords do match</div>';
    }else {
        
       
    
        $msg = '<div id="success-alert" class="alert alert-success">Password has been changed successfully</div>'; 
    }  

}


?>
<div class="main">
<div class="row big-height">
    <div class="col-sm-2">
    <?php //include('../includes/leftNav.php'); ?> 
    </div>
    <div class="col-sm-6">
        <div class="categories">
            <div class="categories-header"><font color="green">
                <h3>Add Admin</h3></a>
                <a href="profile.php" class="btn btn-success btn-sm">Profile</a>
                <br><br><br>
            </div>
            <div class="categories-body">
                <?php echo $msg; ?>
                <form method="POST">
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" name="password" required class="form-control" placeholder="Enter new password">
                    </div>
                    <div class="form-group">
                        <label for="category">Confirm Password</label>
                        <input type="password" name="cpassword" required class="form-control" placeholder="Enter confirm password">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    

</div>
</div>
<?php //include_once('../includes/footer.php'); ?>
