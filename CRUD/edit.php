<?php
include 'db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM registrations WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record</title>
</head>
<body>
    <h2>Edit Record</h2>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" value="<?php echo $row['first_name']; ?>" required><br>
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" value="<?php echo $row['last_name']; ?>" required><br>
        <label for="gender">Gender</label>
        <select name="gender" required>
            <option value="Male" <?php echo ($row['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
            <option value="Female" <?php echo ($row['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
        </select><br>
        <label for="email">Email</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>
        <label for="contact">Contact</label>
        <input type="number" name="contact" value="<?php echo $row['contact']; ?>" required><br>
        <label for="address">Address</label>
        <textarea name="address" required><?php echo $row['address']; ?></textarea><br>
        <label for="agree_terms">
            <input type="checkbox" name="agree_terms" <?php echo ($row['agree_terms']) ? 'checked' : ''; ?>> Agree to terms and conditions
        </label><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
