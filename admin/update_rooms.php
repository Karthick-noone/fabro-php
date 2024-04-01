<?php

// Function to update available rooms
function updateAvailableRooms($data, $conn)
{
    // Loop through the room types and update available rooms
    foreach ($data['roomTypes'] as $index => $roomType) {
        // Fetch the currently available count and length_of_stay from the database
        $stmt = $conn->prepare("SELECT currently_available, length_of_stay FROM rooms WHERE room_type = ?");
        $stmt->execute([$roomType]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        $currentlyAvailable = $result['currently_available'] ?? 0;
        $lengthOfStay = $result['length_of_stay'] ?? 1; // Assuming a default length of stay if not found

        // Log debugging information before update
        file_put_contents('update_rooms_debug_before.log', "Before Update - Room Type: $roomType, Currently Available: $currentlyAvailable, Length of Stay: $lengthOfStay" . PHP_EOL, FILE_APPEND);

        // Update the available rooms count considering the length of stay
        $newAvailableCount = $currentlyAvailable - ($data['numberOfRooms'][$index] * $lengthOfStay);

        // Log debugging information before update
        file_put_contents('update_rooms_debug_before.log', "Before Update - Room Type: $roomType, Currently Available: $currentlyAvailable, Length of Stay: $lengthOfStay, New Available Count: $newAvailableCount" . PHP_EOL, FILE_APPEND);

        // Update the length_of_stay in the rooms table
        $stmt = $conn->prepare("UPDATE rooms SET currently_available = ?, length_of_stay = ? WHERE room_type = ?");
        $stmt->execute([$newAvailableCount, $lengthOfStay, $roomType]);

        if ($stmt->rowCount() === 0) {
            // Log the error and send an error response
            file_put_contents('update_rooms_error.log', 'Error updating rooms: Room type not found - ' . $roomType . PHP_EOL, FILE_APPEND);
            echo json_encode(['success' => false, 'message' => 'Error updating rooms: Room type not found - ' . $roomType]);
            exit; // Stop execution to prevent further output
        }

        // Log debugging information after update
        file_put_contents('update_rooms_debug_after.log', "After Update - Room Type: $roomType, Currently Available: $newAvailableCount" . PHP_EOL, FILE_APPEND);
    }

    return json_encode(['success' => true, 'message' => 'Available rooms updated successfully.']);
}

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the JSON data from the request body
    $data = json_decode(file_get_contents("php://input"), true);
    file_put_contents('update_rooms_data.log', file_get_contents("php://input"));

    // Include the database connection from logbase1.php
    require(__DIR__ . '/class/logbase1.php'); // Adjust the path as needed

    // Update available rooms
    $response = updateAvailableRooms($data, $conn);

    // Log the response for debugging
    file_put_contents('update_rooms_response.log', $response . PHP_EOL, FILE_APPEND);

    // Return the response
    echo $response;
} else {
    echo "Invalid request method.";
}
?>