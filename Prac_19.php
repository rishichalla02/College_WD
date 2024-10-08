<?php
header("Content-Type:application/json");

if (isset($_GET['order_id']) && $_GET['order_id'] != "") { include('db.php');

$order_id = $_GET['order_id'];
$result = mysqli_query($con, "SELECT * FROM transactions WHERE order_id=$order_id");

if (mysqli_num_rows($result) > 0) {
$row = mysqli_fetch_array($result);
response($row['order_id'], $row['amount'], $row['response_code'], $row['response_desc']);
} else {
response(NULL, NULL, 200, "No Record Found");
}
mysqli_close($con);
} else {
response(NULL, NULL, 400, "Invalid Request");
}

function response($order_id, $amount, $response_code, $response_desc) {
$response = array( 'order_id' => $order_id, 'amount' => $amount,
'response_code' => $response_code, 'response_desc' => $response_desc
);

echo json_encode($response);
}
?>
<!-- New Section -->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Fetch Transaction Data</title>
</head>
<body>
<h2>Check Transaction Status</h2>
<form method="POST" action="">
<label>Enter Order ID:</label><br>
<input type="text" name="order_id" placeholder="Enter Order ID" required><br><br>
<button type="submit" name="submit">Submit</button>
</form>
<?php
if (isset($_POST['order_id']) && $_POST['order_id'] != "") {
$order_id = $_POST['order_id'];
$url = "http://localhost/rest/api/".$order_id;
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($client);
$result = json_decode($response); echo "<table border='1'>";
echo "<tr><td>Order ID:</td><td>{$result->order_id}</td></tr>"; echo "<tr><td>Amount:</td><td>{$result->amount}</td></tr>";
echo "<tr><td>Response Code:</td><td>{$result->response_code}</td></tr>";
echo "<tr><td>Response Description:</td><td>{$result->response_desc}</td></tr>"; echo "</table>";
}
?>
</body>
</html>

<!-- Connection -->
<?php
$con = mysqli_connect("localhost", "root", "", "rest_example");

if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error(); die();
}
?>