<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
        body {
            text-align: center;
            background-color: rgb(15, 15, 15);
            font-family: "Rubik", Verdana, Geneva, Tahoma, sans-serif;
        }

        #htitle {
            font-size: 70px;
            background: linear-gradient(to right, rgb(41, 164, 236), #19dbb1);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            line-height: 1.5;
            margin-bottom: 20px;
            animation: dropdown 0.8s ease-out;
        }

        form {
            background-color: rgb(228, 228, 228);
            display: inline-block;
            text-align: left;
            border: 5px solid rgb(228, 228, 228);
            border-radius: 10px;
            padding: 20px;
            animation: dropdown 0.8s ease-out;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="submit"] {
            width: 200px;
            border: 2px solid rgb(0, 0, 0);
            border-radius: 5px;
            background-color: rgb(255, 255, 255);
            padding: 10px;
            margin-bottom: 10px;
            font-family: "Rubik", Verdana, Geneva, Tahoma, sans-serif;
        }

        input[type="submit"] {
            width: auto;
            padding: 10px 20px;
            border-radius: 7px;
            cursor: pointer;
            background-color: rgb(41, 164, 236);
            color: white;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #19dbb1;
        }

        @keyframes dropdown {
            from {
                transform: translateY(-100%);
            }
            to {
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <h1 id="htitle">تسجيل الدخول</h1>
    <form method="POST">
        <input type="text" name="username" placeholder="User name"/><br/>
        <input type="password" name="password" placeholder="Password"/><br/>
        <input type="email" name="email" placeholder="Email"/><br/>
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
