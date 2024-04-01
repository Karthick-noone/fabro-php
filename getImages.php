<?php
require(__DIR__ . '/admin/class/logbase1.php');

// Fetch images from the database (modify the query based on your database schema)
$sql = "SELECT bg_photo FROM picture";
$result = $conn->query($sql);

// Check if there are rows in the result set
if ($result !== false && $result->rowCount() > 0) {
    // Output images as JSON
    $images = $result->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($images);
} else {
    echo json_encode(["message" => "No images found in the database."]);
}

// No need to close the PDO connection explicitly, as it will be closed automatically when the script ends
?>