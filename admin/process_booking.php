<?php
require(__DIR__ . '/class/logbase1.php');

function sendUpdateRequest($url, $data)
{
    $ch = curl_init($url);

    if ($ch === false) {
        return false;
    }

    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    $response = curl_exec($ch);

    if ($response === false) {
        echo "Error sending request to $url: " . curl_error($ch);
        curl_close($ch);
        return false;
    }

    curl_close($ch);

    return $response;
}
$error = ''; // Initialize the $error variable

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    file_put_contents('received_data.log', file_get_contents("php://input"));

    $name = $data['name'] ?? null;
    $number = $data['number'] ?? null;
    $booking_for = $data['booking_for'] ?? null;
    $travel_for_work = $data['travel_for_work'] ?? null;
    $roomDetails = $data['roomDetails'] ?? null;

    if ($roomDetails) {
        $checkIn = $roomDetails['checkIn'] ?? null;
        $checkOut = $roomDetails['checkOut'] ?? null;

        $checkInDate = new DateTime($checkIn);
        $checkOutDate = new DateTime($checkOut);
        $lengthOfDay = $checkInDate->diff($checkOutDate )->days;

        $roomTypes = isset($data['roomTypes']) ? $data['roomTypes'] : [];
        $totalAmount = isset($data['totalAmount']) ? $data['totalAmount'] : 0;
        $prices = isset($data['prices']) ? $data['prices'] : [];
        $numberOfRooms = isset($data['numberOfRooms']) ? $data['numberOfRooms'] : [];

        $combinedRoomTypes = [];
        $price = 0;
        $rooms = 0;

        for ($i = 0; $i < count($roomTypes); $i++) {
            $combinedRoomTypes[] = $roomTypes[$i] . ' - ' . $numberOfRooms[$i];
            $price += $prices[$i] * $numberOfRooms[$i];
            $rooms += $numberOfRooms[$i];
        }




        $roomTypesString = implode(', ', $combinedRoomTypes);

        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO bookings (name, number, booking_for, travel_for_work, room_type, check_in, check_out, rooms, adults, children, price, length_of_stay, total_amount) VALUES (:name, :number, :booking_for, :travel_for_work, :room_type, :check_in, :check_out, :rooms, :adults, :children, :price, :length_of_stay, :total_amount)");

        // Bind parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':number', $number);
        $stmt->bindParam(':booking_for', $booking_for);
        $stmt->bindParam(':travel_for_work', $travel_for_work);
        $stmt->bindParam(':room_type', $roomTypesString);
        $stmt->bindParam(':check_in', $checkIn);
        $stmt->bindParam(':check_out', $checkOut);
        $stmt->bindParam(':rooms', $rooms);
        $stmt->bindParam(':adults', $roomDetails['guests']['adults']);
        $stmt->bindParam(':children', $roomDetails['guests']['children']);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':length_of_stay', $lengthOfDay);
        $stmt->bindParam(':total_amount', $totalAmount);

        if ($stmt->execute()) {
            $stmt = null; // Close PDO statement

            // Display JSON success response
            echo json_encode(['success' => true, 'message' => 'Booking Successful!', 'roomTypes' => $roomTypesString, 'price' => $price, 'rooms' => $rooms]);

            $updateData = [
                'roomTypes' => $roomTypes,
                'numberOfRooms' => $numberOfRooms,
                'lengthOfStay' => $lengthOfDay . ' ' . ($lengthOfDay == 1 ? 'day' : 'days'),
            ];  

            $updateResponse = sendUpdateRequest('http://localhost/booking/update_rooms.php', $updateData);

            if ($updateResponse !== false) {
                $updateResponseDecoded = json_decode($updateResponse, true);

                if (json_last_error() === JSON_ERROR_NONE && is_array($updateResponseDecoded)) {
                    if ($updateResponseDecoded['success']) {
                        echo "Available rooms updated successfully.";
                    } else {
                        echo "Error updating available rooms: " . $updateResponseDecoded['message'];
                    }
                } else {
                    echo "Error decoding JSON response from update_rooms.php.";
                }
            } else {
                $curlError = curl_error($ch);
                if ($curlError) {
                    echo "Curl error: " . $curlError;
                } else {
                    echo "Error sending request to update_rooms.php.";
                }
            }
        } else {
            
            echo json_encode(['success' => false, 'message' => 'Error: ' . $stmt->$error]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid or missing data in the request.']);
    }
} else {
    echo "Invalid request method.";
}
?>