
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
 /* Clearfix for header-section */
.header-section::after {
    content: "";
    display: table;
    clear: both;
}

/* Improve header-section style */
.header-section {
    border-bottom: 1px solid darkgray;
    }

/* Make the room-details-container responsive */
.room-details-container {
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    width: 100%;
    max-width: 600px; /* Set a maximum width for larger screens */
    margin: 10px auto; /* Center the container */
    padding: 20px ;
    border: 1px solid #3498db;
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}



/* Improve room-details-item style */
.room-details-item {
    display: flex;
    flex-wrap: wrap; /* Allow items to wrap to the next line if needed */
    margin-bottom: 15px;
}

/* Improve detail-label style */
.detail-label {
    font-weight: bold;
    width: 100%;
    max-width: 150px; /* Set a maximum width for larger screens */
    margin-bottom: 5px;
    margin-left: 15%;
}

/* Improve detail-value style */
.detail-value {
    flex: 1;
    margin-left: 90px; /* Add some spacing between label and value */
}
.heading {
    font-size: 24px;
    font-weight: bold;
    text-align: center;
    margin-bottom: 20px;
    margin-left: 150px;
    text-decoration: underline;
    color:  #3498db;
}
/* Add media query for smaller screens */
@media (max-width: 768px) {
    .room-details-container {
        width: 90%; /* Adjust width for smaller screens */
    }

    .detail-label {
        margin-left: 0; /* Center the label on smaller screens */
        max-width: 100%; /* Remove maximum width for labels on smaller screens */
    }

    .detail-value {
        margin-left: 0; /* Remove left margin for value on smaller screens */
    }
}
</style>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <?php
  include('header.php');
  ?> 

    <?php
require(__DIR__ . '/admin/class/logbase1.php');

// Assuming 'bookings' is the table name
$sql = "SELECT * FROM bookings ORDER BY id DESC LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    // Output data of the first row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    echo "<div class='room-details-container'>";
    echo "<div class='room-details-item'>";
    echo "<div class='heading'>Your Booking Details</div>";
    echo "</div>";

    echo "<div class='room-details-item'>";
    echo "<div class='detail-label'>Name:</div>";
    echo "<div class='detail-value'>" . $row['name'] . "</div>";
    echo "</div>";

    echo "<div class='room-details-item'>";
    echo "<div class='detail-label'>Number:</div>";
    echo "<div class='detail-value'>" . $row['number'] . "</div>";
    echo "</div>";

    echo "<div class='room-details-item'>";
    echo "<div class='detail-label'>Booking for:</div>";
    echo "<div class='detail-value'>" . $row['booking_for'] . "</div>";
    echo "</div>";

    echo "<div class='room-details-item'>";
    echo "<div class='detail-label'>Travel for work:</div>";
    echo "<div class='detail-value'>" . $row['travel_for_work'] . "</div>";
    echo "</div>";

    echo "<div class='room-details-item'>";
    echo "<div class='detail-label'>Check in date:</div>";
    echo "<div class='detail-value'>" . $row['check_in'] . "</div>";
    echo "</div>";

    echo "<div class='room-details-item'>";
    echo "<div class='detail-label'>Check out date:</div>";
    echo "<div class='detail-value'>" . $row['check_out'] . "</div>";
    echo "</div>";

    echo "<div class='room-details-item'>";
    echo "<div class='detail-label'>Total days of staying:</div>";
    echo "<div class='detail-value'>" . $row['length_of_stay'] . "</div>";
    echo "</div>";

    echo "<div class='room-details-item'>";
    echo "<div class='detail-label'>Your rooms :</div>";
    echo "<div class='detail-value'>" . $row['room_type'] . "</div>";
    echo "</div>";

    echo "<div class='room-details-item'>";
    echo "<div class='detail-label'>Guests:</div>";
    echo "<div class='detail-value'>" . $row['adults'] . " Adults, " . $row['children'] . " Children, " . "</div>";
    echo "</div>";

    echo "<div class='room-details-item'>";
    echo "<div class='detail-label'>Total rooms:</div>";
    echo "<div class='detail-value'>" . $row['rooms'] . "</div>";
    echo "</div>";

    echo "<div class='room-details-item'>";
    echo "<div class='detail-label'>Total price:</div>";
    echo "<div class='detail-value'>" . "Rs. " . $row['total_amount'] . "</div>";
    echo "</div>";

    echo "</div>"; // Close room-details-container
} else {
    echo "No records found";
}

// Close the database connection (no need to close the statement explicitly as it's shared)
$conn = null;
?>
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


</body>



</html>