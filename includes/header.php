<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Fetch contact info
$sql = "SELECT EmailId, ContactNo FROM tblcontactusinfo";
$query = $dbh->prepare($sql);
$query->execute(); 
$results = $query->fetch(PDO::FETCH_OBJ);
$email = $results->EmailId ?? '';
$contactno = $results->ContactNo ?? '';
?>
<style>
  .logo a {
    font-size: 25px;
    font-weight: bold;
    text-decoration: none;
    color: #333;
  }

  .logo a span {
    color: rgb(99, 82, 185);
    font-style: cursive;
    letter-spacing: 1px;
  }

  .logo a:hover span {
    color: black;
    transition: color 0.3s ease;
  }

  .header_info {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    flex-wrap: wrap;
    gap: 30px;
  }

  .header_widgets {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .login_btn {
    margin-left: auto;
  }

  .circle_icon i {
    font-size: 18px;
  }

  .uppercase_text {
    margin: 0;
    font-size: 12px;
    font-weight: 600;
  }

  .user_login ul {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .user_login ul li {
    display: inline-block;
    margin-left: 15px;
    position: relative;
  }
</style>

<header>
  <div class="default-header" style="background-color: rgba(113, 99, 186, 0.1); padding: 10px 0;">
    <div class="container">
      <div class="header-row" style="display: flex; justify-content: flex-end; align-items: center; gap: 30px;">
        <!-- Logo -->
        <div class="logo" style="margin-right: auto;">
          <a href="index.php"><i class="fa fa-home"></i> Board<span>Finder</span></a>
        </div>

        <!-- Email -->
        <div class="header_widgets" style="display: flex; align-items: center; gap: 10px;">
          <div class="circle_icon"><i class="fa fa-envelope" aria-hidden="true" style="color: rgba(113, 99, 186, 1);"></i></div>
          <div>
            <p class="uppercase_text" style="margin:0; font-size: 12px; font-weight: 600; color:rgb(99, 82, 185);">For Support Mail us :</p>
            <a href="mailto:<?= htmlentities($email) ?>"><?= htmlentities($email) ?></a>
          </div>
        </div>

        <!-- Phone -->
        <div class="header_widgets" style="display: flex; align-items: center; gap: 10px;">
          <div class="circle_icon"><i class="fa fa-phone" aria-hidden="true" style="color: rgba(113, 99, 186, 1);"></i></div>
          <div>
            <p class="uppercase_text" style="margin:0; font-size: 12px; font-weight: 600;color:rgb(99, 82, 185);">Service Helpline Call Us:</p>
            <a href="tel:<?= htmlentities($contactno) ?>"><?= htmlentities($contactno) ?></a>
          </div>
        </div>

        <!-- User Login / Owner Login -->
        <div class="login_btn" style="display: flex; gap: 10px;">
          <?php if (!isset($_SESSION['login']) || strlen($_SESSION['login']) == 0) { ?>
            <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">User Login / Register</a>
            <?php } else { ?>
    <strong>Welcome to Board Finder</strong>
  <?php } ?>
</div>
      </div>
    </div>
  </div>




  




  <!-- Navigation Bar -->
  <nav id="navigation_bar" class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
          <span class="sr-only">Toggle navigation</span> 
          <span class="icon-bar"></span> 
          <span class="icon-bar"></span> 
          <span class="icon-bar"></span>
        </button>
      </div>

      <div class="header_wrap d-flex justify-content-between align-items-center">
        <!-- User Info Dropdown -->
        <div class="user_login">
          <ul>
            <li class="dropdown">
              <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user-circle" aria-hidden="true"></i>
                <?php 
                if (isset($_SESSION['login']) && strlen($_SESSION['login']) > 0) {
                  $email = $_SESSION['login'];
                  $sql = "SELECT FullName FROM tblusers WHERE EmailId=:email";
                  $query = $dbh->prepare($sql);
                  $query->bindParam(':email', $email, PDO::PARAM_STR);
                  $query->execute();
                  $result = $query->fetch(PDO::FETCH_OBJ);
                  echo htmlentities($result->FullName ?? 'User');
                }
                ?>
                <i class="fa fa-angle-down" aria-hidden="true"></i>
              </a>
              <?php if (isset($_SESSION['login'])) { ?>
                <ul class="dropdown-menu">
                  <li><a href="profile.php">Profile Settings</a></li>
                  <li><a href="update-password.php">Update Password</a></li>
                  <li><a href="my-booking.php">My Booking</a></li>
                  <li><a href="post-review.php">Post a Review</a></li>
                  <li><a href="my-review.php">My Review</a></li>
                  <li><a href="logout.php">Sign Out</a></li>
                </ul>
              <?php } ?>
            </li>
          </ul>
        </div>

        <!-- Search Bar -->
        <div class="header_search">
          <div id="search_toggle"><i class="fa fa-search" aria-hidden="true"></i></div>
          <form action="search.php" method="post" id="header-search-form">
            <input type="text" placeholder="Search..." name="searchdata" class="form-control" required>
            <button type="submit"><i class="fa fa-search" style="color: rgba(113, 99, 186, 1);"></i></button>
          </form>
        </div>
      </div>

      <!-- Navigation Menu -->
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="nav navbar-nav">
          <li><a href="index.php">Home</a></li>
          <li><a href="page.php?type=aboutus">About Us</a></li>
          <li><a href="Boarding-list.php">Boarding List</a></li>
          <li><a href="page.php?type=faqs">FAQs</a></li>
          <li><a href="contact-us.php">Contact Us</a></li>
        </ul>
      </div>
    </div>
  </nav>
</header>