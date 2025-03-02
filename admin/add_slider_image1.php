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

  <title>Hotel Reservation</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="finimg/favicon.png" rel="icon">
  <link href="finimg/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="css/fonts.css" rel="stylesheet">

   <!-- Vendor CSS Files -->
   <link href="css/aos.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/boxicons.min.css" rel="stylesheet">
    <link href="css/glightbox.min.css" rel="stylesheet">
    <link href="css/remixicon.css" rel="stylesheet">
    <link href="css/swiper-bundle.min.css" rel="stylesheet">
    <!-- Add this in the head section of your HTML file -->
    <link rel="stylesheet" href="js/sweetalert.js">


    <!--  Main CSS File -->
    <link href="css/style4.css" rel="stylesheet">
<style>
  body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}
body{
  background-image: url('finimg/admgm.jpg');
  background-size: cover; 
  background-position: center; 
  background-repeat: no-repeat;
}

.container-fluid1 {
  max-width: 500px;
  margin: 0 auto;
  background-color: #AEDEFC;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  margin-top: 50px;
}

form {
  display: flex;
  flex-direction: column;
}

h2 {
  color: #333;
}

label {
  margin-top: 10px;
  font-weight: bold;
}

input,
select,
textarea {
  width: 21%;
  padding: 8px;
  margin-top: 5px;
  margin-bottom: 10px;
  box-sizing: border-box;
  border: 1px solid #ccc;
  border-radius: 4px;
}

button.submit-button {
  background-color: #164863;
  color: #fff;
  padding: 10px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
}

button.submit-button:hover {
  background-color: #427D9D;
}

#ty{
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
      .container-fluid1{
        margin-top: 250px;
      }
    }

    .buttonsnd {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .buttonsnd:hover {
            background-color: #45a049;
        }
        .imgtxtlft{
          text-align: left;
          margin: 0px 0px 0px 10px;
        }
        #altImageContainer {
            position: relative;
            text-align: center;
        }

        #altImage {
            max-width: 100%;
            height: auto;
            margin-bottom: 16px;
        }

        #imageOverlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: left;
            justify-content: center;
            color: #fff;
        }
        
        .back-button {
  display: block;
  position: relative;
  width: 56px;
  height: 56px;
  margin: 0;
  overflow: hidden;
  outline: none;
  background-color: transparent;
  border: 0;
  cursor: pointer;
}

.back-button:before,
.back-button:after {
  content: "";
  position: absolute;
  border-radius: 50%;
  inset: 7px;
}

#footer {
            color: white;
            padding: 5px 0;
            margin-top: auto;
        }
       
        .container.footer-bottom {
            text-align: center;
        }
.back-button:before {
  border: 4px solid #fff;
  transition: opacity .4s cubic-bezier(.77, 0, .175, 1) 80ms, transform .5s cubic-bezier(.455, .03, .515, .955) 80ms;
}

.back-button:after {
  border: 4px solid #757575;
  transform: scale(1.3);
  transition: opacity .4s cubic-bezier(.165, .84, .44, 1), transform .5s cubic-bezier(.25, .46, .45, .94);
  opacity: 0;
}

.back-button:hover:before,
.back-button:focus:before {
  opacity: 0;
  transform: scale(0.7);
  transition: opacity .4s cubic-bezier(.165, .84, .44, 1), transform .5s cubic-bezier(.25, .46, .45, .94);
}

.back-button:hover:after,
.back-button:focus:after {
  opacity: 1;
  transform: scale(1);
  transition: opacity .4s cubic-bezier(.77, 0, .175, 1) 80ms, transform .5s cubic-bezier(.455, .03, .515, .955) 80ms;
}

.back-button-box {
  display: flex;
  position: absolute;
  top: 0;
  left: 0;
}

.back-button-elem {
  display: block;
  width: 20px;
  height: 20px;
  margin: 17px 18px 0 18px;
  transform: rotate(180deg);
  fill: #007bff;
}

.back-button:hover .back-button-box,
.back-button:focus .back-button-box {
  transition: .4s;
  transform: translateX(-56px);
}
@media only screen and (max-width: 768px) {
      .container-fluid1 {
        max-width: 100%;
      }

      input,
      select,
      textarea {
        width: 100%;
      }

      .container.footer-bottom {
        text-align: center;
      }

      .copyright {
        margin-top: 10px;
      }

      /* Add any additional responsive styles here */
    }
</style>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index2.php">Fabro Rooms</a></h1>
     

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="index2.php">Home</a></li>
<!--           <li><a class="nav-link scrollto" href="#">Reservation</a></li>
 -->         
          <li class="dropdown"><a href="#"><span>Image upload</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                  <li><a href="image.php">Slider Image</a></li>
                  <li><a href="gallery.php">Gallery</a></li>
                </ul>
          </li>
          <li><a class="nav-link scrollto" href="dashboard.php">Dashboard</a></li>
          <a class="nav-link scrollto" href="changepassword.php">Change Password</a></li>

          <div class="btn-group dropdown">
  <button type="button" id="ty" class="btn btn-secondary-outline dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
  <i class="fa fa-lock-open"></i> Admin- <?php echo $_SESSION['username']; ?>
  </button>
  <ul class="dropdown-menu acc dropdown-menu-start">
    <li><a class="dropdown-item" href="logout.php"></i>Logout</a></li> 
        </ul>
        <!-- <i class="bi bi-list mobile-nav-toggle"></i> -->
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">
      <!--Hotel Mamagement Section-->
<section>
  <?php
if (!isset($_SESSION['username']))
{
  ?>
<script>
  window.location.href="../login.php";
</script>
<?php
}
?>
<div class="container">
<a href="gallery.php"><button class="back-button mt-3">
  <div class="back-button-box">
    <span class="back-button-elem">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46 40">
        <path d="M46 20.038c0-.7-.3-1.5-.8-2.1l-16-17c-1.1-1-3.2-1.4-4.4-.3-1.2 1.1-1.2 3.3 0 4.4l11.3 11.9H3c-1.7 0-3 1.3-3 3s1.3 3 3 3h33.1l-11.3 11.9c-1 1-1.2 3.3 0 4.4 1.2 1.1 3.3.8 4.4-.3l16-17c.5-.5.8-1.1.8-1.9z"></path>
      </svg>
    </span>
    <span class="back-button-elem">
      <svg viewBox="0 0 46 40">
        <path d="M46 20.038c0-.7-.3-1.5-.8-2.1l-16-17c-1.1-1-3.2-1.4-4.4-.3-1.2 1.1-1.2 3.3 0 4.4l11.3 11.9H3c-1.7 0-3 1.3-3 3s1.3 3 3 3h33.1l-11.3 11.9c-1 1-1.2 3.3 0 4.4 1.2 1.1 3.3.8 4.4-.3l16-17c.5-.5.8-1.1.8-1.9z"></path>
      </svg>
    </span>
  </div>
</button>  </a>
    <form class="upload-form" action="updateImages1.php" method="post" enctype="multipart/form-data">
        <center><h2>Add image</h2></center>
        <div id="altImageContainer">
            <img  width="40%" height="40%"  id="altImage" src="../img/preview-picture.png" alt="Alt Image">
            <div id="imageOverlay">
                <h2 class="imgtxtlft" id="textInputOverlay"></h2>
                <p class="imgtxtlft" id="textareaInputOverlay"></p>
            </div>
        </div>
        <center><label for="upload-input">Choose a file:</label>
        <input type="file" id="upload-input" name="wallpaper" onchange="displayImage(this)"></center>

        <center><button class="buttonsnd" type="submit">Submit</button></center>
    </form>
</div>

<script>
    function displayImage(input) {
        var altImage = document.getElementById('altImage');
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                altImage.src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function updateOverlay(overlayId, value) {
        var overlay = document.getElementById(overlayId);
        overlay.textContent = value;
    }

    function uploadImage() {
        const fileInput = document.getElementById('upload-input');
        const formData = new FormData();
        formData.append('wallpaper', fileInput.files[0]);
        formData.append('title', document.getElementById('textInput').value);
        formData.append('description', document.getElementById('textareaInput').value);

        fetch('updateImages1.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (response.ok) {
                // Reload the page after uploading the image
                window.location.href = 'editslider.php';
            } else {
                throw new Error('Failed to upload image');
            }
        })
        .catch(error => {
            console.error('Error uploading image:', error);
        });
    }
</script>
 
</section>
    <!-- End Hotel Management Section -->
    
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

  <!--  Main JS File -->
  <script src="js/main.js"></script>

</body>

</html>