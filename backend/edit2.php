<?php
require('../config.php');
$p = null;

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $error = '';
    if (isset($_POST['submit'])) {

        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $department = isset($_POST['department']) ? $_POST['department'] : '';
        $degree = isset($_POST['degree']) ? $_POST['degree'] : '';
        $date_of_graduation = isset($_POST['date_of_graduation']) ? $_POST['date_of_graduation'] : '';

        $cert_coll = $db->certificates;
        $certificates = $cert_coll->updateOne(
            //['id' => $id],
            ['$set' => [
                'name' => $name,
                'department' => $department,
                'degree' => $degree,
                'date_of_graduation' => $date_of_graduation
            ]]

        );
        if ($certificates) {
            $_SESSION['success'] = "Certificate updated successfully";
            header("Location: viewAllcert.php");
        }
    }

} else {
    echo "error encountered";
}
?>
<?php

$p = $db->certificates->findOne(array('id' => $_GET['id']));

$error = '';

$id = $p->_id;
$name = $p->name;
$department = $p->department;
$degree = $p->degree;
$date_of_graduation = $p->date_of_graduation;
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
    <title>Edit Cert. Details</title>

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

                    <h3>Edit Certificate Details</h3>

                    <form method="POST" action="edit.php?id=<?php echo $_GET['id']; ?>">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" name="name" required class="form-control" placeholder="Enter full name" value="<?php echo $name; ?>">
                        </div>
                        <div class="form-group">
                            <label for="department">Department</label>
                            <input type="text" name="department" required class="form-control" placeholder="Enter department" value="<?php echo $department; ?>">
                        </div>

                        <div class="form-group">
                            <label for="degree">Degree/Class</label>
                            <textarea name="degree" id="degree" class="form-control" rows="2" value="<?php echo $address; ?>" required><?php echo $degree; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="date_of_graduationn">Date of graduation</label>
                            <input type="text" name="date_of_graduation" required class="form-control" placeholder="Enter date of graduation" value="<?php echo $date_of_graduation; ?>">
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