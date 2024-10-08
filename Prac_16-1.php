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

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO registrations (name, dob, gender, email, mobile, address, state, education, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssss", $name, $dob, $gender, $email, $mobile, $address, $state, $education,
$password);

// Set parameters and execute
$name = $_POST['name'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$address = $_POST['address'];
$state = $_POST['state'];
$education = $_POST['education'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

$stmt->execute();
$stmt->close();
$conn->close();

header("Location: display.php"); // Redirect to display page exit();
?>

Display data:
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

$sql = "SELECT * FROM registrations";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Registration Data</title>
</head>
<body>
<h1>User Registration Data</h1>
<table border="1" cellpadding="10">
<tr>
<th>ID</th>
<th>Name</th>
<th>Date of Birth</th>
<th>Gender</th>
<th>Email</th>
<th>Mobile</th>
<th>Address</th>
<th>State</th>
<th>Education</th>
<th>Actions</th>
</tr>
<?php
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
 
echo "<tr>
<td>" . $row['id'] . "</td>
<td>" . $row['name'] . "</td>
<td>" . $row['dob'] . "</td>
<td>" . $row['gender'] . "</td>
<td>" . $row['email'] . "</td>
<td>" . $row['mobile'] . "</td>
<td>" . $row['address'] . "</td>
<td>" . $row['state'] . "</td>
<td>" . $row['education'] . "</td>
<td>
<a href='edit.php?id=" . $row['id'] . "'>Edit</a> |
<a href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</a>
</td>
</tr>";
}
} else {
echo "<tr><td colspan='10'>No records found.</td></tr>";
}
?>
</table>
</body>
</html>

<?php
$conn->close();
?>
