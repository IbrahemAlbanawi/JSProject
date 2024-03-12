
<html><body>
<form method="POST">
User name: <input type="text" name="username"/><br/>
Password: <input type="password" name="password"/><br/>
Email: <input type="text" name="email"/><br/>
<input type="submit" name="insert" value="Insert"/>
</form>
<?php
    include("config.php");
    /*** insert **/
    if(isset($_POST['insert']))
    {
        $uname = $_POST['username'];
        $pass =$_POST['password']; 
        $email =$_POST['email']; 
        if(!empty($uname) && !empty($pass)&& !empty($email))
        {
            $sqlcheck = "SELECT username FROM emp WHERE username = '$uname'";
            $resultcheck = mysqli_query($conn, $sqlcheck); 
            if (mysqli_num_rows($resultcheck) > 0)
                echo ("user name already taken");
            else
            {
                $sql = "INSERT INTO emp(username,password,email)VALUES('$uname', '$pass', '$email')";
                $result = mysqli_query($conn, $sql);
                if ($result == TRUE)
                    header("location: login.php");
                else echo "Save failed<br/>";
            }
        }
        else echo "Name and age can't be empty";
    }
    /*** close connection***/
    mysqli_close($conn);
?>
</body></html>