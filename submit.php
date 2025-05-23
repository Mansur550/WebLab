<?php
include("database.php");
session_start();



$user = $_SESSION['user_data'];

// Sanitize and prepare data
$username = htmlspecialchars($user['username']);
$email    = htmlspecialchars($user['email']);
$address  = htmlspecialchars($user['address']);
$zip      = htmlspecialchars($user['zip']);
$city     = htmlspecialchars($user['city']);
$password = password_hash($user['password'], PASSWORD_DEFAULT);

// Insert into DB
$sql = $conn->prepare("INSERT INTO user_info (username, email, address, zip, city, password) VALUES (?, ?, ?, ?, ?, ?)");
$sql->bind_param("ssssss", $username, $email, $address, $zip, $city, $password);

if ($sql->execute()) {
    echo "Registration successful!";
    
    session_unset();
    session_destroy();

    header("Refresh: 2; URL=index.html");
    exit;
    
} else {
    echo "Error: " . $sql->error;
}

$sql->close();
$conn->close();

?>


