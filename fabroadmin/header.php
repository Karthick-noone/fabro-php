<!--Navbar/Offcanvas-Section-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color:#9EDDFF;">
  <div class="container-fluid">
    <a class="btn btn-secondary" data-bs-toggle="offcanvas" 
    href="#offcanvasExample" role="button" aria-controls="offcanvasExample" style="margin-right: 20px;"><span><img src="finimg/iconmnugg.png" alt="iconmnugg" height="24px" width="21px"></span>
    </a> 
    <div class="offcanvas offcanvas-start" style="width: 300px;" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
      <div class="offcanvas-header">
        <h3 class="offcanvas-title mt-0" id="offcanvasExampleLabel"> <a href="indexdb.php"><img src="finimg/logo..png" alt="logo" width="160px" height="48px"></a><i></i></h3>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
      <div class="dropdown mt-2 d-grid gap-2">
       </div>

       <div class="offcanvas-body">
    <div class="btn-group dropend mt-2 d-grid gap-2" style="position: absolute; right: 10px; width: 280px;">
        <button type="button" class="btn btn-secondary drop dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="display: flex; justify-content: space-between; align-items: center; position: relative;">
            <i class="fa fa-home" style="margin-right: 20px"></i><span>Dashboard</span>  
        </button>
        
    </div>
</div>
<!--Offcanvas body-->

<div class="offcanvas-body">
       <div class="btn-group dropend mt-2 d-grid gap-2" style="position: absolute; right: 10px; width: 280px;">
  <button type="button" class="btn btn-secondary drop dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"style="display: flex; justify-content: space-between; align-items: center;position: relative;"><i class="fa fa-layer-group" style="margin-right: 1px;"></i>
  <span>Rooms</span>
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="../index.php">Check Availability</a></li>
    <li><a class="dropdown-item" href="#">Item 2</a></li>
    <li><a class="dropdown-item" href="#">Item 3</a></li>
  </ul>
</div>
</div>

<div class="offcanvas-body">
       <div class="btn-group dropend mt-2 d-grid gap-2" style="position: absolute; right: 10px; width: 280px;">
  <button type="button" class="btn btn-secondary drop dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"style="display: flex; justify-content: space-between; align-items: center;position: relative;"><i class="fa fa-inbox" style="margin-right: 1px;"></i>
  <span>Reports</span>
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">Complaints</a></li>
    <li><a class="dropdown-item" href="#">Inform Leave</a></li>
    <li><a class="dropdown-item" href="#">Mail</a></li>
  </ul>
</div>
</div>

<div class="offcanvas-body">
       <div class="btn-group dropend mt-2 d-grid gap-2" style="position: absolute; right: 10px; width: 280px;">
  <button type="button" class="btn btn-secondary drop dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"style="display: flex; justify-content: space-between; align-items: center;position: relative;"><i class="fa fa-briefcase" style="margin-right: 1px;"></i>
  <span>Image uploads</span>
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="sliderImage.php">Slider Image</a></li>
    <li><a class="dropdown-item" href="galleryImage.php">Gallery Image</a></li>
    <li><a class="dropdown-item" href="#">Premium Room</a></li>
    <li><a class="dropdown-item" href="#">Deluxe Room</a></li>
    <li><a class="dropdown-item" href="#">Double Room</a></li>
    <li><a class="dropdown-item" href="#">Luxury Room</a></li>
    <li><a class="dropdown-item" href="#">Single Room</a></li>
    <li><a class="dropdown-item" href="#">Small Room</a></li>
  </ul>
</div>
</div>

<div class="offcanvas-body">
       <div class="btn-group dropend mt-2 d-grid gap-2" style="position: absolute; right: 10px; width: 280px;">
  <button type="button" class="btn btn-secondary drop dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"style="display: flex; justify-content: space-between; align-items: center;position: relative;"><i class="fa fa-money-check" style="margin-right: 10px;"></i>
  <span>Payments</span>
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">UPI</a></li>
    <li><a class="dropdown-item" href="#">Pending</a></li>
    <li><a class="dropdown-item" href="#">Received</a></li>
  </ul>
</div>
</div>
    </div>
    </div>
 
    <!--navbar-->
    <a href="indexdb.php"><img src="finimg/logo..png" alt="logo" width="160px" height="48px"></a>
    <a class="navbar-brand" href="#"><i><h5> </h5></i></a><br>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          
        
            <!-- <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-bullhorn"></i> Enquries</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-toolbox"></i> Settings</a>
            </li> -->
            <div class="btn-group dropdown">
  <button type="button" class="btn btn-secondary-outline dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
  <i class="fa fa-lock-open"></i> Admin- <?php echo $_SESSION['username']; ?>
  </button>
  <ul class="dropdown-menu acc dropdown-menu-start">
    <li><a class="dropdown-item" href="changepass.php"><i class="fa fa-key"></i> ChangePassword</a></li>
    <li><a class="dropdown-item" href="Logout.php"><i class="fa fa-lock"></i> Logout</a></li>
</ul>

</div>

</nav>