<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "vehicle_registration";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
