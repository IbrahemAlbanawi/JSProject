<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <form method="POST">
        User name: <input type="text" name="username"/><br/>
        Password: <input type="password" name="password"/><br/>
        Email: <input type="email" name="email"/><br/>
        <input type="submit" name="register" value="Register"/>
    </form>
    <?php
    include("config.php");

    if(isset($_POST['register'])) {
        $uname = $_POST['username'];
        $pass = $_POST['password'];
        $email = $_POST['email'];

        if(!empty($uname) && !empty($pass) && !empty($email)) {
            $sqlcheck = "SELECT username FROM emp WHERE username = '$uname'";
            $resultcheck = mysqli_query($conn, $sqlcheck); 

            if (mysqli_num_rows($resultcheck) > 0) {
                echo ("Username already taken");
            } else {
                $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
                $sql = "INSERT INTO emp (username, password, email) VALUES ('$uname', '$hashed_password', '$email')";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    header("location: login.php");
                    exit();
                } else {
                    echo "Registration failed";
                }
            }
        } else {
            echo "All fields are required";
        }
    }
    mysqli_close($conn);
    ?>
</body>
</html>
