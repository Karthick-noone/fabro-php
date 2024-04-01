<?php

// Include logbase.php for database connection
require(__DIR__ . '/class/logbase1.php');

// Fetch room type prices from the database
function fetchRoomTypePrices($conn) {
    $roomPrices = array();

    // Use prepared statement to prevent SQL injection
    $sql = "SELECT room_type, price, tax FROM rooms";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Convert price and tax to integers and then combine in the array
            $roomPrices[$row['room_type']] = intval($row['price']) + intval($row['tax']);
        }
    }

    return $roomPrices;
}

// Main logic to handle AJAX request for fetching room prices
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["action"]) && $_GET["action"] == "fetchRoomPrices") {
    header('Content-Type: application/json');

    $roomPrices = fetchRoomTypePrices($conn);
    echo json_encode(['roomPrices' => $roomPrices]);

    exit(); // Stop further execution
}

?>