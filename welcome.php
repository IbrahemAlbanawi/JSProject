<?php
   include('session.php');
?>
<html> <body>
        <center>
        <h1>Welcome to my Page </h1> 
        <h2><a href = "logout.php">Sign Out</a></h2>
        </center>
</body></html>
<?php
   session_start();
   
   if(session_destroy()) {
      header("Location: login.php");
   }
?>
<?php
    include("config.php");
   session_start();
   $user_check = $_SESSION['login_user'];
   $ses_sql = mysqli_query($conn,"select username from emp 
   where username = '$user_check' ");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $login_session = $row['username'];
   if(!isset($_SESSION['login_user']))
    {
        header("location:login.php");
        die();
    }
?>