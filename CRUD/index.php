<?php
include 'db.php';

$result = $pdo->query("SELECT * FROM registrations");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Vehicle Registration CRUD</title>
</head>
<body>
    <div class="container">
        <div class="title">Vehicle Registration Form</div>
        <div class="form">
            <form action="submit.php" method="post">
                <input type="hidden" name="id" id="form-id">
                <input type="hidden" name="action" id="form-action" value="create">
                <div class="input_field">
                    <label for="first_name">First name</label>
                    <input type="text" name="first_name" id="first_name" class="input" required>
                </div>
                <div class="input_field">
                    <label for="last_name">Last name</label>
                    <input type="text" name="last_name" id="last_name" class="input" required>
                </div>
                <div class="input_field">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="input" required>
                </div>
                <div class="input_field">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="input" required>
                </div>
                <div class="input_field">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class="selectbox" required>
                        <option value="">Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="input_field">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="input" required>
                </div>
                <div class="input_field">
                    <label for="contact">Contact</label>
                    <input type="number" name="contact" id="contact" class="input" required>
                </div>
                <div class="input_field">
                    <label for="address">Address</label>
                    <textarea name="address" id="address" class="textarea" required></textarea>
                </div>
                <div class="input_field terms">
                    <label for="agree_terms" class="check">
                        <input type="checkbox" name="agree_terms" id="agree_terms">
                        <span class="checkmark"></span>
                    </label>
                    <p>Agree to terms and conditions</p>
                </div>
                <div class="input_field">
                    <input type="submit" value="Register" class="btn">
                </div>
            </form>
        </div>
        <div class="title">Registered Users</div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['id']); ?></td>
                <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                <td><?php echo htmlspecialchars($row['gender']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><?php echo htmlspecialchars($row['contact']); ?></td>
                <td><?php echo htmlspecialchars($row['address']); ?></td>
                <td>
                    <button onclick="editRecord(<?php echo $row['id']; ?>, '<?php echo htmlspecialchars($row['first_name']); ?>', '<?php echo htmlspecialchars($row['last_name']); ?>', '<?php echo htmlspecialchars($row['gender']); ?>', '<?php echo htmlspecialchars($row['email']); ?>', '<?php echo htmlspecialchars($row['contact']); ?>', '<?php echo htmlspecialchars($row['address']); ?>', <?php echo $row['agree_terms']; ?>)">Edit</button>
                    <form action="submit.php" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="hidden" name="action" value="delete">
                        <input type="submit" value="Delete" onclick="return confirm('Are you sure?')">
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
    <script>
        function editRecord(id, first_name, last_name, gender, email, contact, address, agree_terms) {
            document.getElementById('form-id').value = id;
            document.getElementById('form-action').value = 'update';
            document.getElementById('first_name').value = first_name;
            document.getElementById('last_name').value = last_name;
            document.getElementById('gender').value = gender;
            document.getElementById('email').value = email;
            document.getElementById('contact').value = contact;
            document.getElementById('address').value = address;
            document.getElementById('agree_terms').checked = agree_terms;
            document.querySelector('.btn').value = 'Update';
        }
    </script>
</body>
</html>
