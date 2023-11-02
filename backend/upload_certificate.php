<?php
require('../config.php');

$error = '';
//$id =trim($_POST['id']) ;
$id = isset($_POST['id']) ? $_POST['id'] : '';
$name = isset($_POST['name']) ? $_POST['name'] : '';
$department = isset($_POST['department']) ? $_POST['department'] : '';
$degree = isset($_POST['degree']) ? $_POST['degree'] : '';
$date_of_graduation = isset($_POST['date_of_graduation']) ? $_POST['date_of_graduation'] : '';

if(isset($_POST['submit'])){   
    $graduate_coll = $db->certificates;

    $rowCount = count($graduate_coll->find(['id' => $_POST['id']])->toArray());

    if($rowCount > 0) {
        $error = '<div class="alert alert-danger">ID already exists</div>';
    
    }else {
        $insert = $graduate_coll->insertOne([
			'id' => $id,
			'name' => $name,
            'department' => $department,
            'degree' => $degree,
            'date_of_graduation' => $date_of_graduation,
            'date_uploaded' => date('y-m-d h:i:s a', time())
        ]);
    
        $_SESSION['id'] = $id;

        header("Location: viewAllcert.php");
		}
    }
	

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
             <div class="heading">
                <img src="./img/bsu.png" alt="">
            </div>
           
		   <div class="row">
			<div class="col-md-4"></div>
            <div class="col-md-4 bg" style="padding-top: 50px;">
		   
                <h3>Upload certificate details here!</h3>
               
                <?php echo $error; ?>
                <form method="POST">
				<div class='form-group'>
                                    <label  class='col-sm-6 control-label'> ID</label>
                                    <div class='col-sm-6'>
				<?php
		if(isset($_GET['id'])){       
		$id=(int)$_GET['id'];
		
	?>
				<input type='number' class='form-control' name='id' value='<?php echo $id ?>' readonly='readonly'>
                                    </div>
    <?php  } ?>
					<div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" name="name" required class="form-control" placeholder="Enter full name">
                        </div>
                        <div class="form-group">
                            <label for="department">Department</label>
                            <input type="text" name="department" required class="form-control" placeholder="Enter department">
                        </div>
						
                        <div class="form-group">
                            <label for="degree">Degree/Class</label>
                            <textarea name="degree" id="degree" class="form-control" rows="2" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="date of graduation">Date of graduation</label>
                            <input type="date of graduation" name="date of graduation" required class="form-control" placeholder="Enter date of graduation">
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
