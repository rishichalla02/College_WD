<?php
session_start(); include 'Prac_17-configuration.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$username = trim($_POST['username']);
$password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

$stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username,
:password)");
$stmt->execute(['username' => $username, 'password' => $password]);

echo "User registered successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>
</head>
<body>
<form method="POST" action="">
<input type="text" name="username" placeholder="Username" required>
<input type="password" name="password" placeholder="Password" required>
<button type="submit">Register</button>
</form>
</body>
</html>