<?php
require('../config.php');
include_once('../includes/adminHeader.php'); 

if (isset($_GET['user_id'])) {
    $uCollection = $db->users;
    $u = $uCollection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['user_id'])]);

    $msg = '';
    $name = $u->name;
    $email = $u->email;
    $phone = $u->phone;
    $address = $u->address;
}



?>
<div class="main">
<div class="row big-height">
    <div class="col-sm-2">
    <?php include('../includes/leftNav.php'); ?> 
    </div>
    <div class="col-sm-7">
        <div class="categories">
            <div class="categories-header">
                <h3>Bidder Profile</h3>
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
                        <input type="text" class="form-control" name='name' value="<?php echo $name; ?>" required readonly >
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control"name='email' value="<?php echo $email; ?>" required readonly readonly>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" name='phone' value="<?php echo $phone; ?>" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="address">Adress</label>
                        <textarea name="address" class="form-control" rows="4" required readonly><?php echo $address; ?></textarea>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <h3>Bidder Avatar</h3>
        <?php
        $file = '../img/profiles/'.$u->profile_img;
        if($u->profile_img == '' || !file_exists($file)) {
        ?>
        <img src="../img/profiles/avatar.png" alt="" class="d-block img-fluid mb-3 profile_img">
        <?php
        }else {
        ?>
        <img src="../img/profiles/<?php echo $u->profile_img; ?>" alt="" class="d-block img-fluid mb-3 profile_img">
        <?php
        }
        ?>
    </div>
    

</div>
</div>
<?php include_once('../includes/footer.php'); ?>
