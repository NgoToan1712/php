<?php
require_once 'connect.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];

    if ($password !== $repassword) {
        echo '2 mật khẩu không giống nhau';
        header("refresh: 2; url= register.php");
        die();
    }

    $password = sha1($password);
    $query = "SELECT * FROM users WHERE username = ?;";
    $result = $conn->prepare($query);
    $result->bind_param("s", $username);
    $result->execute();
    $row = $result->get_result()->fetch_all();
    if (!count($row)) {
        session_start();
        $_SESSION['login'] = 1;
        $query = "INSERT INTO users(username,password) VALUES (?, ?);";
        $result = $conn->prepare($query);
        $result->bind_param("ss", $username, $password);
        $result->execute();
        echo 'Đăng ký thành công';
        header("refresh: 2; url= home.php");
        die();
    } else {
        echo "Đã tồn tại tài khoản $username với password là 'hehehehe' ";
        header("refresh: 2; url= login.php");
        die();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        label,
        input[type="text"],
        input[type="password"] {
            display: inline-block;
            vertical-align: middle;
        }


        body,
        html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .login-container {
            width: 500px;
            margin: 100px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        input[type="password"] {
            width: 94%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button {
            width: 50%;
            margin: 10px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        a {
            color: white;
            text-decoration: none;
            padding: 10px 90px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Register</h2>
        <form action="register.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="repassword">Confirmed Password:</label>
            <input type="password" id="repassword" name="repassword" required>


            <button type="submit" name="register">Register</button>
        </form>
        <button>
            <a href="login.php">Login</a>
        </button>
    </div>
</body>

</html>