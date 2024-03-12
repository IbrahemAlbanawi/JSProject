<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="POST">
        User Name: <input type="text" name="username"/><br/>
        Password: <input type="password" name="password"/><br/>
        <input type="submit" name="submit" value="Submit"/><br/>
        <h4><a href="register.php">New User</a></h4>
        <h4><a href="resetpassword.php">Reset Password</a></h4>
    </form>
    <?php
    include("config.php");
    session_start();

    if(isset($_POST['submit'])) {
        $uname = $_POST['username'];
        $pass = $_POST['password']; 

        if(!empty($uname) && !empty($pass)) {
            $sql = "SELECT username, password FROM emp WHERE username = '$uname'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                if (password_verify($pass, $row['password'])) {
                    $_SESSION['login_user'] = $uname;
                    header("location: welcome.php");
                    exit();
                } else {
                    echo "Your Login Name or Password is invalid";
                }
            } else {
                echo "Your Login Name or Password is invalid";
            }
        } else {
            echo "Name and password can't be empty";
        }
    }
    mysqli_close($conn);
    ?>
</body>
</html>
