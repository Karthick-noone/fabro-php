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

    <link href="css/fontswap.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="css/style3.css" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/style1.css" type="text/css">
</head>
<style>
    .header-section {
        border-bottom: 1px solid darkgray;
    }

    .icon {
        font-size: 22px;
    }


    .cart-badge {
        position: absolute;
        top: 5px;
        right: 1;
        color:crimson;
        /* Add your preferred text color */
        padding: 1px 1px;
        /* Adjust padding as needed */
        font-size: 15px;
        /* Adjust font size as needed */
    }
</style>

<body>
    <!-- Offcanvas Menu Section Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="canvas-open">
        <i class="icon_menu"></i>
    </div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="icon_close"></i>
        </div>

        <nav class="mainmenu mobile-menu">
            <ul>
                <li class="active"><a href="./index.php">Home</a></li>
                <li class="active"><a href="./room.php">Rooms</a></li>
                <li> <a href="./cart.php"><i class="icon_cart"></i></a></li>

            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>

    </div>
    <!-- Offcanvas Menu Section amen i love you End -->

    <!-- Header Section Begin -->
    <header class="header-section">

        <div class="menu-item">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="./index.php">
                                <img src="img/logo.png">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="nav-menu">
                            <nav class="mainmenu">
                                <ul>
                                    <li class="active"><a href="./index.php">Home</a></li>
                                    <li><a href="./room.php">Rooms</a></li>
                                    <li id="cartIcon">
                                        <a href="./cart.php">
                                            <i id="cartIcon" class="fa fa-shopping-cart icon"></i>

                                            <span id="cartCountBadge" style="margin-top: 12px;" class="cart-badge">0</span></a>
                                    </li>


                                </ul>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->


    <script src="js/cart.js"></script>

    <script src="js/glightbox.min.js"></script>
    <script src="js/swiper-bundle.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/jquery-ui.js"></script>

    <script src="js/pikaday.min.js"></script>


    <!-- Template Main JS File -->
    <script src="js/main1.js"></script>
</body>

</html>