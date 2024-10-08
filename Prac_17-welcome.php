<?php session_start();

if (!isset($_SESSION['username'])) { header("Location: Prac_17-script.php"); 
    exit();
}

echo "Welcome, " . htmlspecialchars($_SESSION['username']) . "!";
?>

<a href="logout.php">Logout</a> Logout scripts
<?php 
session_start(); 
session_destroy();
header("Location: Prac_17-script.php"); 
exit();
?>