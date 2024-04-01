<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fabro Rooms">
    <meta name="keywords" content="Fabro, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fabro Rooms</title>

    <!-- Google Font -->
    <link href="css/font.css" rel="stylesheet">
    <link href="css/fontswap.css" rel="stylesheet">
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
    .header-section {
        border-bottom: 1px solid darkgray;
    }


    .back-to-top {
        display: none;
        position: fixed;
        bottom: 20px;
        right: 20px;
        color: white;
        border: none;
        border-radius: 50%;
        padding: 10px;
        cursor: pointer;
    }

    .room-card {
        border: 1px solid #ccc;
        border-radius: 8px;
        padding: 16px;
        margin-bottom: 5px;
        margin-top: 10px;
        justify-content: space-between;
        align-items: center;
        width: 200px;
        margin-left: -25px;
        background-color: rgb(242, 240, 240);

    }

    .room-details {
        flex: 1;
        color: white;
    }

    .room-details p {
        margin: 0;
    }

    .quitSymbol {
        cursor: pointer;
        color: red;
        font-size: 20px;
        float: right;
    }

    .breadcrumb-text {
        margin-left: 180px;
    }

    .rm {
            font-size: 1.2em;
            margin-right: 15px;
            font-weight: bold;
            color: green; /* Set the color to gold/yellow */
            float: right;
            border: 2px solid green; /* Set the border color to match the text color */
            border-radius: 50%; /* Set border-radius to make it a circle */
            width: 40px; /* Set a fixed width to ensure a perfect circle */
            height: 40px; /* Set a fixed height to ensure a perfect circle */
            text-align: center; /* Center the text within the circle */
            line-height: 37px; /* Vertically center the text within the circle */
            padding: 15;
        }
</style>

<body>
    <!-- <h1><?php echo $message; ?></h1> -->

    <!-- Page Preloder -->
    <!--   <div id="preloder">
        <div class="loader"></div>
    </div> -->


    <?php
    include('header.php');
    ?>


    <div class="bg">
        <!-- Breadcrumb Section Begin -->
        <div class="breadcrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="breadcrumb-text">
                            <h2>Rooms Availability</h2>

                        </div>
                    </div>
                    <div class="col-lg-3">
                        <button style="display:none" class="btn btn-success" onclick="onReserveButtonClick()">Reserve Your Room</button>
                        <div style="display:none" id="selectedRoomDisplay" style="margin-left: 10px; display:flex"></div>
                        <div style="display:none" id="errorMessage" style="color: red;margin-left: -65px; display:flex"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Section End -->

        <!-- Rooms Section Begin -->
        <section class="rooms-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="room-item">
                            <a href="premium.php">
                                <div class="gallery-item set-bg" data-setbg="img/room/room-1.jpg">
                                    <div class="gi-text">
                                        <h3>View Room</h3>
                                    </div>
                                </div>
                            </a>
                            <div class="ri-text">

                                <a href="premium.php">
                                    <h4>Premium Room <span class="rm" id="Premium_RoomCount"></span></h4>
                                </a>

                                <h3>RS.2599<span>/Pernight</span></h3>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Size:</td>
                                            <td>30 ft</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Capacity:</td>
                                            <td>Max person 4</td>
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
                                <div class="error-container">
                                    <p style="color:red" id="errorMessageContainer1"></p>
                                </div>

                                <button class="btn btn-secondary" onclick="onDoneClick('Premium Room', 2599, 120, document.querySelector('.roomSelect'))" class="primary-btn" style="margin-left: 10px">Add to cart</button>

                                <select class="roomSelect" data-room-type="Premium Room" data-price="2599" data-taxes="120">
                                    <option value="0" selected>No Of Rooms</option>

                                    <option value="1">1 Room</option>
                                    <option value="2">2 Rooms</option>
                                    <option value="3">3 Rooms</option>
                                    <option value="4">4 Rooms</option>
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="room-item">
                            <a href="deluxe.php">
                                <div class="gallery-item set-bg" data-setbg="img/room/room-2.jpg">
                                    <div class="gi-text">
                                        <h3>View Room</h3>
                                    </div>
                                </div>
                            </a>
                            <div class="ri-text">
                                <a href="deluxe.php">
                                    <h4>Deluxe Room <span class="rm" id="Deluxe_RoomCount"></span> </h4>
                                </a>
                                <h3>RS.1999<span>/Pernight</span></h3>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Size:</td>
                                            <td>30 ft</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Capacity:</td>
                                            <td>Max person 4</td>
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
                                <div class="error-container">
                                    <p style="color:red" id="errorMessageContainer2"></p>
                                </div>
                                <button class="btn btn-secondary" onclick="onDoneClick('Deluxe Room', 1999, 120, document.querySelector('.roomSelect1'))" class="primary-btn" style="margin-left: 10px">Add to cart</button>

                                <select class="roomSelect1" data-room-type="Deluxe Room" data-price="1999" data-taxes="100">
                                    <option value="0" selected>No Of Rooms</option>

                                    <option value="1">1 Room</option>
                                    <option value="2">2 Rooms</option>
                                    <option value="3">3 Rooms</option>
                                    <option value="4">4 Rooms</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="room-item">
                            <a href="double.php">
                                <div class="gallery-item set-bg" data-setbg="img/room/room-3.jpg">
                                    <div class="gi-text">
                                        <h3>View Room </h3>
                                    </div>
                                </div>
                            </a>
                            <div class="ri-text">
                                <a href="double.php">
                                    <h4>Double Room <span class="rm" id="Double_RoomCount"></span></h4>
                                </a>
                                <h3>RS.1399<span>/Pernight</span></h3>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Size:</td>
                                            <td>30 ft</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Capacity:</td>
                                            <td>Max person 4</td>
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
                                <p style="margin-top: -25px;color:red" id="errorMessageContainer3"></p>

                                <button class="btn btn-secondary" onclick="onDoneClick('Double Room', 1399, 120, document.querySelector('.roomSelect2'))" class="primary-btn" style="margin-left: 10px">Add to cart</button>

                                <select class="roomSelect2" data-room-type="Double Room" data-price="1399" data-taxes="120">
                                    <option value="0" selected>No Of Rooms</option>

                                    <option value="1">1 Room</option>
                                    <option value="2">2 Rooms</option>
                                    <option value="3">3 Rooms</option>
                                    <option value="4">4 Rooms</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="room-item">
                            <a href="luxury.php">
                                <div class="gallery-item set-bg" data-setbg="img/room/room-4.jpg">
                                    <div class="gi-text">
                                        <h3>View Room</h3>
                                    </div>
                                </div>
                            </a>
                            <div class="ri-text">
                                <a href="luxury.php">
                                    <h4>Luxury Room <span class="rm" id="Luxury_RoomCount"></span></h4>
                                </a>
                                <h3>RS.1599<span>/Pernight</span></h3>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Size:</td>
                                            <td>30 ft</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Capacity:</td>
                                            <td>Max person 4</td>
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
                                <p style="margin-top: -25px;color:red" id="errorMessageContainer4"></p>


                                <button class="btn btn-secondary" onclick="onDoneClick('Luxury Room', 1599, 120, document.querySelector('.roomSelect3'))" class="primary-btn" style="margin-left: 10px">Add to cart</button>

                                <select class="roomSelect3" data-room-type="Luxury Room" data-price="1599" data-taxes="120">
                                    <option value="0" selected>No Of Rooms</option>

                                    <option value="1">1 Room</option>
                                    <option value="2">2 Rooms</option>
                                    <option value="3">3 Rooms</option>
                                    <option value="4">4 Rooms</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="room-item">
                            <a href="single.php">
                                <div class="gallery-item set-bg" data-setbg="img/room/room-5.jpg">
                                    <div class="gi-text">
                                        <h3>View Room </h3>
                                    </div>
                                </div>
                            </a>
                            <div class="ri-text">
                                <a href="single.php">
                                    <h4>Single Room <span class="rm" id="Single_RoomCount"></span></h4>
                                </a>
                                <h3>RS.799<span>/Pernight</span></h3>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Size:</td>
                                            <td>30 ft</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Capacity:</td>
                                            <td>Max person 4</td>
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
                                <p style="margin-top: -25px;color:red" id="errorMessageContainer5"></p>


                                <button class="btn btn-secondary" onclick="onDoneClick('Single Room', 799, 120, document.querySelector('.roomSelect4'))" class="primary-btn" style="margin-left: 10px">Add to cart</button>

                                <select class="roomSelect4" data-room-type="Single Room" data-price="799" data-taxes="120">
                                    <option value="0" selected>No Of Rooms</option>

                                    <option value="1">1 Room</option>
                                    <option value="2">2 Rooms</option>
                                    <option value="3">3 Rooms</option>
                                    <option value="4">4 Rooms</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="room-item">
                            <a href="small.php">
                                <div class="gallery-item set-bg" data-setbg="img/room/room-6.jpg">
                                    <div class="gi-text">
                                        <h3>View Room</h3>
                                    </div>
                                </div>
                            </a>
                            <div class="ri-text">
                                <a href="small.php">
                                    <h4>Small Room <span class="rm" id="Small_RoomCount"></span></h4>
                                </a>
                                <h3>RS.599<span>/Pernight</span></h3>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Size:</td>
                                            <td>30 ft</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Capacity:</td>
                                            <td>Max person 4</td>
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
                                <p style="margin-top: -25px;color:red" id="errorMessageContainer6"></p>


                                <button class="btn btn-secondary" onclick="onDoneClick('Small Room', 599, 120, document.querySelector('.roomSelect5'))" class="primary-btn" style="margin-left: 10px">Add to cart</button>

                                <select class="roomSelect5" data-room-type="Small Room" data-price="599" data-taxes="120">
                                    <option value="0" selected>No Of Rooms</option>

                                    <option value="1">1 Room</option>
                                    <option value="2">2 Rooms</option>
                                    <option value="3">3 Rooms</option>
                                    <option value="4">4 Rooms</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- Rooms Section End -->
    </div>
    <!-- Footer Section Begin -->
    <?php
  include('footer.php');
  ?> 

    <!-- Footer Section End -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center" onclick="scrollToTop()">
        <img src="img/up-arrow (2).png" width="30px" height="30px"> </a>
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
    <script src="js/cart.js"></script>



</body>



</html>