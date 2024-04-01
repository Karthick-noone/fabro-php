<?php
// update_booking.php
require(__DIR__ . '/class/logbase1.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ensure 'updatedData' is set and not empty
    if (isset($_POST['updatedData']) && !empty($_POST['updatedData'])) {
        // Decode the JSON string to an associative array
        $updatedData = json_decode($_POST['updatedData'], true);

        // Check if decoding was successful
        if ($updatedData === null && json_last_error() !== JSON_ERROR_NONE) {
            echo json_encode(['success' => false, 'error' => 'Error decoding JSON: ' . json_last_error_msg()]);
            exit;
        }

        // Prepare and execute the update query
        $booking_id = intval($updatedData['booking_id']); // Convert to integer
        $set_clause = '';
        $values = [];

        // Initialize $total_rooms
        $total_rooms = 0;
        foreach ($updatedData as $column => $value) {
            if ($column !== 'booking_id') {
                // Check if the column is 'guests' and update 'adults' and 'children' columns
                if ($column === 'guests') {
                    $set_clause .= "adults = ?, children = ?, ";
                    // Extract adults and children count from the 'guests' array
                    $adults = isset($value['adults']) ? $value['adults'] : 0;
                    $children = isset($value['children']) ? $value['children'] : 0;
                    $values[] = $adults;
                    $values[] = $children;
                } elseif (strpos($column, 'rooms') !== false) {
                    // If the column contains 'Room', it's a room type, and we update the total_rooms count
                    $count = isset($value['count']) ? $value['count'] : 0;
                    $total_rooms += $count;
                } else {
                    $set_clause .= "$column = ?, ";
                    $values[] = $value;
                }
            }
        }

        // Add the total_rooms count to the 'rooms' column
        $set_clause .= "rooms = ?, ";
        $values[] = $updatedData['rooms'];

        $set_clause .= "total_amount = ?";
        $values[] = $updatedData['total_amount'];

        $set_clause = rtrim($set_clause, ", ");
        $values[] = $booking_id;

        $update_sql = "UPDATE bookings SET $set_clause WHERE id = ?";
        $stmt = $conn->prepare($update_sql);

        if ($stmt) {
            // Dynamically bind parameters with proper types
            foreach ($values as $key => $value) {
                $stmt->bindValue($key + 1, $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
            }

            if ($stmt->execute()) {
                // All updates were successful
                echo json_encode(['success' => true, 'message' => 'Record updated successfully']);
            } else {
                echo json_encode(['success' => false, 'error' => 'Error updating record: ' . $stmt->errorInfo()[2]]);
            }

            $stmt->closeCursor(); // Close the cursor
        } else {
            echo json_encode(['success' => false, 'error' => 'Error preparing statement: ' . $conn->errorInfo()[2]]);
        }
    }
}
?>