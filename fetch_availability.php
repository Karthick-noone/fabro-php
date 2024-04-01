<?php
require(__DIR__ . '/admin/class/logbase1.php');

// Fetch room limits from the database
$sql = "SELECT id, currently_available FROM rooms";
$stmt = $conn->prepare($sql);
$stmt->execute();

if ($stmt === false) {
    echo json_encode(["error" => "Query failed: " . implode(", ", $conn->errorInfo())]);
    exit();
}

$roomLimits = [];

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $roomLimits[$row["id"]] = $row["currently_available"];
}

// Close the database connection (no need to close the statement explicitly as it's shared)
$conn = null;

echo json_encode(["roomLimits" => $roomLimits]);
?>