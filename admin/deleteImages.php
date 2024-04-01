<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('class/logbase1.php'); // Include the PDO connection file

    if (isset($_POST['deleteImages'])) {
        $selectedImageData = json_decode($_POST['deleteImages'], true);

        // Initialize an array to store any potential errors
        $errors = [];

        // Iterate through selected image data and delete the records from the database and the files from the server
        foreach ($selectedImageData as $imageData) {
            // Prepare the SQL statement to avoid SQL injection
            $sql = "DELETE FROM picture WHERE id = :imageId";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':imageId', $imageData['id']);
            $result = $stmt->execute();

            if (!$result) {
                // If the deletion query fails, add the error message to the errors array
                $errors[] = 'Error deleting image with ID ' . $imageData['id'] . ': ' . implode(":", $stmt->errorInfo());
            }

            // Delete the image file from the server (if it exists)
            $imagePath = "../images/slider_images/" . $imageData['fileName'];
            if (file_exists($imagePath)) {
                if (!unlink($imagePath)) {
                    // If the file deletion fails, add an error message to the errors array
                    $errors[] = 'Error deleting image file: ' . $imagePath;
                }
            }
        }

        if (empty($errors)) {
            // If there are no errors, redirect back to wallpaper.php
            header('Location: wallpaper.php');
            exit();
        } else {
            // If there are errors, return them as a JSON response
            echo json_encode(['errors' => $errors]);
        }
    }
} else {
    header('HTTP/1.1 405 Method Not Allowed');
    exit;
}
?>
