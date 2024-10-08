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

// Delete the user data
$sql = "DELETE FROM registrations WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: Prac_16-2.php"); // Redirect to display page 
exit();

$stmt->close();
$conn->close();
?>
