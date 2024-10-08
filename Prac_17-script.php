<?php session_start(); include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$username = trim($_POST['username']);
$password = trim($_POST['password']);

// Fetch user from the database
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
$stmt->execute(['username' => $username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Verify password
if ($user && password_verify($password, $user['password'])) {
$_SESSION['username'] = $user['username']; header("Location: Prac_17-welcome.php");
exit();
} else {
echo "Invalid username or password.";
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
</head>
<body>
<form method="POST" action="">
<input type="text" name="username" placeholder="Username" required>
<input type="password" name="password" placeholder="Password" required>
<button type="submit">Login</button>
</form>
</body>
</html>