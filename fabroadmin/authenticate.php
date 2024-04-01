<?php
session_start();
require(__DIR__ . '/../admin/class/logbase1.php');

// Get username and password from the form
$username = $_POST['username'];
$password = $_POST['password'];

// SQL query to check if the user exists using prepared statements
$stmt = $conn->prepare("SELECT * FROM admin WHERE username = :username");
$stmt->bindParam(':username', $username, PDO::PARAM_STR);
$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result !== false) {
    if ($password == $result['password']) {
        // User exists and password matches, set session variables or perform other actions
        $_SESSION['username'] = $username;
        header("Location: indexdb.php");
        exit();
    } else {
        // Invalid password, set an error message
        $_SESSION['error_msg'] = "Invalid password. Please enter a valid password.";
        header("Location: login.php");
        exit();
    }
} else {
    // Invalid username, set an error message
    $_SESSION['error_msg'] = "Invalid username. Please enter a valid username.";    
    
    // If both username and password are wrong, modify the error message
    if ($password !== $result['password']) {
        $_SESSION['error_msg'] = "Invalid username and password. Please enter valid credentials.";
    }

    header("Location: login.php");
    exit();
}
// Close the database connection
$conn = null;
?>