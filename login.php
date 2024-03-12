
<html><body>
<form method="POST">
User Name: <input type="text" name="name"/><br/>
Password: <input type="password" name="pass"/><br/>
<input type="submit" name="submit" value="submit"/><br/>
<h4><a href = "register.php">NEW USER</a></h4>
<h4><a href = "resetpassword.php">Reset Password</a></h4>
</form>
<?php
    include("config.php");
    session_start();
    if(isset($_POST['submit']))
    {
        $uname = $_POST['name'];
        $pass =$_POST['pass']; 
        if(!empty($uname) && !empty($pass))
        {
            $sql = "SELECT username,password FROM emp WHERE 
            username = '$uname' and password = '$pass'";
            $result=mysqli_query($conn,$sql);
            if (mysqli_num_rows($result) == 1)
            {
                $_SESSION['login_user'] = $uname;
                header("location: welcome.php");
            }
            else 
                echo "Your Login Name or Password is invalid<br/>";
        }
        else echo "Name and password can't be empty";
    }
    /*** close connection***/
    mysqli_close($conn);
?>
</body></html>