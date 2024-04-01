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
    /* main {
        background-image: url(img/pic1.jpg);
        background-size: cover;
        background-position: center;

        justify-content: center;
        align-items: center;
        height: auto;
        margin: 0;
    } */

    .header-section {
        border-bottom: 1px solid darkgray;
        background-color: white;
    }

    .breadcrumb-section {
        padding-top: 20px;
        padding-bottom: 10px;
    }

    .breadcrumb-text {
        text-align: center;
    }

    .breadcrumb-text h2 {
        font-size: 44px;
        color: #19191a;
        margin-bottom: 12px;
    }

    .booking-form {
        background: wheat;
        padding: 44px 40px 50px 40px;
        border-radius: 4px;
        border: 1px solid rgba(0, 0, 0, .125);
    }

    
</style>

<body>



    <?php
    include('header.php');
    ?>

    <!-- Header End -->
    <main>
        <!-- Breadcrumb Section Begin -->
        <section class="hero-section">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 card ">
                        <div class="about-text">
                            <div class="section-title">

                                <h2>FABRO <img src="img/five-stars.png" width="50px" height="50px"><br /></h2>
                            </div>
                            <!-- Update your booking details section -->
                            <div class="f-para card">
                                <h5 style="color:navy;padding:10px;">Your Booking Details</h5>
                                <p id="checkInDetails">Check-in : </p>
                                <p style="margin-left:-10px" id="checkOutDetails">Check-out : </p>
                                <p style="margin-left:0px" id="lengthOfDayDetails">Total length of day: </p>
                                <p style="margin-left: 0px" id="guestsInfo">Guests : </p>

                            </div><br>
                            <div class="s-para card mt-2">
                                <h5 style="color:navy;padding:10px;">Your price summary</h5>

                                <div id="selectedRoomsDisplay"></div>

                            </div><br>
                            <div class="s-paraa card">
                                <h5 style="color:navy;padding:10px;">Your payment schedule</h5>
                                <p style="color:green;">No payment today. You'll pay when you stay.</p>

                            </div><br>
                            <div class="s-paraa card">
                                <h5 style="color:navy;padding:10px;">How much will it cost to cancel?</h5>
                                <p style="color:green;">Free cancellation anytime</p>

                            </div>

                            <a href="javascript:void(0);" class="primary-btn about-btn" onclick="toggleVisibility()">Read More <span class="toggle-icon"></span></a>

                        </div>



                    </div>
                    <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
                        <div class="booking-form" style="background-color: wheat;">
                            <h3>Booking Now</h3>
                            <form id="booking-form" action="process_booking.php" method="post">
                                <div class="check-date">
                                    <label for="name">Name <span class="text-danger fs-5">*</span></label>
                                    <input type="text" id="name" name="name" required>
                                    <span id="nameError" style="color: red;" class="validation-error"></span>
                                </div>
                                <div class="check-date">
                                    <label for="number">Number <span class="text-danger fs-5">*</span></label>
                                    <input type="text" oninput="allowOnlyNumbers(this)" id="number" placeholder=" Enter Mobile Number" required name="number"> <!-- Added name attribute -->
                                    <span id="numberError" style="color: red;" class="validation-error"></span>

                                </div>
                                <div class="select-option">
                                    <label for="guest">Who are you booking for?</label>
                                    <select id="guest" name="booking_for"> <!-- Added name attribute -->
                                        <option value="For me">I am the main guest</option>
                                        <option value="For someone_else">Booking is for someone else</option>
                                    </select>
                                </div>
                                <div class="select-option">
                                    <label for="room">Are you traveling for work?</label>
                                    <select id="room" name="travel_for_work"> <!-- Added name attribute -->
                                        <option value="no">No</option>
                                        <option value="yes">Yes</option>

                                    </select>
                                </div>

                                <button type="submit" class="btn btn-success">Book Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </main>

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

    <script src="js/jquery-3.6.4.min.js"></script>
    <script src="admin/js/sweetalert.js"></script>
    <script>
       /*  function toggleVisibility() {
            const divsToToggle = document.querySelectorAll('.s-paraa');
            const readMoreBtn = document.querySelector('.about-btn');

            divsToToggle.forEach(div => {
                div.classList.toggle('show');
            });

            const isVisible = divsToToggle[0].classList.contains('show');
            readMoreBtn.querySelector('.toggle-icon').textContent = isVisible ? '▲' : '▼';
        } */

        document.addEventListener('DOMContentLoaded', function() {
            function getParameterArrayByName(name) {
                const urlSearchParams = new URLSearchParams(window.location.search);
                const values = urlSearchParams.getAll(name);
                const convertedValues = values.map(val => !isNaN(val) ? parseInt(val, 10) : val);
                return convertedValues.length > 0 ? convertedValues : null;
            }

            const roomTypes = getParameterArrayByName('roomType');
            const prices = getParameterArrayByName('price');
            const numberOfRooms = getParameterArrayByName('numberOfRooms');
            const taxes = getParameterArrayByName('taxes');
            const convertedTaxes = parseInt(taxes) || 0;

            if (roomTypes && prices && numberOfRooms && taxes) {

                const lengthOfDay = parseInt(localStorage.getItem('lengthOfDay')) || 0;

                const roomDetails = {
                    roomTypes: roomTypes,
                    prices: prices,
                    numberOfRooms: numberOfRooms,
                    totalAmount: calculateTotalAmount(prices, numberOfRooms, taxes) * lengthOfDay,
                };

                // Retrieve lengthOfDay from localStorage


                let details = '<p>Room Types:</p><ul>';

                let totalAmount = 0;
                const displayElement = document.getElementById('selectedRoomsDisplay');

                for (let i = 0; i < roomTypes.length; i++) {
                    const roomPrice = parseInt(prices[i]);
                    const roomCount = parseInt(numberOfRooms[i]);
                    const roomTaxes = parseInt(taxes[i]) || 0;

                    const taxesAndCharges = roomTaxes * roomCount;
                    const roomTotalPrice = roomPrice * roomCount;
                    const roomTotal = (roomPrice * roomCount) + taxesAndCharges;
                    totalAmount += roomTotal * lengthOfDay;

                    details += `<p>${roomTypes[i]} - ${numberOfRooms[i]} , Price ₹ ${roomTotalPrice} + ${taxesAndCharges} Taxes and Charges <br>  Total<b> ₹ ${roomTotal}</b></p>`;
                }

                details += `<p>Total Amount for ${lengthOfDay} day${lengthOfDay == 1 ?'':'s'}  : <b> ₹ ${totalAmount}</b></p></ul>`;
                displayElement.innerHTML = details;
                console.log('roomDetails:', roomDetails);
                localStorage.setItem('roomDetails', JSON.stringify(roomDetails));
            } else {
                const displayElement = document.getElementById('selectedRoomsDisplay');
                displayElement.innerHTML = 'No room details found.';
            }
        });

        function calculateTotalAmount(prices, numberOfRooms, taxes) {
            let totalAmount = 0;
            for (let i = 0; i < prices.length; i++) {
                const roomPrice = parseInt(prices[i]);
                const roomCount = parseInt(numberOfRooms[i]);
                const roomTaxes = parseInt(taxes[i]) || 0;
                const taxesAndCharges = roomTaxes * roomCount;
                const roomTotalPrice = roomPrice * roomCount;
                totalAmount += (roomPrice * roomCount) + taxesAndCharges;
            }
            return totalAmount;
        }

        function getSelectedRoomDetails() {
            const storedRoomDetails = localStorage.getItem('roomDetails');
            return storedRoomDetails ? JSON.parse(storedRoomDetails) : null;
        }

        function saveBookingDetailsToDatabase(data) {
            const roomDetails = getSelectedRoomDetails();

            if (roomDetails) {
                data.roomTypes = roomDetails.roomTypes;
                data.prices = roomDetails.prices;
                data.totalAmount = roomDetails.totalAmount;
                data.numberOfRooms = roomDetails.numberOfRooms;
            }

            console.log('roomDetails:', roomDetails);
            console.log('Data to be sent to the server:', data);

            fetch('admin/process_booking.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(data),
                })
                .then(response => response.text())
                .then(data => {
                    console.log(data);
                    Swal.fire({
                        title: 'Booking Successful!',
                        text: 'Booking details stored successfully!',
                        icon: 'success',
                        confirmButtonText: 'OK',
                        timer: 3000
                    }).then(() => {
                        // Reload the page
                        window.location.href = 'details.php';
                    });
                })
                .catch((error) => {
                    console.error('Error:', error);
                    Swal.fire({
                        title: 'Error',
                        text: 'An error occurred during the booking process.',
                        icon: 'error',
                        confirmButtonText: 'OK',
                        timer: 3000
                    });
                });
        }

        function updateAvailableRooms() {
            fetch('admin/update_rooms.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify( /* Include the data you need to send for updating rooms */ ),
                })
                .then(response => response.text())
                .then(data => {
                    console.log(data);
                })
                .catch((error) => {
                    console.error('Error updating available rooms:', error);
                });
        }

        document.addEventListener('DOMContentLoaded', function() {
            function updateBookingDetails() {
                console.log('Updating booking details');
                const storedRoomDetails = localStorage.getItem('roomDetails');
                const roomDetails = storedRoomDetails ? JSON.parse(storedRoomDetails) : null;

                console.log('Room details:', roomDetails);

                if (roomDetails && roomDetails.guests) {
                    const {
                        checkIn,
                        checkOut,
                        guests
                    } = roomDetails;

                    document.getElementById('checkInDetails').innerText = `Check-in : ${checkIn}`;
                    document.getElementById('checkOutDetails').innerText = `Check-out : ${checkOut}`;

                    if (guests) {
                        const {
                            rooms,
                            adults,
                            children
                        } = guests;
                        const roomsText = rooms > 1 ? 'Rooms' : 'Room';

                        document.getElementById('guestsInfo').innerText = `Guests : ${rooms} ${roomsText}, ${adults} Adults, ${children} Children`;
                    } else {
                        console.log('No guests details found in roomDetails.');
                    }

                    const lengthOfDay = calculateLengthOfDay(checkIn, checkOut);
                    document.getElementById('lengthOfDayDetails').innerText = `Total length of stay : ${lengthOfDay} day(s)`;
                    console.log(lengthOfDay)
                }
            }

            function calculateLengthOfDay(checkIn, checkOut) {
                const checkInDate = new Date(checkIn);
                const checkOutDate = new Date(checkOut);
                const timeDifference = checkOutDate - checkInDate;
                const lengthOfDay = Math.ceil(timeDifference / (1000 * 60 * 60 * 24));

                return lengthOfDay;
            }

            const bookingForm = document.getElementById('booking-form');
            if (bookingForm) {
                bookingForm.addEventListener('submit', function(event) {
                    event.preventDefault();
                    handleFormSubmission();
                    updateBookingDetails();
                });
            }

            updateBookingDetails();
        });

        function handleFormSubmission() {
            const name = document.getElementById('name').value;
            const number = document.getElementById('number').value;
            const booking_for = document.getElementById('guest').value;
            const travel_for_work = document.getElementById('room').value;

            const nameErrorElement = document.getElementById('nameError');
            if (!name.trim()) {
                nameErrorElement.innerHTML = 'Please enter your name.';
            } else {
                nameErrorElement.innerHTML = '';
            }

            const numberErrorElement = document.getElementById('numberError');
            if (!number.trim()) {
                numberErrorElement.innerHTML = 'Please enter your phone number.';
            } else if (!validatePhoneNumber(number)) {
                numberErrorElement.innerHTML = 'Please enter a valid 10-digit phone number.';
            } else {
                numberErrorElement.innerHTML = '';
            }

            if (nameErrorElement.innerHTML || numberErrorElement.innerHTML) {
                return;
            }

            const roomDetails = getBookingDetails();
            const data = {
                name,
                number,
                booking_for,
                travel_for_work,
                roomDetails,
            };

            saveBookingDetailsToDatabase(data);
        }

        function validatePhoneNumber(phoneNumber) {
            const phoneNumberPattern = /^[6-9]\d{9}$/;
            return phoneNumberPattern.test(phoneNumber);
        }

        function allowOnlyNumbers(inputElement) {
            // Remove non-numeric characters using a regular expression
            inputElement.value = inputElement.value.replace(/\D/g, '');
        }
    </script>

    <!-- Add this script in your booking.php file -->
    <script>
        // Function to retrieve form details from local storage
        function getBookingDetails() {
            const storedRoomDetails = localStorage.getItem('selectedRoomDetails');
            if (storedRoomDetails) {
                return JSON.parse(storedRoomDetails);
            }
            return null;
        }

        // Function to update the "Your Booking Details" section
        function updateBookingDetails() {
            console.log('Updating booking details');

            const roomDetails = getBookingDetails();
            console.log('Room details:', roomDetails);

            if (roomDetails && roomDetails.guests) {
                const {
                    checkIn,
                    checkOut,
                    guests
                } = roomDetails;
                console.log('Guests:', guests);

                // Update the check-in and check-out details
                document.getElementById('checkInDetails').innerText = `Check-in : ${checkIn}`;
                document.getElementById('checkOutDetails').innerText = `Check-out : ${checkOut}`;

                // Display guests details if guests are available
                if (guests) {
                    const {
                        rooms,
                        adults,
                        children
                    } = guests;

                    const roomsText = rooms > 1 ? 'Rooms' : 'Room';

                    document.getElementById('guestsInfo').innerText = `Guests : ${rooms} ${roomsText}, ${adults} Adults, ${children} Children`;
                } else {
                    console.log('No guests details found in roomDetails.');
                }

                // Calculate the total length of stay (you can modify this logic based on your requirements)
                const lengthOfDay = calculateLengthOfDay(checkIn, checkOut);
                document.getElementById('lengthOfDayDetails').innerText = `Length of stay : ${lengthOfDay} day${lengthOfDay == 1 ?'':'s'}`;
                localStorage.setItem('lengthOfDay', lengthOfDay);

                // Additional updates based on your needs...
            }
        }

        // Example function to calculate the length of stay
        function calculateLengthOfDay(checkIn, checkOut) {
            const checkInDate = new Date(checkIn);
            const checkOutDate = new Date(checkOut);
            const timeDifference = checkOutDate - checkInDate;
            const lengthOfDay = Math.ceil(timeDifference / (1000 * 60 * 60 * 24)); // Convert milliseconds to days
            return lengthOfDay;
        }

        // Call the function to update the booking details
        updateBookingDetails();
    </script>
    <!-- Add this script in your HTML file -->


</body>

</html>