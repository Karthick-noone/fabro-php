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
  <link href="css/fonts/bootstrap-icons.css" rel="stylesheet">

  <link rel="stylesheet" href="css/calendar.css">
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

  <!-- Main CSS File -->
  <link href="css/style4.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    body {
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
      <div class="container-fluid1" id="hms">

        <form id="bookingForm" action="room.php" method="post" onsubmit="return validateForm()">
          <h2 style="text-align: center;">Hotel Room Booking</h2>


          <label for="name">Name:</label>
          <input type="text" id="name" name="name" required>

          <label for="number">Number:</label>
          <input type="text" id="number" name="number" required>


          <!-- Example 1 Form Fields -->
          <label for="checkin">Check-in Date:</label>
          <input type="text" class="date-input flatpickr" name="date-in" id="date-in" required>

          <label for="checkout">Check-out Date:</label>
          <input type="text" class="date-output flatpickr" name="date-out" id="date-out" required>



          <div class="select-option">
            <div class="check-date">
              <label for="guest">Guests</label>
              <input type="text" id="guest" readonly onclick="showGuestsContainer()">
              <div id="validationMessage" style="color: red;"></div>
            </div>

            <div class="guests-container" id="guestsContainer">
              <div class="number-controls">
                <label for="rooms" style="margin-top: 20px;">Rooms</label>
                <button class="btn btn-secondary" style="width:40px;margin-left:20px;    font-size: 20px;" type="button" onclick="decrement('rooms')">-</button>
                <input type="text" style="width:35px;margin-left:10px;text-align:center;border:none;height:38px;margin-top:8px;" name="rooms" id="rooms" value="1" readonly>
                <button class="btn btn-secondary" style="width:40px;margin-left:20px;    font-size: 20px;" type="button" onclick="increment('rooms')">+</button>
              </div>

              <div class="number-controls">
                <label for="adults" style="margin-top: 20px;">Adults</label>
                <button class="btn btn-secondary" style="width:40px;margin-left:26px;    font-size: 20px;" type="button" onclick="decrement('adults')">-</button>
                <input type="text" style="width:35px;margin-left:10px;text-align:center;height:38px;border:none;margin-top:8px;" name="adults" id="adults" value="1" readonly>
                <button class="btn btn-secondary" style="width:40px;margin-left:18px;    font-size: 20px;" type="button" onclick="increment('adults')">+</button>
              </div>

              <div class="number-controls">
                <label for="children" style="margin-top: 20px;">Children</label>
                <button class="btn btn-secondary" style="width:40px;margin-left:14px;    font-size: 20px;" type="button" onclick="decrement('children')">-</button>
                <input type="text" style="width:35px;margin-left:9px;text-align:center;height:38px;border:none;margin-top:8px;" name="children" id="children" value="0" readonly>
                <button class="btn btn-secondary" style="width:40px;margin-left:16px;    font-size: 20px;" type="button" onclick="increment('children')">+</button>
              </div>
              <button class="done-button btn btn-secondary" onclick="toggleContainer(event)">done</button>
            </div>
          </div>

          <!-- Example 2 Form Fields -->


          <label for="requests">Special Requests:</label>
          <textarea id="requests" name="requests" rows="4"></textarea>

          <button type="submit" class="btn btn-success">Submit Reservation</button>
        </form>

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


  <script src="js/calendar.js"></script>

  <!-- Main JS File -->
  <script src="js/main.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Set default values for Check In and Check Out
      var today = new Date();
      var tomorrow = new Date();
      tomorrow.setDate(tomorrow.getDate() + 1); // Adjusted to 1 day for a range

      // Set the formatted dates in the input fields using Flatpickr
      flatpickr('#date-in', {
        defaultDate: today,
        dateFormat: 'j F, y'
      });
      flatpickr('#date-out', {
        defaultDate: tomorrow,
        dateFormat: 'j F, y'
      });

      showGuestsDefaultValues();
    });

    // Function to format the date as "day month year" for display
    function formatDate(date) {
      const day = date.getDate();
      const month = date.toLocaleString('en-US', {
        month: 'long'
      });
      const yearShort = date.getFullYear().toString().substr(-2); // Get the last two digits of the year
      return `${day} ${month}, ${yearShort}`;
    }

    function showGuestsContainer() {
      const guestsContainer = document.getElementById('guestsContainer');

      // Check the current display status
      const currentDisplay = window.getComputedStyle(guestsContainer).display;

      // Toggle the display
      guestsContainer.style.display = currentDisplay === 'none' ? 'block' : 'none';

      // Set default values only if the container is displayed
      if (guestsContainer.style.display === 'block') {
        // Set default values for adults and rooms to 1, and children to 0
        document.getElementById('adults').value = 2; // Default to 2 adults
        document.getElementById('rooms').value = 1;
        document.getElementById('children').value = 0;

        // Update the label for "Room" based on the selected value
        updateRoomLabel();

        // Update the guests input field with default values
        const guestsInput = document.getElementById('guest');
        guestsInput.value = '1 Room, 2 Adults, 0 Children';

        // Disable the decrement buttons for adults and rooms initially
        updateDecrementButtonsState();
      }
    }

    function showGuestsDefaultValues() {
      // Set default values for Guests
      document.getElementById('rooms').placeholder = '1';
      document.getElementById('adults').placeholder = '2';
      document.getElementById('children').placeholder = '0';
    }

    document.addEventListener('DOMContentLoaded', function() {
      // Set default values for Check In and Check Out
      var today = new Date();
      var tomorrow = new Date();
      tomorrow.setDate(tomorrow.getDate() + 1); // Adjusted to 1 day for a range
      document.getElementById('checkin').value = formatDate(today);
      document.getElementById('checkout').value = formatDate(tomorrow);

      updateRoomLabel();
      showGuestsDefaultValues();

      // Set default values for Guests
      document.getElementById('rooms').placeholder = '1';
      document.getElementById('adults').placeholder = '2';
      document.getElementById('children').placeholder = '0';
    });

    function toggleContainer(event) {
      event.preventDefault();
      var guestsContainer = document.getElementById('guestsContainer');
      guestsContainer.style.display = guestsContainer.style.display === 'none' || guestsContainer.style.display === '' ? 'flex' : 'none';

      // Reset the validation message when the container is toggled
      const validationMessageElement = document.getElementById('validationMessage');
      validationMessageElement.innerHTML = '';
    }

    function updateGuestsInput() {
      const rooms = parseInt(document.getElementById('rooms').value, 10);
      const adults = document.getElementById('adults').value;
      const children = document.getElementById('children').value;
      const guestsInput = document.getElementById('guest');

      // Determine whether to use singular or plural for "Room"
      const roomLabel = rooms === 1 ? 'Room' : 'Rooms';

      // Check if any of the input values are empty, and set default values if needed
      const roomsValue = isNaN(rooms) || rooms <= 0 ? 1 : rooms;
      const adultsValue = adults.trim() === '' ? 2 : adults;
      const childrenValue = children.trim() === '' ? 0 : children;

      guestsInput.value = `${roomsValue} ${roomLabel}, ${adultsValue} Adults, ${childrenValue} Children`;

      // Update the state of decrement buttons
      updateDecrementButtonsState();
    }

    function increment(inputId) {
      const input = document.getElementById(inputId);
      input.value = parseInt(input.value) + 1;
      updateGuestsInput();
    }

    function decrement(inputId) {
      const input = document.getElementById(inputId);
      if (inputId === 'children' && parseInt(input.value) > 0) {
        input.value = parseInt(input.value) - 1;
      } else if (inputId !== 'children' && parseInt(input.value) > 1) {
        input.value = parseInt(input.value) - 1;
      }
      updateGuestsInput();
    }

    // Function to update the state of decrement buttons
    function updateDecrementButtonsState() {
      const adults = document.getElementById('adults').value;
      const rooms = document.getElementById('rooms').value;

      document.getElementById('decrementAdults').disabled = adults == 1;
      document.getElementById('decrementRooms').disabled = rooms == 1;
    }

    function validateForm() {
      const guestsInput = document.getElementById('guest');
      const guestsValue = guestsInput.value.trim();

      // Check if the guests input field is empty or has the default value
      if (guestsValue === '' || guestsValue === '0 Room, 0 Adults, 0 Children') {
        // Display the validation message in a specific element
        const validationMessageElement = document.getElementById('validationMessage');
        validationMessageElement.innerHTML = 'Please select the number of guests.';
        return false; // Prevent default form submission
      }

      // Extract the number of adults, children, and rooms from the guests input
      const [, rooms, adults, children] = guestsValue.match(/(\d+) Room(?:s)?, (\d+) Adults, (\d+) Children/);

      // Check if the number of adults is less than the number of rooms
      if (parseInt(adults, 10) < parseInt(rooms, 10)) {
        const validationMessageElement = document.getElementById('validationMessage');
        validationMessageElement.innerHTML = 'Select atleast 1 adult per room.';
        return false; // Prevent default form submission
      }

      // Check if the total number of adults and children combined exceeds 5 per room
      const totalGuests = parseInt(adults, 10) + parseInt(children, 10);
      if (totalGuests > rooms * 4) {
        const validationMessageElement = document.getElementById('validationMessage');
        validationMessageElement.innerHTML =

          'Maximum 4 persons (adults and children combined) are allowed per room.';
        return false; // Prevent default form submission
      }

      // Clear the validation message if the validation passes
      const validationMessageElement = document.getElementById('validationMessage');
      validationMessageElement.innerHTML = '';

      const isValid = storeSelectedRoomDetails();
      return isValid; // Prevent default form submission
    }

    // Function to store selected room details in local storage
    function storeSelectedRoomDetails() {
      const checkIn = document.getElementById('checkin').value;
      const checkOut = document.getElementById('checkout').value;
      const rooms = parseInt(document.getElementById('rooms').value, 10); // Convert to integer
      const adults = document.getElementById('adults').value;
      const children = document.getElementById('children').value;

      const selectedRoomDetails = {
        checkIn,
        checkOut,
        guests: {
          rooms,
          adults,
          children
        }
      };

      localStorage.setItem('selectedRoomDetails', JSON.stringify(selectedRoomDetails));

      return true;
    }
  </script>

</body>

</html>