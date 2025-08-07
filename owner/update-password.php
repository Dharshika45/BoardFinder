<?php
session_start();
include('includes/config.php');

$error = ""; // ✅ Set default
$msg = "";   // ✅ Set default

if(strlen($_SESSION['alogin'])==0) { 
    header('location:index.php');
    exit;
}
else {
    if(isset($_POST['updatepass'])) {
        $password = md5($_POST['password']);
        $newpassword = md5($_POST['newpassword']);
        $confirmpassword = md5($_POST['confirmpassword']);
        $email = $_SESSION['alogin'];

        if($newpassword != $confirmpassword) {
            $error = "New password and confirm password do not match.";
        } else {
            // Check if current password is correct
            $sql = "SELECT Password FROM owner WHERE EmailId=:email AND Password=:password";
            $query = $dbh->prepare($sql);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':password', $password, PDO::PARAM_STR);
            $query->execute();

            if($query->rowCount() > 0) {
                // Update password
                $sql = "UPDATE owner SET Password=:newpassword WHERE EmailId=:email";
                $query = $dbh->prepare($sql);
                $query->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
                $query->bindParam(':email', $email, PDO::PARAM_STR);
                $query->execute();
                $msg = "Password updated successfully.";
            } else {
                $error = "Current password is incorrect.";
            }
        }
    }
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
                        <h2 class="page-title">Update Password</h2>
                        <div class="panel panel-default" style="border: 1px solid rgba(113, 99, 186, 1);">
                            <div class="panel-heading" style="background-color: rgba(113, 99, 186, 1); color: #f0f0f0;">Change Your Password</div>
                            <div class="panel-body" style="background-color: rgba(113, 99, 186, 0.1);">
                                <?php if($error){ ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?></div><?php } 
                                else if($msg){ ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?></div><?php } ?>
                                <form method="post" class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" style="color: rgba(113, 99, 186, 1);">Current Password</label>
                                        <div class="col-sm-4">
                                            <input type="password" name="password" class="form-control" required style="border: 1px solid rgba(113, 99, 186, 1);">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" style="color: rgba(113, 99, 186, 1);">New Password</label>
                                        <div class="col-sm-4">
                                            <input type="password" name="newpassword" class="form-control" required style="border: 1px solid rgba(113, 99, 186, 1);">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" style="color: rgba(113, 99, 186, 1);">Confirm New Password</label>
                                        <div class="col-sm-4">
                                            <input type="password" name="confirmpassword" class="form-control" required style="border: 1px solid rgba(113, 99, 186, 1);">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <button type="submit" name="updatepass" class="btn btn-primary" style="background-color: rgba(113, 99, 186, 1); color: #f0f0f0;">Update Password</button>
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