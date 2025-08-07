<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
{	
    header('location:index.php');
}
else{
    if(isset($_POST['update']))
    {
        $id = intval($_GET['id']);
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $contactno = $_POST['contactno'];
        $dob = $_POST['dob'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $profileimage = $_FILES["profileimage"]["name"];

        if($profileimage) {
            move_uploaded_file($_FILES["profileimage"]["tmp_name"], "img/ownerimages/" . $_FILES["profileimage"]["name"]);
            $sql = "UPDATE owner SET FullName=:fullname, EmailId=:email, ContactNo=:contactno, dob=:dob, Address=:address, City=:city, Country=:country, ProfileImage=:profileimage WHERE id=:id";
        } else {
            $sql = "UPDATE owner SET FullName=:fullname, EmailId=:email, ContactNo=:contactno, dob=:dob, Address=:address, City=:city, Country=:country WHERE id=:id";
        }

        $query = $dbh->prepare($sql);
        $query->bindParam(':fullname', $fullname, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':contactno', $contactno, PDO::PARAM_STR);
        $query->bindParam(':dob', $dob, PDO::PARAM_STR);
        $query->bindParam(':address', $address, PDO::PARAM_STR);
        $query->bindParam(':city', $city, PDO::PARAM_STR);
        $query->bindParam(':country', $country, PDO::PARAM_STR);
        if($profileimage) {
            $query->bindParam(':profileimage', $profileimage, PDO::PARAM_STR);
        }
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        $msg = "Owner details updated successfully";
    }

    $id = intval($_GET['id']);
    $sql = "SELECT * FROM owner WHERE id=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_OBJ);
?>
<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Board Finder |Admin Manage Boardings   </title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

</head>
<body style="background-color: rgba(113, 99, 186, 0.1);">
    <?php include('includes/header.php'); ?>
    <div class="ts-main-content">
        <?php include('includes/leftbar.php'); ?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-title">Edit Owner</h2>
                        <div class="panel panel-default" style="border: 1px solid rgba(113, 99, 186, 1);">
                            <div class="panel-heading" style="background-color: rgba(113, 99, 186, 1); color: #f0f0f0;">Owner Details</div>
                            <div class="panel-body" style="background-color: rgba(113, 99, 186, 0.1);">
                                <?php if($msg){ ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?></div><?php } ?>
                                <form method="post" class="form-horizontal" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" style="color: rgba(113, 99, 186, 1);">Full Name</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="fullname" class="form-control" value="<?php echo htmlentities($result->FullName); ?>" required style="border: 1px solid rgba(113, 99, 186, 1);">
                                        </div>
                                        <label class="col-sm-2 control-label" style="color: rgba(113, 99, 186, 1);">Email</label>
                                        <div class="col-sm-4">
                                            <input type="email" name="email" class="form-control" value="<?php echo htmlentities($result->EmailId); ?>" required style="border: 1px solid rgba(113, 99, 186, 1);">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" style="color: rgba(113, 99, 186, 1);">Contact No</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="contactno" class="form-control" value="<?php echo htmlentities($result->ContactNo); ?>" required style="border: 1px solid rgba(113, 99, 186, 1);">
                                        </div>
                                        <label class="col-sm-2 control-label" style="color: rgba(113, 99, 186, 1);">Date of Birth</label>
                                        <div class="col-sm-4">
                                            <input type="date" name="dob" class="form-control" value="<?php echo htmlentities($result->dob); ?>" required style="border: 1px solid rgba(113, 99, 186, 1);">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" style="color: rgba(113, 99, 186, 1);">Address</label>
                                        <div class="col-sm-4">
                                            <textarea name="address" class="form-control" required style="border: 1px solid rgba(113, 99, 186, 1);"><?php echo htmlentities($result->Address); ?></textarea>
                                        </div>
                                        <label class="col-sm-2 control-label" style="color: rgba(113, 99, 186, 1);">City</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="city" class="form-control" value="<?php echo htmlentities($result->City); ?>" required style="border: 1px solid rgba(113, 99, 186, 1);">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" style="color: rgba(113, 99, 186, 1);">Country</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="country" class="form-control" value="<?php echo htmlentities($result->Country); ?>" required style="border: 1px solid rgba(113, 99, 186, 1);">
                                        </div>
                                        <label class="col-sm-2 control-label" style="color: rgba(113, 99, 186, 1);">Profile Image</label>
                                        <div class="col-sm-4">
                                            <input type="file" name="profileimage" class="form-control" style="border: 1px solid rgba(113, 99, 186, 1);">
                                            <?php if($result->ProfileImage){ ?>
                                                <img src="img/ownerimages/<?php echo htmlentities($result->ProfileImage); ?>" width="50">
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <button type="submit" name="update" class="btn btn-primary" style="background-color: rgba(113, 99, 186, 1); color: #f0f0f0;">Update Owner</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

      <!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

</body>
</html>
<?php } ?>