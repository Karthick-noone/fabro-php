<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Hotel Home page</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

 

  <!-- Google Fonts -->
  <link href="css/fo.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="css/aos.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-icons.css" rel="stylesheet">
  <link href="css/boxicons.min.css" rel="stylesheet">
  <link href="css/glightbox.min.css" rel="stylesheet">
  <link href="css/remixicon.css" rel="stylesheet">
  <link href="css/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="css/style4.css" rel="stylesheet">
 <style>
  @keyframes shake {
    0%, 100% {
      transform: translateY(0);
    }
    10%, 30%, 50%, 70%, 90% {
      transform: translateY(-7px);
    }
    20%, 40%, 60%, 80% {
      transform: translateY(7px);
    }
  }
  
  .shake {
    animation: shake 12.0s infinite;
  }
  #rtr{
    border-radius: 50px;
  }
  #rpg{
    border-radius: 75px;
  }
  #hero {
   background-color: #102C57;
   
}
#skills {
font-family: "Poppins", sans-serif;
}
.icon-box{
  border-radius: 15px;
}
.portfolio-img,.portfolio-info{
  border-radius: 25px;
}
/*Search-Section*/
.container1 {
    max-width: 1400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #E0F4FF;

}

form {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
}

label {
    margin-right: 8px;
}

input {
    padding: 8px;
    margin-bottom: 16px;
}

button {
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}
/* Media Query for smaller screens */
@media (max-width: 768px) {
    form {
        flex-direction: column;
        align-items: stretch;
    }

    label {
        margin-right: 0;
        margin-bottom: 8px;
    }

    input {
        margin-bottom: 8px;
    }
}
#yt{
  color: #fff;
  margin-left: 20px;
}

@media only screen and (max-width: 768px) {
      #navbar ul {
        flex-direction: column;
      }

      #navbar li {
        margin: 0;
        text-align: center;
        
      }
    #header{
      background-color: #102C57;
    }
    #hero{
  margin-top:265px
}
    }

</style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index2.php">Fabro Rooms</a></h1>
   

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#portfolio">Gallery</a></li>
<!--           <li><a class="nav-link scrollto" href="booking2.php">Reservation</a></li>
 -->          <li class="dropdown"><a href=""><span>Image upload</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                  <li><a href="image.php">Slider Image</a></li>
                  <li><a href="gallery.php">Gallery</a></li>
                </ul>
          </li>
          <li>
            <a class="nav-link scrollto" href="dashboard.php">Dashboard</a></li>
            <a class="nav-link scrollto" href="changepassword.php">Change Password</a></li>
           <div class="btn-group dropdown">
  <button type="button" id="yt" class="btn btn-secondary-outline dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
  <i class="fa fa-lock-open"></i> Admin- <?php echo $_SESSION['username']; ?>
  </button>
  <ul class="dropdown-menu acc dropdown-menu-start">
    <li><a class="dropdown-item" href="logout.php"></i>Logout</a></li>
        </ul> 
      </nav><!-- .navbar -->
</div>
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Welcome to Fabro Rooms, Where Luxury Meets Hospitality</h1>
          <h2>Welcome to a hotel for exclusively to the exquisite Comfort and Style.</h2>
          
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="finimg/modrom.jpg" class="img-fluid animated" alt="" id="rtr">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
    
        

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About Us</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p>
              Welcome to Fabro rooms exclusively to the exquisite art of doing great Hospitality. A luxurious business hotel with  world-class convenience and comforts 
            </p>
            <ul>
              <li><img src="finimg/favicon2.png" alt="favicon2" class="icon-img"><span> Well Furnished rooms with world class Facilities</span></li>

              <li><img src="finimg/favicon2.png" alt="favicon2" class="icon-img"><span> Highly Committed to Hospitality & Customer Service</span></li>

              <li><img src="finimg/favicon2.png" alt="favicon2" class="icon-img"><span> Ample Spacious Parking facility & High Quality Food Service</span></li>
            </ul>
          </div>
          
        </div>

      </div>
    </section><!-- End About Us Section -->

   
    <!-- ======= Skills Section ======= -->
    <section id="skills" class="skills" style="background-color: #E0F4FF;">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 d-flex align-items-center shake" data-aos="fade-right" data-aos-delay="100">
            <img src="finimg/modrgl.jpg" class="img-fluid" alt="" id="rpg">
          </div>
          
          <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
            <h3>Fabro commited to Excellence and Hospitality</h3>
            <p class="fst-italic">
              Welcome to Fabro Rooms, where luxury and comfort converge to create an unforgettable experience. Nestled in the heart of City, our hotel is a sanctuary of sophistication, offering a perfect blend of modern elegance and timeless charm.From the moment you step through our doors, you'll be enveloped in a world of impeccable service and attention to detail. Each room is meticulously designed to provide a haven of tranquility, with plush furnishings, stunning views, and all the amenities you need for a relaxing stay. Our dedicated staff is committed to ensuring your every need is met, whether it's arranging personalized experiences, recommending the finest local attractions, or simply ensuring a seamless stay.
            </p>

            </div>

          </div>
        </div>

      </div>
    </section><!-- End Skills Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <p>
            Welcome to our exquisite hotel, where unparalleled luxury meets unparalleled service. Immerse yourself in a world of sophistication and comfort as our dedicated staff ensures every moment of your stay is nothing short of extraordinary. Our meticulously designed rooms and suites offer a blend of contemporary elegance and timeless charm, providing a haven of relaxation.</p>
        </div>

        <div class="row">
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box" style="background-color: #E0F4FF;">
              <img src="finimg/entimg.png" alt="entimg">
              <h4>Entertainment</h4>
              <p>
                "Entertainment is the spark that ignites imagination, a symphony of laughter and emotion that transcends the ordinary, turning moments into memories."</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box" style="background-color: #E0F4FF;">
              <img src="finimg/hospimg.png" alt="hospimg"> 
              <h4>Hospitality</h4>
              <p>"Hospitality is a blend of customer service fabro commited to excellent hospitality and symphony of wellness service". </p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box" style="background-color: #E0F4FF;">
              <img src="finimg/luxrmg.png" alt="luxrmg">  
              <h4>Luxury & comfort</h4>
              <p>Luxuriness is a blend of perfection in hotel industry fabro commited to both wellness & comfort</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="400">
            <div class="icon-box" style="background-color: #E0F4FF;">
              <img src="finimg/fodimg.png" alt="fodimg"> 
              <h4>Food & Beverages</h4>
              <p>Fabro offers a wide range of dishes and beverages to the customers all available in restuarent & room service.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="row">
          <div class="col-lg text-center">
            <h3>Explore the uniqueness of wellness & comfort</h3>
            <p> Elegance and timeless charm, providing a haven of relaxation. Indulge in a culinary journey at our renowned restaurant, where expert chefs craft delectable dishes that tantalize the taste buds. Unwind in style at our spa, where rejuvenating treatments and state-of-the-art facilities await. Whether you're here for business or leisure, our fully-equipped meeting rooms and event spaces cater to your every need. From seamless check-in to personalized concierge services, our commitment to excellence ensures an unforgettable experience. Discover a world of opulence at our hotel, where every detail is crafted to exceed your expectations and leave you with cherished memories. </p>
          </div>
        </div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Overview</h2>
          <p>
            Embark on a journey through our diverse hotel portfolio, where each property is a distinctive expression of refined luxury and unparalleled hospitality. From urban retreats with modern flair to seaside havens that capture the essence of tranquility, our collection spans a spectrum of unique experiences. Whether you seek the vibrant energy of a bustling city center or the serenity of a secluded resort, our portfolio is a testament to our commitment to providing unforgettable stays. </p>
        </div>

        <ul id="portfolio-flters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
          <li data-filter="*" class="filter-active">Gallery</li>
        </ul>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-img"><img src="finimg/portfolio/galrm.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Deluxe Room</h4>
              <p>Starts From ₹1999</p>
              <a href="finimg/portfolio/galrm.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><img src="finimg/plus.png" width="40px" height="40px" alt=""></a>
              <a href="#" class="details-link" title="More Details"></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-img"><img src="finimg/portfolio/suprm.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Superior Suite</h4>
              <p>Starts From ₹11999</p>
              <a href="finimg/portfolio/suprm.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><img src="finimg/plus.png" width="40px" height="40px" alt=""></a>
              <a href="#" class="details-link" title="More Details"></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-img"><img src="finimg/portfolio/suprdlx.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Super Deluxe Room</h4>
              <p>Starts From ₹3999</p>
              <a href="finimg/portfolio/suprdlx.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><img src="finimg/plus.png" width="40px" height="40px" alt=""></a>
              <a href="#" class="details-link" title="More Details"></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-img"><img src="finimg/portfolio/prmgm.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Premium Room</h4>
              <p>Starting From ₹6999</p>
              <a href="finimg/portfolio/prmgm.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><img src="finimg/plus.png" width="40px" height="40px" alt=""></a>
              <a href="#" class="details-link" title="More Details"></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-img"><img src="finimg/portfolio/ambasut.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Ambassador Suite</h4>
              <p>Starts From ₹21999</p>
              <a href="finimg/portfolio/ambasut.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><img src="finimg/plus.png" width="40px" height="40px" alt=""></a>
              <a href="#" class="details-link" title="More Details"></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-img"><img src="finimg/portfolio/supdxmg.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Superior Deluxe Room</h4>
              <p>Starting From ₹4999</p>
              <a href="finimg/portfolio/supdxmg.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><img src="finimg/plus.png" width="40px" height="40px" alt=""></a>
              <a href="#" class="details-link" title="More Details"></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-img"><img src="finimg/portfolio/stdrom.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Standard Room</h4>
              <p>Starts From ₹999</p>
              <a href="finimg/portfolio/stdrom.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><img src="finimg/plus.png" width="40px" height="40px" alt=""></a>
              <a href="#" class="details-link" title="More Details"></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-img"><img src="finimg/portfolio/smdxom.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Semi Deluxe Room</h4>
              <p>Starts From ₹1399</p>
              <a href="finimg/portfolio/smdxom.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><img src="finimg/plus.png" width="40px" height="40px" alt=""></a>
              <a href="#" class="details-link" title="More Details"></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-img"><img src="finimg/portfolio/delxte.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Deluxe Suite</h4>
              <p>Starts From ₹7999</p>
              <a href="finimg/portfolio/delxte.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><img src="finimg/plus.png" width="40px" height="40px" alt=""></a>
              <a href="#" class="details-link" title="More Details"></a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Section -->


    
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container footer-bottom clearfix"> 
      <div class="d-flex justify-content-center">
        <div class="copyright">
        &copy; <script>document.write(new Date().getFullYear());</script> Copyright <strong><span>Fabro Rooms</span></strong>. All Rights Reserved.

        </div>
      </div>
      
    </div>
    

    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="js/aos.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/glightbox.min.js"></script>
  <script src="js/isotope.pkgd.min.js"></script>
  <script src="js/swiper-bundle.min.js"></script>
  <script src="js/noframework.waypoints.js"></script>
  <script src="js/validate.js"></script>

  <!-- Main JS File -->
  <script src="js/main.js"></script>

</body>

</html>