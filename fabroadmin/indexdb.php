<!--LoginSessions-->
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<?php
// Include the database connection file
require_once(__DIR__ . '/class/logbase.php');

// Pagination settings
$results_per_page = 10;

// Determine page number
if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

// Calculate the SQL LIMIT starting point
$start_from = ($page - 1) * $results_per_page;

// Fetch data from the database
$sql = "SELECT id, name, number, booking_for, travel_for_work, check_in, check_out, room_type, adults, children, rooms, price, length_of_stay, total_amount
        FROM bookings
        ORDER BY id DESC
        LIMIT $start_from, $results_per_page";

$result = $conn->query($sql);

// Fetch all data for counting total pages
$sql_total = "SELECT COUNT(id) AS total FROM bookings";
$result_total = $conn->query($sql_total);
$row_total = $result_total->fetch(PDO::FETCH_ASSOC);
$total_results = $row_total['total'];
$total_pages = ceil($total_results / $results_per_page);

// Close the connection
$conn = null; // Assuming $conn is a PDO instance
?>
<!--Required-bs/js-files-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabro Rooms</title>
    <link href="css/data3.css" rel="stylesheet">
    <script src="js/new.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <link rel="stylesheet" href="css/style1.css">
    <!--fontawsm-->
    <link href="font/css/all.css" rel="stylesheet">
    <!--CSS-Styling-->
    <link rel="stylesheet" href="css/stylem.css">
     <!-- Google Fonts -->
     <link href="css/font.css" rel="stylesheet">
    <link rel="stylesheet" href="css/pikaday.min.css">
    <style>
        h2 {
            text-align: center;
            color: black;
            margin-top: 10px;
            font-family: calibri;
        }

        table {
            font-family: calibri;
            width: 92%;
            margin: 10px auto;
            border-collapse: collapse;
            background-color: white;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: rgb(39, 161, 155);
            /* background-color: #F175AA; */
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .pagination {
            display: flex;
            list-style: none;
            justify-content: center;
            margin-top: 20px;
            padding: 0;
        }

        .pagination li {
            margin: 0 0px;
        }

        .pagination a {
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 0px;
            transition: background-color 0.3s;
            display: inline-block;
            background-color: rgb(39, 161, 155);
        }

        /* .pagination a.active, */
        .pagination a:hover {
            background-color: rgb(20, 219, 299);
            color: white;
        }

        .pagination a.active {
            background-color: rgb(20, 219, 299);
            /* Add your desired background color for the active page */
            color: white;
            /* Add your desired color for the active page */
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

        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            font-size: small;
        }

        /* Style for the modal content */
        .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
        }

        /* Style for the close button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            margin-left: 95%;
            margin-top: -3%;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Style for the form fields */
        form {
            display: flex;
            flex-direction: column;


        }

        label {
            margin-top: 10px;
            font-weight: bold;
        }

        input {
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #164863;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #427D9D;
        }

        .select-option {
            margin-bottom: 20px;
        }

        .number-controls {
            display: flex;
            align-items: center;
        }

        button {
            background-color: #4caf50;
            color: white;
            border: none;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }

        #roomTypeContainer {
            display: none;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #fff;
            position: absolute;
            z-index: 1000;
            margin-top: -480px;
            margin-left: 618px;
            width: 54%;


        }

        #footer {
            color: white;
            padding: 5px 0;
            margin-top: auto;
        }

        .container.footer-bottom {
            text-align: center;
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
<!--Navbar/offcanvas-->
<header>
    <?php
    include("header.php");
    ?>
</header>
<!--content-->

<body>

    <section>

        <div class="container-lg">
            <div class="row">
                <h5>Room - Status</h5>
                <div class="column">

                    <div class="card">
                        <h5>Available Rooms</h5>
                        <p>35</p>
                        <button type="button" class="btn btn-info">View Details</button>
                    </div>
                </div>

                <div class="column">
                    <div class="card">
                        <h5>Check-out</h5>
                        <p>07</p>
                        <button type="button" class="btn btn-info">View Details</button>
                    </div>
                </div>
                <div class="column">
                    <div class="card">
                        <h5>Cancellations</h5>
                        <p>13</p>
                        <button type="button" class="btn btn-info">View Details</button>
                    </div>
                </div>
                <div class="column">
                    <div class="card">
                        <h5>Pending Payments</h5>
                        <p>1</p>
                        <button type="button" class="btn btn-info">View Details</button>
                    </div>
                </div>
            </div>
        </div>
        <h2>Booking Details</h2>
        <div style="overflow-x:auto;">
            <table>
                <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Number</th>
                    <th>Booking For</th>
                    <th>Travel For Work</th>
                    <th>Check-in</th>
                    <th>Check-out</th>
                    <th>Length of Stay</th>
                    <th>Room Type</th>
                    <th>Guests</th>
                    <th>Rooms</th>
                    <!-- <th>Price</th> Added Price column -->
                    <th>Total Amount</th>
                    <th>Extra Room</th>
                    <th>Room Cancellation</th>

                </tr>
                <?php

                if ($result->rowCount() > 0) {
                    $serial_number = $start_from + 1; // Initialize serial number

                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr id='row_" . $row['id'] . "'>";
                        echo "<td>" . $serial_number . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['number'] . "</td>";
                        echo "<td>" . $row['booking_for'] . "</td>";
                        echo "<td>" . $row['travel_for_work'] . "</td>";
                        echo "<td>" . $row['check_in'] . "</td>";
                        echo "<td>" . $row['check_out'] . "</td>";
                        echo "<td>" . ($row['length_of_stay'] == 1 ? "1 day" : $row['length_of_stay'] . " days") . "</td>";
                        echo "<td>" . $row['room_type'] . "</td>";
                        echo "<td>" . $row['adults'] . " Adults, " . $row['children'] . " Children</td>";
                        echo "<td>" . ($row['rooms'] == 1 ? "1 room" : $row['rooms'] . " rooms") . "</td>";
                        // echo "<td>Rs." . $row['price'] . "<br></td>";
                        echo "<td>Rs." . $row['total_amount'] . "<br></td>";

                        // Guests details
                        $totalAdults = $row['adults'];
                        $totalChildren = $row['children'];

                        $guestsDetails = $totalAdults . " adult" . ($totalAdults > 1 ? "s" : "");

                        if ($totalChildren > 0) {
                            $guestsDetails .= ", " . $totalChildren . " child" . ($totalChildren > 1 ? "ren" : "");
                        }

                        echo "<td><button class='btn btn-success' onclick='openPopup(" . json_encode([
                            'id' => $row['id'],
                            'check_in' => $row['check_in'],
                            'check_out' => $row['check_out'],
                            'length_of_stay' => $row['length_of_stay'],
                            'guests' => $guestsDetails,
                            'room_type' => $row['room_type'],
                            'rooms' => $row['rooms'],
                            'total_amount' => $row['total_amount']
                        ]) . ")'>Add</button><br></td>";

                        echo "<td><button class='btn btn-danger' onclick='cancelRoom(" . $row['id'] . ")'>Cancel</button></td>";

                        echo "</tr>";
                        $serial_number++; // Increment serial number for the next row
                    }
                } else {
                    echo "<tr><td colspan='12'>No results found</td></tr>";
                }
                ?>

            </table>
            <script>
                function openPopup(data) {
                    // Get the modal
                    var modal = document.getElementById("myModal");

                    // Display the modal
                    modal.style.display = "block";
                    console.log("Data Object:", data);

                    // Set the booking details in the form
                    document.getElementById("popupBookingId").value = data.id;
                    document.getElementById("date-in").value = data.check_in;
                    document.getElementById("date-out").value = data.check_out;
                    document.getElementById("guests").value = data.guests;
                    document.getElementById("roomType").value = data.room_type;
                    document.getElementById("rooms").value = data.rooms;
                    document.getElementById("totaldays").value = data.length_of_stay;
                    document.getElementById("totalAmount").value = data.total_amount;

                    // Calculate and display the total days
                    const totalDaysField = document.getElementById("totaldays");
                    const dateIn = new Date(data.check_in);
                    const dateOut = new Date(data.check_out);

                    if (!isNaN(dateIn.getTime()) && !isNaN(dateOut.getTime())) {
                        const timeDiff = dateOut.getTime() - dateIn.getTime();
                        const daysDiff = Math.ceil(timeDiff / (1000 * 60 * 60 * 24));
                        totalDaysField.value = daysDiff;
                    } else {
                        totalDaysField.value = "Not specified";
                    }

                    // Fetch values for adults and children from the table
                    // Fetch values for adults and children from the table
                    const tableRow = document.getElementById("row_" + data.id);
                    const adults = parseInt(tableRow.children[9].innerText); // Assuming adults column is at index 9
                    const children = parseInt(tableRow.children[10].innerText); // Assuming children column is at index 10

                    // Calculate the combined total of adults and children
                    const totalGuests = adults + children;

                    // Set values in the guests input box
                    const guestsField = document.getElementById("guests");
                    guestsField.value = `${adults} Adult${adults > 1 ? "s" : ""}, ${children} Child${children > 1 ? "ren" : ""}`;

                    // Add an event listener to the guests input field to enforce the limit
                    guestsField.addEventListener("input", function() {
                        const enteredGuests = this.value.match(/\d+/g) || [];
                        const totalEnteredGuests = enteredGuests.reduce((acc, curr) => acc + parseInt(curr), 0);


                    });

                    // ... (the rest of your code)
                }

                // Close the modal when clicking outside of it
                window.onclick = function(event) {
                    var modal = document.getElementById("myModal");
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }

                function cancelRoom(rowId, roomType, roomCount) {
                    // Show confirmation message using SweetAlert
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'You won\'t be able to revert this!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, cancel it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Implement logic to cancel the room (e.g., make an AJAX request to the server)
                            var xhr = new XMLHttpRequest();
                            xhr.open("POST", "restore_rooms.php", true);
                            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                            xhr.onreadystatechange = function() {
                                if (xhr.readyState == 4 && xhr.status == 200) {
                                    // Change row color to red
                                    var row = document.getElementById("row_" + rowId);
                                    if (row) {
                                        row.style.backgroundColor = "rgb(250, 152, 155)";
                                        row.style.color = "white";
                                    }
                                }
                            };
                            xhr.send("rowId=" + rowId + "&roomType=" + roomType + "&roomCount=" + roomCount);
                        }
                    });
                }
            </script>
            <script>
                // Function to fetch and update available rooms count
                function updateAvailableRoomsCount() {
                    // Make an AJAX request to fetch available rooms count
                    var xhr = new XMLHttpRequest();

                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4) {
                            console.log("XHR Ready State:", xhr.readyState);

                            if (xhr.status == 200) {
                                try {
                                    // Parse the JSON response
                                    var response = JSON.parse(xhr.responseText);
                                    console.log("Parsed Response:", response);

                                    // Check if the response structure is as expected
                                    if (response.success && response.availableRooms) {
                                        // Update the available rooms count in the HTML for each room type
                                        for (var roomType in response.availableRooms) {
                                            if (response.availableRooms.hasOwnProperty(roomType)) {
                                                // Log for further debugging

                                                // Replace spaces with underscores in roomType
                                                var formattedRoomType = roomType.replace(/\s+/g, '_');

                                                // Assuming you have an element with the ID corresponding to the room type
                                                var roomCountElement = document.getElementById(formattedRoomType + "Count");

                                                if (roomCountElement) {
                                                    // Use textContent to set the text
                                                    roomCountElement.textContent = " " + response.availableRooms[roomType] + " ";
                                                }
                                            }
                                        }
                                    } else {
                                        console.error("Invalid response structure.");
                                    }
                                } catch (error) {
                                    console.error("Error parsing JSON:", error);
                                }
                            } else {
                                console.error("Error fetching data. Status code: " + xhr.status);
                            }
                        }
                    };

                    // Specify the URL of the server-side script to fetch available rooms count
                    xhr.open("GET", "http://localhost/fabrorooms/booking/fabroadmin/update_availability.php", true);
                    xhr.send();
                }

                // Call the function to update available rooms count when the DOM is fully loaded
                document.addEventListener("DOMContentLoaded", function() {
                    updateAvailableRoomsCount();
                });



                function toggleRoomTypeContainer(event) {
                    event.preventDefault();
                    var roomTypeContainer = document.getElementById('roomTypeContainer');
                    roomTypeContainer.style.display = roomTypeContainer.style.display === 'block' ? 'none' : 'block';
                }


                function increment(roomType) {
                    // Extract the room type from the provided roomType parameter

                    const input = document.getElementById(roomType);
                    const incrementButton = document.getElementById(`increment-${roomType}`);
                    const formattedRoomType = extractRoomType(roomType);
                    // Fetch the default count from the HTML element with ID `${formattedRoomType}_RoomCount`
                    const defaultAvailableCountElement = document.getElementById(`${formattedRoomType}_RoomCount`);
                    const defaultAvailableCount = parseInt(defaultAvailableCountElement.textContent, 10) || 4;

                    if (parseInt(input.value, 10) < defaultAvailableCount) {
                        input.value = parseInt(input.value, 10) + 1;
                        updateRoomTypeInput();

                        // Check if the default available count is reached and disable the increment button
                        if (parseInt(input.value, 10) === defaultAvailableCount) {
                            incrementButton.disabled = true;
                        }
                    }
                }

                // Extract the desired room type from the provided roomType parameter
                function extractRoomType(roomType) {
                    const words = roomType.split(/(?=[A-Z])/);
                    const extractedType = words[0].charAt(0).toUpperCase() + words[0].slice(1).toLowerCase();
                    return extractedType;
                }

                // Update the room type input (you can customize this function based on your needs)
                function updateRoomTypeInput() {
                    // Add your logic here if needed
                    console.log("Room type input updated");
                }

                function decrement(roomType) {
                    const input = document.getElementById(roomType);
                    if (parseInt(input.value) > 0) {
                        input.value = parseInt(input.value) - 1;
                        updateRoomTypeInput();
                    }
                }

                async function fetchRoomPrices() {
                    try {
                        const response = await fetch('http://localhost/fabrorooms/booking/fabroadmin/price.php?action=fetchRoomPrices');

                        const data = await response.json();
                        return data;
                    } catch (error) {
                        console.error('Error fetching room prices:', error);
                        return {};
                    }
                }
                async function updateRoomTypeInput() {
                    const roomTypePrices = await fetchRoomPrices();

                    // Update the room type input based on the selected room types
                    const premiumRooms = document.getElementById('premiumRooms').value;
                    const deluxeRooms = document.getElementById('deluxeRooms').value;
                    const doubleRooms = document.getElementById('doubleRooms').value;
                    const luxuryRooms = document.getElementById('luxuryRooms').value;
                    const singleRooms = document.getElementById('singleRooms').value;
                    const smallRooms = document.getElementById('smallRooms').value;

                    const roomTypeInput = document.getElementById('roomType');
                    // Create an array of selected room types
                    const selectedRoomTypes = [{
                            name: 'Premium Room',
                            count: premiumRooms
                        },
                        {
                            name: 'Deluxe Room',
                            count: deluxeRooms
                        },
                        {
                            name: 'Double Room',
                            count: doubleRooms
                        },
                        {
                            name: 'Luxury Room',
                            count: luxuryRooms
                        },
                        {
                            name: 'Single Room',
                            count: singleRooms
                        },
                        {
                            name: 'Small Room',
                            count: smallRooms
                        },
                        // ... (repeat for other room types)
                    ];



                    // Filter out room types with a count of 0
                    const selectedRoomTypesFiltered = selectedRoomTypes.filter(room => room.count > 0);

                    // Create an array of room type strings
                    const updatedRoomTypesArray = selectedRoomTypesFiltered.map(updatedRoom => `${updatedRoom.name} - ${updatedRoom.count}`);

                    // Update the room type input
                    roomTypeInput.value = updatedRoomTypesArray.join(', ');

                    // Calculate the total count by summing all counts
                    const totalRooms = selectedRoomTypesFiltered.reduce((total, room) => total + parseInt(room.count), 0);

                    // Update the "rooms" input field with the total count
                    const roomsInput = document.getElementById('rooms');
                    roomsInput.value = `${totalRooms}`;


                    const totalRoomsInput = document.getElementById('rooms');
                    const totalAmountInput = document.getElementById('totalAmount');
                    const totaldaysElement = document.getElementById('totaldays');

                    // Ensure totaldaysElement exists before proceeding
                    if (totaldaysElement) {
                        const lengthOfStay = parseInt(totaldaysElement.value, 10) || 1; // Default to 1 day if totaldays is not a valid number

                        // Calculate the total count by summing all counts
                        const totalRooms = selectedRoomTypesFiltered.reduce((total, room) => total + parseInt(room.count), 0);

                        // Update the "rooms" input field with the total count
                        totalRoomsInput.value = `${totalRooms}`;

                        // Calculate the total amount based on room type prices, counts, and length of stay
                        const totalAmount = selectedRoomTypesFiltered.reduce((total, room) => {
                            const roomType = room.name
                                .toLowerCase()
                                .replace(/\s+/g, ' ')
                                .replace(/(^\w|\s\w)/g, m => m.toUpperCase()); // Convert room type to title case

                            const priceWithTax = roomTypePrices.roomPrices[roomType];
                            console.log('ddd', priceWithTax);

                            if (priceWithTax !== undefined) {
                                return total + (parseInt(room.count) * priceWithTax * lengthOfStay);
                            } else {
                                console.error(`Price not available for room type: ${room.name}`);
                                return total;
                            }
                        }, 0);

                        // Update the total amount input field
                        totalAmountInput.value = `${totalAmount.toFixed(0)}`;
                    }

                    // Now, you can use totalAmountInteger wherever you need it as an integer

                }

                // Call the updateRoomTypeInput function whenever room types are updated



                document.addEventListener("DOMContentLoaded", function() {
                    updateAvailableRoomsCount();

                });
            </script>
            <script>
                function updateBooking(event) {
                    event.preventDefault();
                    const bookingId = parseInt(document.getElementById("popupBookingId").value, 10);
                    console.log(bookingId);

                    const checkIn = document.getElementById("date-in").value;
                    console.log(checkIn);

                    const checkOut = document.getElementById("date-out").value;
                    console.log(checkOut);

                    const rooms = parseInt(document.getElementById("rooms").value, 10);
                    console.log('rooms', rooms);

                    const lengthOfStay = parseInt(document.getElementById("totaldays").value, 10);
                    console.log(lengthOfStay);

                    const guests = document.getElementById("guests").value;
                    console.log(guests);
                    const [adults, children] = guests.split(',').map(str => parseInt(str.trim(), 10) || 0);

                    const roomType = document.getElementById("roomType").value;
                    console.log(roomType);

                    const childrenCount = getChildrenCount(guests);
                    console.log(childrenCount);

                    const totalAmountInput = document.getElementById("totalAmount");
                    const totalAmount = totalAmountInput ? parseFloat(totalAmountInput.value) || 0 : 0;

                    console.log('ggg', totalAmount);

                    const updatedData = {
                        'booking_id': bookingId,
                        'check_in': checkIn,
                        'check_out': checkOut,
                        'length_of_stay': lengthOfStay,
                        'guests': {
                            'adults': adults,
                            'children': children
                        },
                        'room_type': roomType,
                        'children': childrenCount,
                        'rooms': rooms, // Make sure 'rooms' is defined
                        'total_amount': totalAmount,
                    };

                    console.log("Updated Data:", updatedData);

                    // Send the updated data to the server using AJAX
                    const xhr = new XMLHttpRequest();
                    xhr.open("POST", "update_booking.php", true);
                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                    // Convert the JavaScript object to a JSON string
                    const params = `booking_id=${bookingId}&updatedData=${encodeURIComponent(JSON.stringify(updatedData))}`;

                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4) {
                            // Handle the server response
                            console.log(xhr.responseText);

                            if (xhr.status == 200) {
                                // Check if the response contains the success message
                                if (xhr.responseText.includes("Record updated successfully")) {
                                    // Successful response
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Update Successful!',
                                        text: 'Your booking has been updated successfully.',
                                    }).then(() => {
                                        // Reload the page
                                        window.location.reload();
                                    });
                                } else {
                                    // Error response
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Update Failed!',
                                        text: 'There was an error updating the booking. Please try again.',
                                    });
                                }
                            }
                        }
                    };

                    xhr.send(params);
                }

                // Function to extract children count from the guests string
                function getChildrenCount(guests) {
                    const matches = guests.match(/(\d+) children?/i);
                    return matches ? parseInt(matches[1]) : 0;
                }
            </script>


            <div id="myModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>
                    <form method="post" onsubmit="updateBooking(event); return false;">
                        <!-- Add your form fields here -->
                        <input type="hidden" name="booking_id" id="popupBookingId">
                        <label for="date-in">Check In</label>
                        <input type="text" class="date" id="date-in" name="date-in">
                        <label for="date-out">Check Out</label>
                        <input type="text" class="date" id="date-out" name="date-out">
                        <label for="days">Total days:</label>
                        <input type="text" name="totaldays" id="totaldays" readonly placeholder="Total days">
                        <label for="guests">Guests:</label>
                        <input type="text" name="guests" id="guests" placeholder="Guests">
                        <p id="errorElement" style="color: red;"></p>
                        <div class="select-option">
                            <label for="roomType">Room Type</label>
                            <input type="text" id="roomType" readonly onclick="toggleRoomTypeContainer(event)">
                            <!-- Add this div to display error messages -->
                            <div id="errorMessage" class="error-message"></div>

                            <div id="roomTypeContainer">
                                <!-- Add your room type labels, input boxes, and buttons here -->
                                <div class="number-controls">
                                    <label for="premiumRooms">Premium Rooms <p class="" id="Premium_RoomCount"></p></label>
                                    <button class="decrement-button" style="margin-left:80px" type="button" onclick="decrement('premiumRooms')">-</button>
                                    <input style="width: 35px;margin-top:8px;" type="text" name="premiumRooms" id="premiumRooms" value="0" readonly>
                                    <button id="increment-premiumRooms" class="increment-button" type="button" onclick="increment('premiumRooms')">+</button>
                                </div>
                                <div class="number-controls">
                                    <label for="deluxeRooms">Deluxe Rooms<p class="" id="Deluxe_RoomCount"></p></label>
                                    <button class="decrement-button" style="margin-left:99px" type="button" onclick="decrement('deluxeRooms')">-</button>
                                    <input style="width: 35px;margin-top:8px" type="text" name="deluxeRooms" id="deluxeRooms" value="0" readonly>
                                    <button class="increment-button" id="increment-deluxeRooms" type="button" onclick="increment('deluxeRooms')">+</button>
                                </div>
                                <div class="number-controls">
                                    <label for="doubleRooms">Double Rooms<p class="" id="Double_RoomCount"></p></label>
                                    <button class="decrement-button" style="margin-left:99px" type="button" onclick="decrement('doubleRooms')">-</button>
                                    <input style="width: 35px;margin-top:8px" type="text" name="doubleRooms" id="doubleRooms" value="0" readonly>
                                    <button class="increment-button" id="increment-doubleRooms" type="button" onclick="increment('doubleRooms')">+</button>
                                </div>
                                <div class="number-controls">
                                    <label for="luxuryRooms">Luxury Rooms<p class="" id="Luxury_RoomCount"></p></label>
                                    <button class="decrement-button" style="margin-left:100px" type="button" onclick="decrement('luxuryRooms')">-</button>
                                    <input style="width: 35px;margin-top:8px" type="text" name="luxuryRooms" id="luxuryRooms" value="0" readonly>
                                    <button class="increment-button" id="increment-luxuryRooms" type="button" onclick="increment('luxuryRooms')">+</button>
                                </div>
                                <div class="number-controls">
                                    <label for="singleRooms">Single Rooms<p class="" id="Single_RoomCount"></p></label>
                                    <button class="decrement-button" style="margin-left:109px" type="button" onclick="decrement('singleRooms')">-</button>
                                    <input style="width: 35px;margin-top:8px" type="text" name="singleRooms" id="singleRooms" value="0" readonly>
                                    <button class="increment-button" id="increment-singleRooms" type="button" onclick="increment('singleRooms')">+</button>
                                </div>
                                <div class="number-controls">
                                    <label for="smallRooms">Small Rooms<p class="" id="Small_RoomCount"></p></label>
                                    <button class="decrement-button" style="margin-left:115px" type="button" onclick="decrement('smallRooms')">-</button>
                                    <input style="width: 35px;margin-top:8px" type="text" name="smallRooms" id="smallRooms" value="0" readonly>
                                    <button class="increment-button" id="increment-smallRooms" type="button" onclick="increment('smallRooms')">+</button>
                                </div>

                                <!-- ... Repeat for other room types ... -->
                            </div>
                        </div>
                        <label style="margin-top:-18px" for="rooms">Total Rooms</label>
                        <input type="room" name="rooms" readonly id="rooms">

                        <label for="rooms">Total Amount</label>
                        <input type="text" name="totalAmount" id="totalAmount" placeholder="Total Amount" readonly />


                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>

            <!-- Display pagination links -->
            <ul class="pagination">
                <?php
                // Show "Previous" button
                echo "<li><a href='indexdb.php?page=" . max(1, $page - 1) . "'" . ($page == 1 ? " class='disabled'" : "") . ">&lt;</a></li>";

                // Display numbered pages
                for ($i = 1; $i <= $total_pages; $i++) {
                    echo "<li><a href='indexdb.php?page=" . $i . "'" . ($i == $page ? " class='active'" : "") . ">" . $i . "</a></li>";
                }

                // Show "Next" button
                echo "<li><a href='indexdb.php?page=" . min($total_pages, $page + 1) . "'" . ($page == $total_pages ? " class='disabled'" : "") . ">&gt;</a></li>";
                ?>
            </ul>


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
            <!-- Include SweetAlert library from CDN -->
            <script src="js/sweetalert.js"></script>
            <script src="js/pikaday.min.js"></script>


            <!--  Main JS File -->
            <script src="js/main.js"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var paginationLinks = document.querySelectorAll('.pagination a');
                    paginationLinks.forEach(function(link) {
                        link.addEventListener('mouseenter', function() {
                            this.classList.add('hovered');
                        });
                        link.addEventListener('mouseleave', function() {
                            this.classList.remove('hovered');
                        });
                    });
                });
            </script>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Set default values for Check In and Check Out
                    var today = new Date();
                    var tomorrow = new Date();
                    tomorrow.setDate(tomorrow.getDate() + 1); // Adjusted to 1 day for a range

                    // Set maxDate for Check In to be 90 days from today
                    var maxDateCheckIn = new Date();
                    maxDateCheckIn.setDate(today.getDate() + 90);

                    // Initialize Pikaday for both "Check In" and "Check Out"
                    var pickerIn = new Pikaday({
                        field: document.getElementById('date-in'),
                        minDate: today, // Set minDate to disable previous days
                        maxDate: maxDateCheckIn, // Set maxDate to 90 days from today
                        onSelect: function(date) {
                            // When "Check In" date is selected, manually set the formatted value
                            this.el.value = formatDate(date);
                            // Update "Check Out" options
                            updateCheckOutOptions(date);
                        },
                    });

                    // Initially set "Check Out" datepicker to be 90 days from today
                    var initialMaxDateCheckOut = new Date();
                    initialMaxDateCheckOut.setDate(today.getDate() + 90);

                    var pickerOut = new Pikaday({
                        field: document.getElementById('date-out'),
                        minDate: tomorrow, // Set initial minDate
                        maxDate: initialMaxDateCheckOut, // Set maxDate to 90 days from today
                    });

                    // Update the default values for "Check In" and "Check Out"
                    document.getElementById('date-in').value = formatDate(today);
                    document.getElementById('date-out').value = formatDate(tomorrow);

                    // Make input fields read-only
                    document.getElementById('date-in').readOnly = true;
                    document.getElementById('date-out').readOnly = true;

                    function updateCheckOutOptions(checkInDate) {
                        // Calculate the date to disable (up to 90 days from Check In date)
                        var disabledDate = new Date(checkInDate);
                        disabledDate.setDate(disabledDate.getDate() + 90);

                        // Update "Check Out" datepicker
                        pickerOut.setMinDate(new Date(checkInDate)); // Set minDate to the selected "Check In" date
                        pickerOut.setMaxDate(disabledDate); // Set maxDate to 90 days from the selected "Check In" date

                        // Automatically set the "Check Out" date to be one day after the new "Check In" date
                        var newCheckOutDate = new Date(checkInDate);
                        newCheckOutDate.setDate(newCheckOutDate.getDate() + 1);
                        pickerOut.setDate(newCheckOutDate);
                        document.getElementById('date-out').value = formatDateWithoutComma(newCheckOutDate);
                    }

                    function formatDate(date) {
                        // Format date as "7 December, 2023"
                        return date.toLocaleString('en-US', {
                            day: 'numeric',
                            month: 'long',
                            year: 'numeric'
                        });
                    }

                    function formatDateWithoutComma(date) {
                        // Format date as "7 December 2023" without a comma
                        const day = String(date.getDate()).padStart(2, '0'); // Add leading zeros if needed
                        const month = date.toLocaleString('en-US', {
                            month: 'short'
                        });
                        const year = date.getFullYear();
                        return `${date.toLocaleString('en-US', { weekday: 'short' })} ${month} ${day} ${year}`;
                    }
                });
            </script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const dateInInput = document.getElementById('date-in');
                    const dateOutInput = document.getElementById('date-out');
                    const totalDaysInput = document.getElementById('totaldays');

                    // Function to calculate the total days between two dates
                    function calculateTotalDays() {
                        const dateIn = new Date(dateInInput.value);
                        const dateOut = new Date(dateOutInput.value);

                        if (!isNaN(dateIn.getTime()) && !isNaN(dateOut.getTime())) {
                            const timeDiff = dateOut.getTime() - dateIn.getTime();
                            const daysDiff = Math.ceil(timeDiff / (1000 * 60 * 60 * 24));
                            totalDaysInput.value = daysDiff;
                        } else {
                            // Handle invalid dates
                            totalDaysInput.value = '';
                        }
                    }

                    // Attach event listeners to date inputs
                    dateInInput.addEventListener('change', calculateTotalDays);
                    dateOutInput.addEventListener('change', calculateTotalDays);
                });
            </script>
</body>

</section>
<!--footer-->
<?php
include("footer.php");
?>
<script>
    // Enable dropdown functionality
    $(document).ready(function() {
        $('.dropdown-toggle').dropdown();
    });
</script>
<script src="js/aos.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/glightbox.min.js"></script>
<script src="js/isotope.pkgd.min.js"></script>
<script src="js/swiper-bundle.min.js"></script>
<script src="js/noframework.waypoints.js"></script>
<script src="js/validate.js"></script>
<!-- Include SweetAlert library from CDN -->
<script src="js/sweetalert.js"></script>
<script src="js/pikaday.min.js"></script>
</body>

</html>