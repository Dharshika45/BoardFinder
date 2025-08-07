<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
{ 
    header('location:index.php');
}
else{
    $msg = ""; // ✅ Prevents 'undefined variable' warning

    if(isset($_POST['updateprofile']))
    {
        $name = $_POST['fullname'];
        $mobileno = $_POST['mobilenumber'];
        $dob = $_POST['dob'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $email = $_SESSION['alogin'];

        $sql = "UPDATE owner SET FullName=:name, ContactNo=:mobileno, dob=:dob, Address=:address, City=:city, Country=:country WHERE EmailId=:email";
        $query = $dbh->prepare($sql);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':mobileno', $mobileno, PDO::PARAM_STR);
        $query->bindParam(':dob', $dob, PDO::PARAM_STR);
        $query->bindParam(':address', $address, PDO::PARAM_STR);
        $query->bindParam(':city', $city, PDO::PARAM_STR);
        $query->bindParam(':country', $country, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->execute();

        $msg = "Profile updated successfully";
    }


    $email = $_SESSION['alogin'];
    $sql = "SELECT * FROM owner WHERE EmailId=:email";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_OBJ);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Board Finder |Owner Manage Boardings   </title>

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
	<!-- Owner Stye -->
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
        <?php include('includes/sidebarowner.php'); ?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-title">Profile Settings</h2>
                        <div class="panel panel-default" style="border: 1px solid rgba(113, 99, 186, 1);">
                            <div class="panel-heading" style="background-color: rgba(113, 99, 186, 1); color: #f0f0f0;">Update Profile</div>
                            <div class="panel-body" style="background-color: rgba(113, 99, 186, 0.1);">
                                <?php if($msg){ ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?></div><?php } ?>
                                <form method="post" class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" style="color: rgba(113, 99, 186, 1);">Full Name</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="fullname" class="form-control" value="<?php echo htmlentities($result->FullName); ?>" required style="border: 1px solid rgba(113, 99, 186, 1);">
                                        </div>
                                        <label class="col-sm-2 control-label" style="color: rgba(113, 99, 186, 1);">Mobile Number</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="mobilenumber" class="form-control" value="<?php echo htmlentities($result->ContactNo); ?>" required style="border: 1px solid rgba(113, 99, 186, 1);">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" style="color: rgba(113, 99, 186, 1);">Date of Birth</label>
                                        <div class="col-sm-4">
                                            <input type="date" name="dob" class="form-control" value="<?php echo htmlentities($result->dob); ?>" required style="border: 1px solid rgba(113, 99, 186, 1);">
                                        </div>
                                        <label class="col-sm-2 control-label" style="color: rgba(113, 99, 186, 1);">Address</label>
                                        <div class="col-sm-4">
                                            <textarea name="address" class="form-control" required style="border: 1px solid rgba(113, 99, 186, 1);"><?php echo htmlentities($result->Address); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" style="color: rgba(113, 99, 186, 1);">City</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="city" class="form-control" value="<?php echo htmlentities($result->City); ?>" required style="border: 1px solid rgba(113, 99, 186, 1);">
                                        </div>
                                        <label class="col-sm-2 control-label" style="color: rgba(113, 99, 186, 1);">Country</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="country" class="form-control" value="<?php echo htmlentities($result->Country); ?>" required style="border: 1px solid rgba(113, 99, 186, 1);">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <button type="submit" name="updateprofile" class="btn btn-primary" style="background-color: rgba(113, 99, 186, 1); color: #f0f0f0;">Update Profile</button>
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
    <script src="js/main.js"></script>
</body>
</html>
<?php } ?>