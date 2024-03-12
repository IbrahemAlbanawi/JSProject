<?php
session_start();
if(!isset($_SESSION['login_user'])) {
    header("location:login.php");
    exit();
}

$user_check = $_SESSION['login_user'];
include("config.php");

$ses_sql = mysqli_query($conn,"SELECT username FROM emp WHERE username = '$user_check'");
$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
$login_session = $row['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome, <?php echo $login_session; ?></h1>
    <h2><a href="logout.php">Logout</a></h2>
</body>
</html>
