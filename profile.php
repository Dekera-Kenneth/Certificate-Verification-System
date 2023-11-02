<?php
require('config.php');
include_once('includes/header.php'); 

$msg = '';
$name = isset($_POST['name']) ? $_POST['name'] : $user->name;
$email = isset($_POST['email']) ? $_POST['email'] : $user->email;
$phone = isset($_POST['phone']) ? $_POST['phone'] : $user->phone;
$address = isset($_POST['address']) ? $_POST['address'] : $user->address;

if(isset($_POST['submit'])){
    $usersCollection = $db->users;

    $usersCollection->updateOne(
        ['_id' => new MongoDB\BSON\ObjectID($user->_id)],
        ['$set' => ['name' => $name, 'email' => $email, 'phone' => $phone, 'address' => $address]]
    );

    $msg = "Profile updated successfully";
    

}

$error = '';
if(isset($_POST['updateImg'])) {   

    //codes for image upload and post inserting
    $file_name = $_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    $file_ext=pathinfo($file_name, PATHINFO_EXTENSION);


    $expensions= array("jpeg","jpg","png");
    $errorFlag = false;
    if(in_array($file_ext,$expensions)=== false){
        $error =  '<div class="alert alert-danger">Extension not allowed, please choose a JPEG or PNG file! </div>';
        $errorFlag = true;
    }


    if($errorFlag != true){
        $image_path = time().'.'.$file_ext;
        if($user->profile_img !== '') {
            $file = 'img/profiles/'.$user->profile_img;
            if(file_exists($file)){
                unlink($file);
            }
        }
        if(move_uploaded_file($file_tmp,"img/profiles/".$image_path)) {
            $usersCollection = $db->users;
            $usersCollection->updateOne(
                ['_id' => new MongoDB\BSON\ObjectID($user->_id)],
                ['$set' => [
                    'profile_img' => $image_path
                ]]
            );

        }

        header('Location: profile.php');
    }
}

?>
<div class="main">
<div class="row big-height">
    <div class="col-sm-2">
   
    </div>
    <div class="col-sm-7">
        <div class="categories">
            <div class="categories-header">
                <h3>Profile</h3>
                
                <br><br><br>
            </div>
            <div class="categories-body">
                <?php
                     if($msg !== ''){
                        echo "<div id='success-alert' class='alert alert-success'>".$msg."</div>";
                        $msg = '';
                    }
                ?>
                <form method="POST">
                    <div class="form-group">
                        <label for="name">Full name</label>
                        <input type="text" class="form-control" name='name' value="<?php echo $name; ?>" required >
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control"name='email' value="<?php echo $email; ?>" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" name='phone' value="<?php echo $phone; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Adress</label>
                        <textarea name="address" class="form-control" rows="4" required><?php echo $address; ?></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <h3>Your Avatar</h3>
        <?php
        $file = 'img/profiles/'.$user->profile_img;
        if($user->profile_img == '' || !file_exists($file)) {
        ?>
        <img src="img/profiles/avatar.png" alt="" class="d-block img-fluid mb-3 profile_img">
        <?php
        }else {
        ?>
        <img src="img/profiles/<?php echo $user->profile_img; ?>" alt="" class="d-block img-fluid mb-3 profile_img">
        <?php
        }
        ?>
        <form method="POST" action="profile.php" enctype="multipart/form-data">
            <div class="form-group">
                <input type="file" name='image' class="form-control-file" required>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success btn-block" name="updateImg" value="Edit Image">
            </div>
        </form>
        <?php echo $error; ?>
    </div>
    

</div>
</div>
<?php include_once('includes/userFooter.php'); ?>
