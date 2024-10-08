<?php
$servername = "localhost"; // Database server name
$username = "root";	// Database username
$password = "";	// Database password
$dbname = "user_registration"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

// Get the id from the URL
$id = $_GET['id'];

// Fetch the user data
$sql = "SELECT * FROM registrations WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
// Update user data
$name = $_POST['name'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$address = $_POST['address'];
$state = $_POST['state'];
$education = $_POST['education'];

$updateSql = "UPDATE registrations SET name=?, dob=?, gender=?, email=?, mobile=?, address=?, state=?, education=? WHERE id=?";
$updateStmt = $conn->prepare($updateSql);
$updateStmt->bind_param("sssssisss", $name, $dob, $gender, $email, $mobile, $address, $state,
$education, $id);
$updateStmt->execute();

header("Location: Prac_16-2.php"); 
exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Edit User</title>
</head>
<body>
<h1>Edit User</h1>
<form method="post">
Name: <input type="text" name="name" value="<?php echo $user['name']; ?>" required /><br> Date Of Birth: <input type="date" name="dob" value="<?php echo $user['dob']; ?>" required /><br> Gender:
<input type="radio" name="gender" value="Male" <?php echo ($user['gender'] == 'Male') ? 'checked' : '';
?> required />Male
<input type="radio" name="gender" value="Female" <?php echo ($user['gender'] == 'Female') ? 'checked' : ''; ?> required />Female<br>
Email: <input type="email" name="email" value="<?php echo $user['email']; ?>" required /><br> Mobile: <input type="tel" name="mobile" value="<?php echo $user['mobile']; ?>" required /><br> Address: <textarea name="address"><?php echo $user['address']; ?></textarea><br>
State: <select name="state" required>
<option <?php echo ($user['state'] == 'Andhra Pradesh') ? 'selected' : ''; ?>>Andhra Pradesh</option>
<option <?php echo ($user['state'] == 'Arunachal Pradesh') ? 'selected' : ''; ?>>Arunachal Pradesh</option>
<option <?php echo ($user['state'] == 'Assam') ? 'selected' : ''; ?>>Assam</option>
<option <?php echo ($user['state'] == 'Bihar') ? 'selected' : ''; ?>>Bihar</option>
<option <?php echo ($user['state'] == 'Chhattisgarh') ? 'selected' : ''; ?>>Chhattisgarh</option>
<option <?php echo ($user['state'] == 'Goa') ? 'selected' : ''; ?>>Goa</option>
<option <?php echo ($user['state'] == 'Gujarat') ? 'selected' : ''; ?>>Gujarat</option>
<option <?php echo ($user['state'] == 'Haryana') ? 'selected' : ''; ?>>Haryana</option>
<option <?php echo ($user['state'] == 'Himachal Pradesh') ? 'selected' : ''; ?>>Himachal Pradesh</option>
<option <?php echo ($user['state'] == 'Jharkhand') ? 'selected' : ''; ?>>Jharkhand</option>
<option <?php echo ($user['state'] == 'Karnataka') ? 'selected' : ''; ?>>Karnataka</option>
<option <?php echo ($user['state'] == 'Kerala') ? 'selected' : ''; ?>>Kerala</option>
</select><br>
Education: <input type="text" name="education" value="<?php echo $user['education']; ?>" required
/><br>
<input type="submit" value="Update" />
</form>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
