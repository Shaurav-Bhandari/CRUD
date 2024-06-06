<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $agree_terms = isset($_POST['agree_terms']) ? 1 : 0;

    $sql = "INSERT INTO registrations (first_name, last_name, password, gender, email, contact, address, agree_terms)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $first_name, $last_name, $password, $gender, $email, $contact, $address, $agree_terms);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
