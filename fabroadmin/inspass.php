<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

require(__DIR__.'/class/logbase.php');

if (isset($_POST['oldpassword']) && isset($_POST['newpassword']) && isset($_POST['confirmpwd'])) {
    $oldpassword = $_POST['oldpassword'];
    $newpassword = $_POST['newpassword'];
    $confirmpassword = $_POST['confirmpwd'];

    if (empty($oldpassword) || empty($newpassword) || empty($confirmpassword)) {
        print json_encode(["success" => false, "message" => "All fields are required"]);
        exit();
    }

    try {
        // Use prepared statements to prevent SQL injection
        $xyz = $conn->prepare("SELECT * FROM admin WHERE password = :oldpassword");
        $xyz->bindParam(':oldpassword', $oldpassword);
        $xyz->execute();
        $aaa = $xyz->rowCount();

        if ($aaa > 0) {
            if ($newpassword != $oldpassword) { // Check if new password is not the same as old password
                if ($confirmpassword == $newpassword) {
                    // Use prepared statements to prevent SQL injection
                    $updateQuery = $conn->prepare("UPDATE admin SET password = :newpassword WHERE password = :oldpassword");
                    $updateQuery->bindParam(':newpassword', $newpassword);
                    $updateQuery->bindParam(':oldpassword', $oldpassword);
                    $updateQuery->execute();
            
                    print json_encode(["success" => true, "message" => "Your new password updated successfully"]);
                } else {
                    print json_encode(["success" => false, "message" => "New password does not match"]);
                }
            } else {
                print json_encode(["success" => false, "message" => "New password should not be the same as the old password"]);
            }
        } else {
            print json_encode(["success" => false, "message" => "Old password does not match"]);
        }
    } catch (PDOException $e) {
        print json_encode(["success" => false, "message" => "Error: " . $e->getMessage()]);
    }
} else {
    print json_encode(["success" => false, "message" => "Invalid request"]);
}
?>