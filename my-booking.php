<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
?><!DOCTYPE HTML>
<html lang="en">
<head>

<title>Board Finder - My Booking</title>
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
        
<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<!-- Google-Font-->
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->  

<style>
  .invoice-box {
    max-width: 800px;
    margin: auto;
    padding: 30px;
    border: 1px solid #eee;
    box-shadow: 0 0 15px rgba(113, 99, 186, 0.2);
    font-family: 'Segoe UI', sans-serif;
    color: #333;
    background: #fdfdfd;
    border-radius: 10px;
  }

  .invoice-box h2 {
    color: rgba(113, 99, 186, 1);
    text-align: center;
    margin-bottom: 20px;
  }

  .invoice-box table {
    width: 100%;
    border-collapse: collapse;
  }

  .invoice-box table th,
  .invoice-box table td {
    padding: 12px;
    border-bottom: 1px solid #ddd;
    text-align: left;
  }

  .invoice-box table th {
    background: rgba(113, 99, 186, 0.1);
    color: rgba(113, 99, 186, 1);
  }

  .total-row {
    background-color: rgba(113, 99, 186, 0.15);
    font-weight: bold;
    text-align: center;
  }

  .print-btn {
    display: block;
    width: 200px;
    margin: 20px auto;
    padding: 10px;
    background: rgba(113, 99, 186, 1);
    color: white;
    border: none;
    border-radius: 25px;
    font-size: 16px;
    cursor: pointer;
    transition: background 0.3s ease;
  }

  .print-btn:hover {
    background: rgba(93, 79, 160, 1);
  }
</style>


</head>
<body>

<!-- Start Switcher -->
<!-- <?php include('includes/colorswitcher.php');?> -->
<!-- /Switcher -->  
        
<!--Header-->
<?php include('includes/header.php');?>
<!--Page Header-->
<!-- /Header --> 

<!--Page Header-->
<section class="page-header profile_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>My Booking</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li>My Booking</li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header--> 

<?php 
$useremail=$_SESSION['login'];
$sql = "SELECT * from tblusers where EmailId=:useremail";
$query = $dbh -> prepare($sql);
$query -> bindParam(':useremail',$useremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>
        <div class="sidebar_widget"  style="background-color: rgba(113, 99, 186, 0.1);">
        <div class="sidebar_widget">
<section class="user_profile inner_pages" >
  <div class="container">
    <div class="user_profile_info gray-bg padding_4x4_40" style="background-color: rgba(113, 99, 186, 0.1);">
      <div class="upload_user_logo"> <i class="fa-solid fa-home" style="font-size: 50px; color:rgba(113, 99, 186, 1);"></i>
      </div>

      <div class="dealer_info" >
        <h5><?php echo htmlentities($result->FullName);?></h5>
        <p><?php echo htmlentities($result->Address);?><br>
          <?php echo htmlentities($result->City);?>&nbsp;<?php echo htmlentities($result->Country); }}?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 col-sm-3">
       <?php include('includes/sidebar.php');?>
   
      <div class="col-md-8 col-sm-8">
        <div class="profile_wrap">
          <h5 class="uppercase underline">My Booikngs </h5>
          <div class="my_vehicles_list">
            <ul class="vehicle_listing">
<?php 
$useremail=$_SESSION['login'];
 $sql = "SELECT tblboarding.Vimage1 as Vimage1,tblboarding.VehiclesTitle,tblboarding.id as vid,tbluni.UniversityName,tblbooking.FromDate,tblbooking.ToDate,tblbooking.message,tblbooking.Status,tblboarding.PricePerDay,DATEDIFF(tblbooking.ToDate,tblbooking.FromDate) as totaldays,tblbooking.BookingNumber  from tblbooking join tblboarding on tblbooking.BoardingId=tblboarding.id join tbluni on tbluni.id=tblboarding.VehiclesBrand where tblbooking.userEmail=:useremail";
$query = $dbh -> prepare($sql);
$query-> bindParam(':useremail', $useremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>

<li>
    <h4 style="color:red">Booking<?php echo htmlentities($result->BookingNumber);?></h4>
                <div class="vehicle_img"> <a href="boarding-details.php?vhid=<?php echo htmlentities($result->vid);?>"><img src="admin/img/boardingimages/<?php echo htmlentities($result->Vimage1);?>" alt="image"></a> </div>
                <div class="vehicle_title">

                  <h6><a href="boarding-details.php?vhid=<?php echo htmlentities($result->vid);?>"> <?php echo htmlentities($result->UniversityName);?> , <?php echo htmlentities($result->VehiclesTitle);?></a></h6>
                  <p><b>From </b> <?php echo htmlentities($result->FromDate);?> <b>To </b> <?php echo htmlentities($result->ToDate);?></p>
                  <div style="float: left"><p><b>Message:</b> <?php echo htmlentities($result->message);?> </p></div>
                </div>
                <?php if($result->Status==1)
                { ?>
                <div class="vehicle_status"> <a href="#" class="btn outline btn-xs active-btn">Confirmed</a>
                           <div class="clearfix"></div>
        </div>

              <?php } else if($result->Status==2) { ?>
 <div class="vehicle_status"> <a href="#" class="btn outline btn-xs">Cancelled</a>
            <div class="clearfix"></div>
        </div>
             


                <?php } else { ?>
 <div class="vehicle_status"> <a href="#" class="btn outline btn-xs">Not Confirm yet</a>
            <div class="clearfix"></div>
        </div>
                <?php } ?>
       
              </li>

<div class="invoice-box" id="invoice-section">
  <h2>🏠 Board Finder Invoice</h2>
  <table>
    <tr>
      <th>Boarding Name</th>
      <th>From Date</th>
      <th>To Date</th>
      <th>Total Days</th>
      <th>Rent / Day</th>
    </tr>
    <tr>
      <td><?php echo htmlentities($result->VehiclesTitle); ?>, <?php echo htmlentities($result->UniversityName); ?></td>
      <td><?php echo htmlentities($result->FromDate); ?></td>
      <td><?php echo htmlentities($result->ToDate); ?></td>
      <td><?php echo htmlentities($tds = $result->totaldays); ?></td>
      <td>Rs. <?php echo htmlentities($ppd = $result->PricePerDay); ?></td>
    </tr>
    <tr class="total-row">
      <td colspan="4">Grand Total</td>
      <td>Rs. <?php echo htmlentities($tds * $ppd); ?></td>
    </tr>
  </table>
</div>

<!-- Print Button -->
<button class="print-btn" onclick="printInvoice()">🖨️ Print Invoice</button>

<script>
  function printInvoice() {
    const content = document.getElementById("invoice-section").innerHTML;
    const printWindow = window.open('', '', 'height=600,width=800');
    printWindow.document.write('<html><head><title>Print Invoice</title>');
    printWindow.document.write('<style>body{font-family:sans-serif;padding:20px;} table{width:100%;border-collapse:collapse;} th,td{border:1px solid #ccc;padding:10px;text-align:left;} th{background:#e6f0ff;} .total-row{background:#d9edf7;font-weight:bold;}</style>');
    printWindow.document.write('</head><body>');
    printWindow.document.write(content);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
  }
</script>

<hr />
              <?php }}  else { ?>
                <h5 align="center" style="color:red">No booking yet</h5>
              <?php } ?>
             
         
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/my-vehicles--> 
<?php include('includes/footer.php');?>

<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>
</body>
</html>
<?php } ?>