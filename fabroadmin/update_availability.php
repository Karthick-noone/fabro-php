<?php

// Allow from any origin
header('Access-Control-Allow-Origin: *');
// Allow headers
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Accept');
// Allow methods
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');

require(__DIR__ . '/class/logbase.php');

// Function to update currently_available based on length_of_stay and last_updated
function updateAvailability($conn) {
    $updateStmt = $conn->prepare("UPDATE rooms SET currently_available = no_of_rooms WHERE last_updated < NOW() - INTERVAL length_of_stay DAY");
    
    // Log information for debugging
    $rowsAffected = $updateStmt->rowCount();
    error_log("Rows affected by update: $rowsAffected");
    
    $updateStmt->execute();
    $updateStmt->closeCursor(); // Close the cursor to free up resources
}

// Prepare and execute the query to fetch available rooms
$stmt = $conn->prepare("SELECT currently_available FROM rooms WHERE room_type = ?");
$stmt->bindParam(1, $roomType, PDO::PARAM_STR);

$roomTypes = ['Deluxe Room', 'Single Room', 'Small Room', 'Premium Room', 'Luxury Room', 'Double Room'];
$availableRooms = [];

// Update availability before fetching
updateAvailability($conn);

foreach ($roomTypes as $roomType) {
    $stmt->execute();
    $stmt->bindColumn('currently_available', $currentlyAvailable);
    $stmt->fetch(PDO::FETCH_BOUND);

    // Log intermediate results
    error_log("Room Type: $roomType, Currently Available: $currentlyAvailable");

    // Store the available rooms count
    $availableRooms[$roomType] = $currentlyAvailable;
}

// Close the statement and connection
$stmt = null;
$conn = null;

// Log the final result
error_log("Available Rooms: " . json_encode($availableRooms));

// Return the available rooms as JSON
echo json_encode(['success' => true, 'availableRooms' => $availableRooms]);
?>