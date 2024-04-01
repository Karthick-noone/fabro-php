<?php
session_start();

// Check if the session variable is set
if (isset($_SESSION['check_value'])) {
    // Unset and destroy the session
    session_unset();
    session_destroy();
}

// Check if the form has been submitted
if (isset($_POST['check_submit'])) {
    $_SESSION['check_value'] = 'Session!';
    header('Location: room.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fabro Rooms Template">
    <meta name="keywords" content="Fabro Rooms, unica, creative, php">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fabro room booking</title>

    <!-- Google Font -->
    <link href="css/font.css" rel="stylesheet">

    <link href="css/fontswap.css" rel="stylesheet">

    <link href="css/glightbox.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/pikaday.min.css">

    <link href="css/swiper-bundle.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="css/style3.css" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style1.css" type="text/css">
</head>
<style>
      .guests-container {
        display: none;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-top: 10px;
    }

    .number-controls {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .number-controls label {
        margin-right: 10px;
    }

    .number-controls button {
        margin: 0 5px;
        padding: 5px 10px;
        border: none;
        background-color: #4CAF50;
        color: white;
        border-radius: 5px;
        cursor: pointer;
    }

    .booking-form form button {
        display: block;
        font-size: 14px;
        text-transform: uppercase;
        border: 1px solid #dfa974;
        border-radius: 50px;
        color: #dfa974;
        font-weight: 500;
        background: transparent;
        width: 100%;
        height: 39px;
        margin-top: 8px;
    }

    .done-button:hover {
        background-color: #45a049;
        color: white;
    }

    .bli {
        width: 100px;
        height: 100px;
        box-shadow: 0 0 20px 2px rgba(0, 0, 0, .1);
        transition: 0.3s;
        margin-left: 20px;
    }

    .bli:hover {
        transform: scale(1.3);
        z-index: 1;
    }

    .fii {
        height: 100%;
    }

    @media screen and (max-width:750px) {
        .bli {
            width: 30px;
            height: 30px;
            box-shadow: 0 0 20px 2px rgba(0, 0, 0, .1);
            transition: 0.5s;
            margin-left: 20px;
        }

        .fii {
            height: 100%;
        }


        .modal-body {
            margin-left: 59px;
            width: 539px;
        }

        .modal-body img {
            height: 200px;
            width: 200%;
        }
    }


    .swiper-slide {
        width: 100%;
        /* Set the width of each slide to 100% */
        height: 0;
        /* Set the initial height to 0 to maintain the aspect ratio */
        padding-bottom: 15%;
        position: relative;
        /* Set the padding-bottom to create a 4:3 aspect ratio (adjust as needed) */
    }

    .swiper-slide img {
        position: absolute;
        /* Set position to absolute for proper placement */
        width: 100%;
        /* Set the width of the image to 100% */
        height: 100%;
        /* Set the height of the image to 100% */
        object-fit: cover;
        /* Maintain aspect ratio and cover the entire container */
    }


    .fixed-size-image {
        width: 800px;
        height: 600px;
    }
    
</style>

<body>

    <!-- Page Preloder -->
   <!--  <div id="preloder">
        <div class="loader"></div>
    </div> -->

    


    <?php
  include('header.php');
  ?> 

    

    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hero-text">
                        <h1>Fabro A Luxury Hotel</h1>
                        <p>Here are the best hotel room booking , including recommendations for international
                            travel and for finding low-priced hotel rooms.</p>

                    </div>
                </div>

                <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
                    <div class="booking-form">
                        <h3>Check Availability</h3>
                        <!-- <div style="display:none" id="totalRooms"></div> -->

                        <form id="bookingForm" action="" method="post" onsubmit="return validateForm()">
                            <div class="check-date">
                                <label for="date-in">Check In</label>
                                <input type="text" class="date" id="date-in" name="date-in">
                                <i class="icon_calendar"></i>
                            </div>
                            <div class="check-date">
                                <label for="date-out">Check Out</label>
                                <input type="text" class="date" id="date-out" name="date-out">
                                <i class="icon_calendar"></i>
                            </div>
                            <div class="select-option">
                                <div class="check-date">
                                    <label for="guest">Guests</label>
                                    <input type="text" id="guest" readonly onclick="showGuestsContainer()">
                                    <div id="validationMessage" style="color: red;"></div>
                                    <div id="errorMessage" style="color: red; margin-top: 10px;"></div>


                                </div>

                                <div class="guests-container" id="guestsContainer">
                                    <div class="number-controls">
                                        <label for="rooms" style="margin-top: 20px;">Rooms</label>
                                        <button class="b" style="width:40px;margin-left:20px;    font-size: 20px;" type="button" onclick="decrement('rooms')">-</button>
                                        <input type="text" style="width:35px;margin-left:10px;text-align:center;border:none;height:38px;margin-top:8px;" name="rooms" id="rooms" value="1" readonly>
                                        <button class="b" style="width:40px;margin-left:20px;    font-size: 20px;" type="button" onclick="increment('rooms')">+</button>
                                    </div>

                                    <div class="number-controls">
                                        <label for="adults" style="margin-top: 20px;">Adults</label>
                                        <button class="b" style="width:40px;margin-left:26px;    font-size: 20px;" type="button" onclick="decrement('adults')">-</button>
                                        <input type="text" style="width:35px;margin-left:10px;text-align:center;height:38px;border:none;margin-top:8px;" name="adults" id="adults" value="1" readonly>
                                        <button class="b" style="width:40px;margin-left:18px;    font-size: 20px;" type="button" onclick="increment('adults')">+</button>
                                    </div>

                                    <div class="number-controls">
                                        <label for="children" style="margin-top: 20px;">Children</label>
                                        <button class="b" style="width:40px;margin-left:14px;    font-size: 20px;" type="button" onclick="decrement('children')">-</button>
                                        <input type="text" style="width:35px;margin-left:10px;text-align:center;height:38px;border:none;margin-top:8px;" name="children" id="children" value="0" readonly>
                                        <button class="b" style="width:40px;margin-left:18px;    font-size: 20px;" type="button" onclick="increment('children')">+</button>
                                    </div>
                                    <button class="done-button" onclick="toggleContainer(event)">done</button>
                                </div>
                            </div>
                            <input type="hidden" name="check_submit" value="true">
                            <button type="submit" name="submit" class="btn btn-success">Check </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
        // Include logbase1.php
        require(__DIR__ . '/admin/class/logbase1.php');

        try {
            $sql = "SELECT * FROM picture ORDER BY id DESC"; // Adjust column names as per your database structure
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            // Check if there are rows returned
            if ($stmt->rowCount() > 0) {
                $first = true;

                // Start the container outside the loop
                echo '<div class="hero-slider owl-carousel" id="dynamic-hero-slider">';

                // Loop through the data
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $active = $first ? ' active' : ''; // Added space before the class name

                    // Output the individual slides
                    echo '<div class="hs-item set-bg' . $active . '">';
                    echo '<img class="fii" src="images/slider_images/' . htmlspecialchars($row['bg_photo'], ENT_QUOTES, 'UTF-8') . '" data-img-url="' . htmlspecialchars($row['bg_photo'], ENT_QUOTES, 'UTF-8') . '" loading="lazy" />';
                    echo '</div>';

                    $first = false; // Set $first to false after the first iteration
                }

                // Close the container after the loop
                echo '</div>';
            } else {
                echo "No records found";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>

    </section>
    
    <!-- Hero Section End -->
    <br>
    <!-- ======= Blog Photos Section ======= -->

    <?php
// Include logbase1.php
require(__DIR__ . '/admin/class/logbase1.php');

try {
    // Check connection
    if (!$conn) {
        die("Connection failed: " . $conn->errorInfo());
    }

    $sql = "SELECT * FROM gallery ORDER BY id DESC"; // Adjust column names as per your database structure
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Check if there are rows returned
    if ($stmt->rowCount() > 0) {
        // Start the container outside the loop
        echo '<section id="recent-photos" class="recent-photos">';
        echo '<div class="container">';
        echo '<div class="recent-photos-slider swiper">';
        echo '<div class="swiper-wrapper align-items-center">';

        // Loop through the data
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Output the individual slides with fixed dimensions
            echo '<div class="swiper-slide"><a href="images/gallery_images/' . htmlspecialchars($row['bg_photo'], ENT_QUOTES, 'UTF-8') . '" class="glightbox" data-gallery="gallery">';
            echo '<img src="images/gallery_images/' . htmlspecialchars($row['bg_photo'], ENT_QUOTES, 'UTF-8') . '" class="img-fluid fixed-size-image" alt=""></a></div>';
        }

        // Repeat the slides to ensure a continuous loop
        $stmt->execute(); // Reset result set pointer to the beginning
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Output the individual slides again with fixed dimensions
            echo '<div class="swiper-slide"><a href="images/gallery_images/' . htmlspecialchars($row['bg_photo'], ENT_QUOTES, 'UTF-8') . '" class="glightbox" data-gallery="gallery">';
            echo '<img src="images/gallery_images/' . htmlspecialchars($row['bg_photo'], ENT_QUOTES, 'UTF-8') . '" class="img-fluid fixed-size-image" alt=""></a></div>';
        }

        // Close the container after the loop
        echo '</div>';
        echo '<div class="swiper-pagination"></div>';
        echo '</div>';
        echo '</div>';
        echo '</section>';
    } else {
        echo "No records found";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
} finally {
    // Close the database connection
    $conn = null;
}
?>
    <!-- <script>
        // Initialize Swiper
        var swiper = new Swiper('.recent-photos-slider', {
            loop: true, // Enable continuous loop
            slidesPerView: 1, // Number of slides per view
            spaceBetween: 10, // Adjust spacing between slides as needed
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    </script> -->
    <!-- End Blog Photos Section -->
    <hr>
    <!-- About Us Section Begin -->
    <section class="aboutus-section spad">

        <div class="container">

            <div class="row">
                <div class="col-lg-3">
                    <div class="about-pic">
                        <div class="row">
                            <div class="col-sm-6">
                                <img src="img/about/1.jpg" alt="">
                            </div>
                            <div class="col-sm-6">
                                <img src="img/about/about-2.jpg" alt="">
                            </div>
                            <div class="col-sm-6 mt-5">
                                <img src="img/about/2.jpg" alt="">
                            </div>
                            <div class="col-sm-6 mt-5">
                                <img src="img/about/about-1.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="about-text">
                        <div class="section-title">
                            <span>About Us</span>
                            <h2>Intercontinental LA <br />FABRO Rooms</h2>
                        </div>
                        <p class="f-para">FABRO.com is a leading online accommodation site. We’re passionate about
                            travel. Every day, we inspire and reach millions of travelers across 90 local websites in 41
                            languages.</p>
                        <p class="s-para">So when it comes to booking the perfect hotel, vacation rental, resort,
                            apartment, guest house, or tree house, we’ve got you covered.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

<hr>
    <!-- Home Room Section Begin -->
    <section class="hp-room-section">
        <div class="container-fluid">
            <div class="hp-room-items">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="hp-room-item set-bg" data-setbg="img/room/room-b1.jpg">
                            <div class="hr-text">
                                <h3>Premium Room</h3>
                                <h2>Rs.2599<span>/Pernight</span></h2>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Size:</td>
                                            <td>30 ft</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Capacity:</td>
                                            <td>Max persion 4</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Bed:</td>
                                            <td>King Beds</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Services:</td>
                                            <td>Wifi, Television, Bathroom,...</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="#" class="primary-btn">View More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="hp-room-item set-bg" data-setbg="img/room/room-b2.jpg">
                            <div class="hr-text">
                                <h3>Deluxe Room</h3>
                                <h2>Rs.1999<span>/Pernight</span></h2>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Size:</td>
                                            <td>30 ft</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Capacity:</td>
                                            <td>Max persion 4</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Bed:</td>
                                            <td>King Beds</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Services:</td>
                                            <td>Wifi, Television, Bathroom,...</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="#" class="primary-btn">View More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="hp-room-item set-bg" data-setbg="img/room/room-b3.jpg">
                            <div class="hr-text">
                                <h3>Double Room</h3>
                                <h2>Rs.1399<span>/Pernight</span></h2>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Size:</td>
                                            <td>30 ft</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Capacity:</td>
                                            <td>Max persion 4</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Bed:</td>
                                            <td>King Beds</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Services:</td>
                                            <td>Wifi, Television, Bathroom,...</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="#" class="primary-btn">View More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="hp-room-item set-bg" data-setbg="img/room/room-b4.jpg">
                            <div class="hr-text">
                                <h3>Luxury Room</h3>
                                <h2>Rs.1599<span>/Pernight</span></h2>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Size:</td>
                                            <td>30 ft</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Capacity:</td>
                                            <td>Max persion 5</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Bed:</td>
                                            <td>King Beds</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Services:</td>
                                            <td>Wifi, Television, Bathroom,...</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="#" class="primary-btn">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Home Room Section End -->
    <!-- Footer Section Begin -->
    <?php
  include('footer.php');
  ?> 

    <!-- Footer Section End -->

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch"><i class="icon_close"></i></div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script  src="js/index.js"></script>
    <script src="js/glightbox.min.js"></script>
    <script src="js/swiper-bundle.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/jquery-ui.js"></script>

    <script src="js/pikaday.min.js"></script>


    <!-- Template Main JS File -->
    <script src="js/main1.js"></script>
</body>

</html>