<?php
require('../config.php');
include('../includes/function.php');
include_once('../includes/adminHeader.php'); 
//<?php include('../includes/leftNav.php'); 
?>


<div class="container" ><font color = 'green'>
<div class="row big-height">
    <div class="col-sm-2">
    
    </div>
    <div class="col-sm-10">
        <div class="categories">
            <div class="categories-header">
                <h3>All Registered Users</h3>
                <br><br><br>
            </div>
            <div class="categories-body">
                <?php
                    
                    $options = ['sort' => ['date_added' => -1]];
                    $userColl = $db->users;
                    $cursor = $userColl->find([], $options);
                    $rowCount = count($userColl->find([])->toArray());

                    if($rowCount > 0) {
                    
                ?>
                <table class="table table-borderd">
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Reg. Date</th>
                        <th>Action</th>
                    </tr>

                    <?php
                        $sn = 0;
                        foreach($cursor as $c) {
                            //Dont display users with admin role
                            if($c->role == 'admin') {
                                continue;
                            }
                            //Getting human readible time format
                            $date_time_now = date("Y-m-d H:i:s");
                            $start_date = new DateTime($c->date_added); //Time of post
                            $end_date = new DateTime($date_time_now); //Current time
                            //return time interval
                            $time_message = timeInterval($start_date, $end_date);

                           
                            $sn++;
                            echo "<tr>";
                            echo "<td>".$sn."</td>";
                            echo "<td>".$c->name."</td>";
                            echo "<td>".$c->email."</td>";
                            echo "<td>".$c->phone."</td>";
                            echo "<td>".$time_message."</td>";
                            echo "<td>";
                            echo "<a href='viewUserInfo.php?user_id=".$c->_id."'><span class='badge badge-primary'>View Profile</span></a>  ";
                            //echo "<a onclick='return confirm('Are you sure you want to delete this?')' href='deleteProduct.php?id=".$c->_id."'><span class='badge badge-danger'>Delete</span></a>   ";
                           
                            echo "</td>";
                            echo "</tr>";
							
                         }
                    ?>

                </table>
                <?php }else {
                    echo '<div class="alert alert-info">No verification yet!</div>';
               } ?>
            </div>
        </div>
    </div>
    

</div>
</div>

<?php include_once('../includes/footer.php'); ?>
