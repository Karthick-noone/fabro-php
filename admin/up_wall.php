<?php
// Include the class file to access the database connection
require_once('class/logbase1.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the posted data
    $id = $_POST['id'];
    
    $sql = "";
    $parameters = [];

    // Check if a new image file was uploaded
    if (isset($_FILES['new_image']) && $_FILES['new_image']['error'] == 0) {
        // Handle the new image upload
        $imageName = $_FILES['new_image']['name'];
        $imageFolder = 'images/gallery_images/'; // Adjust the folder path as needed
        $newImagePath = '../' . $imageFolder . $imageName;
        move_uploaded_file($_FILES['new_image']['tmp_name'], $newImagePath);

        // Update the image path in the database
        $sql = "UPDATE gallery SET bg_photo = :newImagePath, imagepath = :imagepathh WHERE id = :id";   
        $parameters = [
            ':imagepathh' => $newImagePath, 
            ':newImagePath' => $imageName, // Store relative path in the database

            ':id' => $id
        ];
    } 
    $stmt = $conn->prepare($sql);

    if ($stmt->execute($parameters)) {
        echo "Record updated successfully";
        header("Location: gallery.php"); // Redirect to gallery.php
        exit();
    } else {
        echo "Error updating record";
    }
}
?>
