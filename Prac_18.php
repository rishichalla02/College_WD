<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_registration";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

// Get the search query from the URL
$name = $_GET['name'];

// Query the database for matching users
$sql = "SELECT name, mobile, email FROM registrations WHERE name LIKE ?";
$stmt = $conn->prepare($sql);
$search_term = "%$name%";
$stmt->bind_param("s", $search_term);
$stmt->execute();
$result = $stmt->get_result();

// Check if any rows were returned 
if ($result->num_rows > 0) {
echo "<table>";
echo "<tr><th>Name</th><th>Mobile Number</th><th>Email</th></tr>"; while ($row = $result->fetch_assoc()) {
echo "<tr>";
echo "<td>" . htmlspecialchars($row['name']) . "</td>"; echo "<td>" . htmlspecialchars($row['mobile']) . "</td>"; echo "<td>" . htmlspecialchars($row['email']) . "</td>"; echo "</tr>";
}
echo "</table>";
} else {
echo "No users found";
}

$stmt->close();
$conn->close();
?>
