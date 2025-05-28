<?php
include("database.php");
session_start();

$bgColor = "";

$user = $_SESSION['user_data'];


$username = htmlspecialchars($user['username']);
$email    = htmlspecialchars($user['email']);
$address  = htmlspecialchars($user['address']);
$zip      = htmlspecialchars($user['zip']);
$city     = htmlspecialchars($user['city']);
$password = password_hash($user['password'], PASSWORD_DEFAULT);
$color= $user['color'];


$sql = $conn->prepare("INSERT INTO user_info (username, email, address, zip, city, password) VALUES (?, ?, ?, ?, ?, ?)");
$sql->bind_param("ssssss", $username, $email, $address, $zip, $city, $password);

if ($sql->execute()) {
    echo "Registration successful!";
    setcookie('bgcolor', $color, time() + (30 * 24 * 60 * 60), "/");
    $bgColor = isset($_COOKIE['bgcolor']) ? $_COOKIE['bgcolor'] : "#ffffff";
   

    
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


