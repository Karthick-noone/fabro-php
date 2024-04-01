<?php
session_start();
if (!isset($_SESSION['username'])) {
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
    <link href="css/fontsapi.css" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="css/aos.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/boxicons.min.css" rel="stylesheet">
    <link href="css/glightbox.min.css" rel="stylesheet">
    <link href="css/remixicon.css" rel="stylesheet">
    <link href="css/swiper-bundle.min.css" rel="stylesheet">
    <!-- Add this in the head section of your HTML file -->
    <link rel="stylesheet" href="js/sweetalert.js">


    <!--  Main CSS File -->
    <link rel="stylesheet" href="js/sweetalert.js">

    <link href="css/style4.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
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
            font-family:calibri;
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
            width: 50%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn-update {
            width: 100%;
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


        label {
            font-weight: bold;
        }

        textarea {
            width: 100%;
        }

        .btn-update {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .btn-update:hover {
            background-color: #0056b3;
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
        .card-title {
        color: #007bff; /* Set card title color */
        font-size: 24px; /* Set card title font size */
        margin-bottom: 20px; /* Add margin below the card title */
    }
    .card {
        border: none; /* Remove card border */
        background-color: #f8f9fa; /* Set card background color */
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.5); /* Add box shadow for depth */
/*         background: linear-gradient(to right, #FED9ED 0%, #FF8F8F 100%);
 */

    }
        .back-button:before,
        .back-button:after {
            content: "";
            position: absolute;
            border-radius: 50%;
            inset: 7px;
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

        #footer {
            color: white;
            padding: 5px 0;
            margin-top: auto;
        }
       
        .container.footer-bottom {
            text-align: center;
        }
        #successmsg, #errormsg {
        display: block;
        margin-top: 10px;
        font-size: 17px;
        font-weight: bold;
    }

    #successmsg {
        color: green; /* Set success message color */
    }

    #errormsg {
        color: red; /* Set error message color */
    }

        @media only screen and (max-width: 768px) {
            #navbar ul {
                flex-direction: column;
            }

            #navbar li {
                margin: 0;
                text-align: center;
            }

            .container-fluid1 {
                margin-top: 250px;
            }
        }

        @media only screen and (max-width: 768px) {
            #navbar ul {
                flex-direction: column;
            }

            #navbar li {
                margin: 0;
                text-align: center;
            }

            .container-fluid1 {
                margin-top: 250px;
            }
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
                        <div class="btn-group dropdown">
                            <button type="button" id="ty" class="btn text-light btn-secondary-outline dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
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
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10 col-sm-12 col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title text-center c fs-2">Change Password</h2>
                                <form class="forms-sample" onsubmit="return false;">


                                    <div class="form-group">
                                        <label for="exampleInputUsername1" class="fs-5 text-dark">Old Password</label>
                                        <input type="password" class="form-control custom-width-input" placeholder="Enter your old password" id="oldpassword">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1" class="fs-5 text-dark">New Password</label>
                                        <input type="password" class="form-control" placeholder="Enter your new password" id="newpassword">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputConfirmPassword1" class="fs-5 text-dark">Confirm New Password</label>
                                        <input type="password" class="form-control" placeholder="Confirm your new password" id="confirmpwd">
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-primary mr-2" onclick="xyz()">Change</button>
                                        <a class="btn btn-light" href="changepassword.php">Cancel</a>
                                    </div>

                                    <div class="text-center mt-3">
                                        <span style="color:green" id="successmsg"></span>
                                        <span style="color:red" id="errormsg"></span>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </section>
        <!-- End Hotel Management Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="container footer-bottom clearfix">
            <div class="d-flex justify-content-center">
                <div class="copyright">
                    &copy; <script>
                        document.write(new Date().getFullYear());
                    </script> Copyright <strong><span>Fabro Rooms</span></strong>. All Rights Reserved.
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

    <script>
        function men() {

            document.getElementById("nvbtn").style.display = "block";
            document.getElementById("nvbtn1").style.display = "block";
            document.getElementById("rmv").style.display = "block";
            document.getElementById("mnu").style.display = "none";
        }

        function rem() {
            document.getElementById("nvbtn").style.display = "none";
            document.getElementById("nvbtn1").style.display = "none";
            document.getElementById("rmv").style.display = "none";
            document.getElementById("mnu").style.display = "block";
        }
    </script>





    <script>
        function xyz() {
    var oldpassword = document.getElementById("oldpassword").value;
    var newpassword = document.getElementById("newpassword").value;
    var confirmpassword = document.getElementById("confirmpwd").value;

    $.ajax({
        url: "inspass.php",
        data: { oldpassword: oldpassword, newpassword: newpassword, confirmpwd: confirmpassword },
        type: 'POST',
        success: function(response) {
            var result = JSON.parse(response);

            if (result.success) {
                document.getElementById("successmsg").innerHTML = result.message;
                document.getElementById("errormsg").innerHTML = "";

                // Set a timer to hide the success message after 5 seconds (5000 milliseconds)
                setTimeout(function() {
                    document.getElementById("successmsg").innerHTML = "";
                    // Reload the page
                    location.reload();
                }, 4000);
                
            } else {
                document.getElementById("errormsg").innerHTML = result.message;
                document.getElementById("successmsg").innerHTML = "";

                // Set a timer to hide the error message after 5 seconds (4000 milliseconds)
                setTimeout(function() {
                    document.getElementById("errormsg").innerHTML = "";
                }, 4000);
            }
        }
    });
}
    </script>

    <!--  Main JS File -->
    <script src="js/main.js"></script>
<!-- Add this before your script tags -->
<script src="js/jquery-3.6.4.min.js"></script>

</body>

</html>