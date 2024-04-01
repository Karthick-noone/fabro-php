<?php
require_once('class/logbase1.php');

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle file upload
    if (isset($_FILES['wallpaper'])) {
        $file = $_FILES['wallpaper'];

        if ($file['error'] === UPLOAD_ERR_OK) {
            // Generate a unique filename using a timestamp
            $filename = time() . '_' . $file['name'];
            $tmp_name = $file['tmp_name'];

            // Define the paths for the two folders
            $folder1 = "../images/gallery_images/";

            // Move the uploaded file to the first folder
            $destination1 = $folder1 . $filename;
            move_uploaded_file($tmp_name, $destination1);

            // Store the image in the database
            $stmt = $conn->prepare("INSERT INTO gallery (bg_photo, imagepath) VALUES (?, ?)");
            $stmt->bindParam(1, $filename);
            $stmt->bindParam(2, $destination1);
            $stmt->execute();

            // Redirect to the index page after successful update
            header('Location: gallery.php');
            exit;
        }
    }
}

// Fetch and prepare the image URLs after storing the new image
$updatedImages = array();

$sql = "SELECT bg_photo FROM gallery"; // Replace with your actual query

$result = $conn->query($sql);
if ($result) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $updatedImages[] = $row['bg_photo'];
    }
} else {
    // Handle the database query error if needed
    echo "Error fetching images: " . $conn->errorInfo()[2];
}

// No need to close the connection in PDO

// Return the updated image URLs as a JSON response
header('Content-Type: application/json');
echo json_encode($updatedImages);
?>
