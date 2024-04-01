<!--LoginSessions-->
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!--Required-bs/js-files-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabro Rooms</title>
    <link href="css/data3.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style1.css">
    <!--fontawsm-->
    <link href="font/css/all.css" rel="stylesheet">
    <!--CSS-Styling-->
    <link rel="stylesheet" href="css/stylem.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;

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
            width: 100%;
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

        #ty {
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

            .container-fluid1 {
                margin-top: 250px;
            }
        }

        .gallery-item {
            width: 100%;
            height: 80%;
            overflow: hidden;

        }

        .gallery-image {
            width: 100%;
            height: 80%;
            object-fit: cover;
        }

        #footer {
            color: white;
            padding: 5px 0;
            margin-top: auto;
        }

        .container.footer-bottom {
            text-align: center;
        }
    </style>
</head>
<!--Navbar/offcanvas-->
<header>
    <?php
    include("header.php");
    ?>
</header>
<!--content-->

<body>
    <main id="main">
        <!--Hotel Mamagement Section-->
        <section>

            <!-- Start gallery Area -->
            <section class="gallery-area section-gap" id="gallery">
                <div class="container-fluid">
                    <div class="row justify-content-between align-items-center">

                        <div class="col-12 col-md-9  mb-3 mb-md-0">
                            <h1 class="text-dark text-center my-5 " style="margin-left:300px">Slider Images</h1>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="dropdown" id="dropdown1">
                                <button class="btn text-light" style="background-color: #181818;" type="button" id="dropdownMenuButton1" aria-haspopup="true" aria-expanded="false">
                                    Add/Delete Images
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <!-- Dropdown items for Add Images -->
                                    <a class="dropdown-item" href="#">Add Image</a>
                                    <a class="dropdown-item" href="#">Delete Image</a>
                                    <!-- Add more items as needed -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- <section><p class="text-center text-white p-4">Create an interactive slider for your website with seamless add, edit, and delete operations<br> to effortlessly manage and showcase your captivating images on the Homepage</p></section> -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const dropdownButton = document.getElementById('dropdownMenuButton1');

                    dropdownButton.addEventListener('click', function() {
                        // Use Bootstrap's dropdown method to open the dropdown
                        $(this).dropdown('toggle');
                    });
                });
            </script>
            <!-- Image display section -->
            <section class="gallery-area " style="margin-top:-100px">
                <div class="container">
                    <div class="row">
                        <?php
                        require_once('class/logbase.php');

                        // Assuming $conn is your PDO connection
                        $sql = "SELECT * FROM gallery";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();

                        if ($stmt) {
                            $images = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            echo '<div class="row">';
                            foreach ($images as $row) {
                                $imagePath = $row['bg_photo'];
                                $imagePathh = $row['imagepath'];
                                $id = $row['id'];

                                echo '<div class="col-md-4 col-lg-4 col-sm-6 col-12">';
                                echo '<img src="../images/gallery_images/' . $imagePath . '" alt="" class="slider-image img-fluid" width="400px" height="400px">';

                                echo '<a style="text-decoration: none;" href="wall_change1.php?id=' . $id . '&image=../images/gallery/' . $imagePath . '&imagepath=' . $imagePathh . '">';
                                echo '<br>';
                                echo '<button class="btn btn-primary edit-button mt-2 mb-2">Edit</button>';
                                echo '</a>';

                                echo '</div>';
                            }
                            echo '</div>';
                        } else {
                            echo 'No images found.';
                        }
                        ?>
                    </div>
                </div>
            </section>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Get all the "Change" buttons by their class
                    var changeButtons = document.querySelectorAll('.change-button');

                    // Add a click event listener to each button
                    changeButtons.forEach(function(button) {
                        button.addEventListener('click', function() {
                            var imageId = button.getAttribute('data-image-id'); // Get the image ID
                            var newPageURL = 'gallery_change.php?selectedImageId=' + imageId; // Pass the image ID as a query parameter


                            // Redirect to the new page
                            window.location.href = newPageURL;
                        });
                    });
                });
            </script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const dropdownButton = document.getElementById('dropdownMenuButton1');

                    dropdownButton.addEventListener('click', function() {
                        // Use Bootstrap's dropdown method to open the dropdown
                        $(this).dropdown('toggle');
                    });
                });
            </script>


        </section>
        <!-- End Hotel Management Section -->

    </main>

    <script src="js/aos.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/glightbox.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/swiper-bundle.min.js"></script>
    <script src="js/noframework.waypoints.js"></script>
    <script src="js/validate.js"></script>
    <script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/new.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <!--  Main JS File -->
    <script src="js/main.js"></script>
    <!-- <?php
            include("footer.php");
            ?> -->
</body>

</html>