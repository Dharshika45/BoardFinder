<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if(isset($_POST['submit']))
{
$fromdate=$_POST['fromdate'];
$todate=$_POST['todate']; 
$message=$_POST['message'];
$useremail=$_SESSION['login'];
$status=0;
$vhid=$_GET['vhid'];
$bookingno=mt_rand(100000000, 999999999);
$ret="SELECT * FROM tblbooking where (:fromdate BETWEEN date(FromDate) and date(ToDate) || :todate BETWEEN date(FromDate) and date(ToDate) || date(FromDate) BETWEEN :fromdate and :todate) and BoardingId=:vhid";
$query1 = $dbh -> prepare($ret);
$query1->bindParam(':vhid',$vhid, PDO::PARAM_STR);
$query1->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
$query1->bindParam(':todate',$todate,PDO::PARAM_STR);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);

if($query1->rowCount()==0)
{

$sql="INSERT INTO  tblbooking(userEmail,BoardingId,FromDate,ToDate,message,Status) VALUES(:useremail,:vhid,:fromdate,:todate,:message,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':useremail',$useremail,PDO::PARAM_STR);
$query->bindParam(':vhid',$vhid,PDO::PARAM_STR);
$query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
$query->bindParam(':todate',$todate,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Booking successfull.');</script>";
echo "<script type='text/javascript'> document.location = 'my-booking.php'; </script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
 echo "<script type='text/javascript'> document.location = 'Boarding-list.php'; </script>";
} }  else{
 echo "<script>alert('Boarding already booked for these days');</script>"; 
 echo "<script type='text/javascript'> document.location = 'Boarding-list.php'; </script>";
}

}

?>


<!DOCTYPE HTML>
<html lang="en">
<head>

<title>Board Finder | Boarding Details</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<!--slick-slider -->
<link href="assets/css/slick.css" rel="stylesheet">
<!--bootstrap-slider -->
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--FontAwesome Font Style -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">

<!-- SWITCHER -->
		<link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>
<body>

<!-- Start Switcher -->
<!-- <?php include('includes/colorswitcher.php');?> -->
<!-- /Switcher -->  


<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 
 
<!--Listing-Image-Slider-->

<?php 
$vhid=intval($_GET['vhid']);
$sql = "SELECT tblboarding.*,tbluni.UniversityName,tbluni.id as bid  from tblboarding join tbluni on tbluni.id=tblboarding.VehiclesBrand where tblboarding.id=:vhid";
$query = $dbh -> prepare($sql);
$query->bindParam(':vhid',$vhid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
$_SESSION['brndid']=$result->bid;  
?>  

<section id="listing_img_slider" style="background-color: rgba(113, 99, 186, 0.1);">
  <div><img src="Owner/img/boardingimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="image" width="900" height="560"></div>
  <div><img src="Owner/img/boardingimages/<?php echo htmlentities($result->Vimage2);?>" class="img-responsive" alt="image" width="900" height="560"></div>
  <div><img src="Owner/img/boardingimages/<?php echo htmlentities($result->Vimage3);?>" class="img-responsive" alt="image" width="900" height="560"></div>
  <div><img src="Owner/img/boardingimages/<?php echo htmlentities($result->Vimage4);?>" class="img-responsive"  alt="image" width="900" height="560"></div>
  <?php if($result->Vimage5=="")
{

} else {
  ?>
  <div><img src="Owner/img/boardingimages/<?php echo htmlentities($result->Vimage5);?>" class="img-responsive" alt="image" width="900" height="560"></div>
  <?php } ?>
</section>
<!--/Listing-Image-Slider-->


<!--Listing-detail-->
<section class="listing-detail" style="background-color: rgba(113, 99, 186, 0.1);">
  <div class="container">
    <div class="listing_detail_head row">
      <div class="col-md-9">
        <h2 style="color:rgba(113, 99, 186, 1);"><?php echo htmlentities($result->UniversityName);?> , <?php echo htmlentities($result->VehiclesTitle);?></h2>
      </div>
      <div class="col-md-3">
        <div class="price_info">
          <p>Rs. <?php echo htmlentities($result->PricePerDay);?> </p>Per Day
         
        </div>
      </div>
    </div>
    <div class="row" style="background-color: rgba(113, 99, 186, 0.1);">
      <div class="col-md-9" >
        <div class="main_features">
          <ul>
          
            <li> <i class="fa fa-calendar" aria-hidden="true" style="color: rgba(113, 99, 186, 1);"></i>
              <h5 style="color: rgba(113, 99, 186, 1);"><?php echo htmlentities($result->ModelYear);?></h5>
              <p>Build Year</p>
            </li>
            <li> <i class="fa fa-map-marker" aria-hidden="true" style="color: rgba(113, 99, 186, 1);"></i>
              <h5 style="color: rgba(113, 99, 186, 1);"><?php echo htmlentities($result->FuelType);?></h5>
              <p>Place</p>
            </li>
       
            <li> <i class="fa fa-home" aria-hidden="true" style="color: rgba(113, 99, 186, 1);"></i>
              <h5 style="color: rgba(113, 99, 186, 1);"><?php echo htmlentities($result->SeatingCapacity);?></h5>
              <p>Rooms</p>
            </li>
          </ul>
        </div>
        <div class="listing_more_info"  style="background-color: rgba(113, 99, 186, 0.1);">
          <div class="listing_detail_wrap"> 
            <!-- Nav tabs -->
            <ul class="nav nav-tabs gray-bg" role="tablist"  style="background-color: rgba(113, 99, 186, 0.1);">
              <li role="presentation" class="active"><a href="#vehicle-overview " aria-controls="vehicle-overview" role="tab" data-toggle="tab">Boarding Info </a></li>
          
              <li role="presentation"><a href="#accessories" aria-controls="accessories" role="tab" data-toggle="tab">Accessories</a></li>
            </ul>
            
            <!-- Tab panes -->
            <div class="tab-content"> 
              <!-- vehicle-overview -->
              <div role="tabpanel" class="tab-pane active" id="vehicle-overview">
                
                <p><?php echo htmlentities($result->VehiclesOverview);?></p>
              </div>
              
              
              <!-- Accessories -->
              <div role="tabpanel" class="tab-pane" id="accessories"> 
                <!--Accessories-->
                <table>
                  <thead>
                    <tr>
                      <th colspan="2">Accessories</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td> Fan Facility</td>
<?php if($result->AirConditioner==1)
{
?>
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?> 
   <td><i class="fa fa-close" aria-hidden="true"></i></td>
   <?php } ?> </tr>

<tr>
<td>Attached Bathroom</td>
<?php if($result->AntiLockBrakingSystem==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else {?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
                    </tr>

<tr>
<td> Furnished Room</td>
<?php if($result->PowerSteering==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
</tr>
                   

<tr>

<td>24x7 Water Supply</td>

<?php if($result->PowerWindows==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
</tr>
                   
 <tr>
<td>Cooking Facility</td>
<?php if($result->CDPlayer==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
</tr>

<tr>
<td>Power Backup Inverter</td>
<?php if($result->LeatherSeats==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
</tr>

<tr>
<td>Visitor Restrictions Safety Rules</td>
<?php if($result->CentralLocking==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
</tr>

<tr>
<td>Girls Only</td>
<?php if($result->PowerDoorLocks==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
                    </tr>
                    <tr>
<td>  Boys Only</td>
<?php if($result->BrakeAssist==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php  } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
</tr>

<tr>
<td> Separate for Boys and Girls</td>
<?php if($result->DriverAirbag==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
 </tr>
 
 <tr>
 <td> Parking Facility</td>
 <?php if($result->PassengerAirbag==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else {?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
</tr>

<tr>
<td>CCTV Security</td>
<?php if($result->CrashSensor==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?>
</tr>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          
        </div>
<?php }} ?>
   
      </div>
      
      <!--Side-Bar-->
      <aside class="col-md-3" style="background-color: rgba(113, 99, 186, 0.1);">
      
        <div class="share_vehicle" style="background-color: rgba(113, 99, 186, 1);">
          <p>Share: <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a> </p>
        </div>
        <div class="sidebar_widget"  style="background-color: rgba(113, 99, 186, 0.1);">
          <div class="widget_heading">
            <h5 style="color: rgba(113, 99, 186, 1);"><i class="fa fa-envelope" aria-hidden="true"></i>Book Now</h5>
          </div>
          <form method="post">
            <div class="form-group">
              <label style="color: rgba(113, 99, 186, 1);">From Date:</label>
              <input type="date" class="form-control" name="fromdate" placeholder="From Date" required
              style="background-color: rgba(113, 99, 186, 0.1);">
            </div>
            <div class="form-group">
              <label style="color: rgba(113, 99, 186, 1);">To Date:</label>
              <input type="date" class="form-control" name="todate" placeholder="To Date" required
              style="background-color: rgba(113, 99, 186, 0.1);">
            </div>
            <div class="form-group">
              <textarea rows="4" class="form-control" name="message" placeholder="Message" required
              style="background-color: rgba(113, 99, 186, 0.1);"></textarea>
            </div>
          <?php if($_SESSION['login'])
              {?>
              <div class="form-group">
                <input type="submit" class="btn"  name="submit" value="Book Now">
              </div>
              <?php } else { ?>
<a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login For Book</a>

              <?php } ?>
          </form>
        </div>
      </aside>
      <!--/Side-Bar--> 
    </div>
    
    <div class="space-20"></div>
    <div class="divider"></div>
    
    <!--Similar-Cars-->
    <div class="similar_cars">
      <h3 style="color: rgba(113, 99, 186, 1);">Near Boardings</h3>
      <div class="row">
<?php 
$bid=$_SESSION['brndid'];
$sql="SELECT tblboarding.VehiclesTitle,tbluni.UniversityName,tblboarding.PricePerDay,tblboarding.FuelType,tblboarding.ModelYear,tblboarding.id,tblboarding.SeatingCapacity,tblboarding.VehiclesOverview,tblboarding.Vimage1 from tblboarding join tbluni on tbluni.id=tblboarding.VehiclesBrand where tblboarding.VehiclesBrand=:bid";
$query = $dbh -> prepare($sql);
$query->bindParam(':bid',$bid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>      
        <div class="col-md-3 grid_listing">
          <div class="product-listing-m gray-bg" style="background-color: rgba(113, 99, 186, 0.1);">
            <div class="product-listing-img"> <a href="boarding-details.php?vhid=<?php echo htmlentities($result->id);?>"><img src="Owner/img/boardingimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="image" /> </a>
            </div>
            <div class="product-listing-content">
              <h5><a href="boarding-details.php?vhid=<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->UniversityName);?> , <?php echo htmlentities($result->VehiclesTitle);?></a></h5>
              <p class="list-price">$<?php echo htmlentities($result->PricePerDay);?></p>
          
              <ul class="features_list" style="background-color: rgba(113, 99, 186, 0.1);">
                
             <li><i class="fa fa-home" aria-hidden="true"></i><?php echo htmlentities($result->SeatingCapacity);?> Rooms</li>
                <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($result->ModelYear);?>[Build]</li>
                <li><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo htmlentities($result->FuelType);?></li>
              </ul>
            </div>
          </div>
        </div>
 <?php }} ?>       

      </div>
    </div>
    <!--/Similar-Cars--> 
    
  </div>
</section>
<!--/Listing-detail--> 

<!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer--> 

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 

<!--Login-Form -->
<?php include('includes/login.php');?>
<!--/Login-Form --> 

<!--Register-Form -->
<?php include('includes/registration.php');?>

<!--/Register-Form --> 

<!--Forgot-password-Form -->
<?php include('includes/forgotpassword.php');?>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<script src="assets/switcher/js/switcher.js"></script>
<script src="assets/js/bootstrap-slider.min.js"></script> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>
</html>