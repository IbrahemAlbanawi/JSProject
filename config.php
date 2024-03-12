<?php
define('servername', 'localhost');
define('username', 'root');
define('password', '');
$dbname = "w16l2";

$conn = new mysqli(servername, username, password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
