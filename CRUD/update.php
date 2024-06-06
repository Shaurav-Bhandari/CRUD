<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $agree_terms = isset($_POST['agree_terms']) ? 1 : 0;

    $sql = "UPDATE registrations SET first_name = ?, last_name = ?, gender = ?, email = ?, contact = ?, address = ?, agree_terms = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssi", $first_name, $last_name, $gender, $email, $contact, $address, $agree_terms, $id);

    if ($stmt->execute()) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
