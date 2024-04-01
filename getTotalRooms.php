<?php
require(__DIR__ . '/admin/class/logbase1.php');

// Your database query
$sql = "SELECT SUM(currently_available) AS totalRooms FROM rooms";

try {
    // Execute the query
    $result = $conn->query($sql);

    if ($result === false) {
        echo json_encode(["error" => "Query failed: " . $conn->errorInfo()[2]]);
        exit();
    }

    // Process the result
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $totalRooms = ($row !== false) ? $row["totalRooms"] : 0;

    // Output the result
    echo json_encode(["totalRooms" => $totalRooms]);
} catch (PDOException $e) {
    // Handle any PDO exceptions
    echo json_encode(["error" => "PDOException: " . $e->getMessage()]);
}
?>
