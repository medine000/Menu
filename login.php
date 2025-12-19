<?php
session_start();
/*if (isset($_SESSION['user_email']) && isset($_COOKIE['user_email']) && !empty($_COOKIE['user_email'])) {
    header("Location: profile.php");
    exit;
}*/
try {
    $conn = mysqli_connect("localhost", "root", "", "food_order_db");
    if (!$conn) {
        throw new Exception("Bağlantı alınmadı: " . mysqli_connect_error());
    }
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            throw new Exception("Sorğu icra edilə bilmədi: " . mysqli_error($conn));
        }
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['user_email'] = $email;

            setcookie("user_email", $email, time() + 86400, "/");
            setcookie("user_password", $password, time() + 86400, "/", "", false, false);


            echo "<script>
               alert('Login uğurludur!');
               window.location.href='profile.php';
            </script>";

        } else {
            echo "<script>
                alert('Email və ya şifrə səhvdir!');
            </script>";
        }
    }
} catch (Exception $e) {
    echo "<script>
        alert('Xəta baş verdi: " . addslashes($e->getMessage()) . "');
    </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .login{
            background-color: rgb(211, 243, 164);
            width: 2000px;
            height: 700px;
        }
        .general{
            background-color: white;
            width: 350px;
            height: 600px;
            display: flex;
            border-radius: 20px;
            justify-content: center;
            margin-left: 600px;
        }
        .header{
            color: rgb(75, 106, 13);
        }
        input{
            width: 250px;
            height: 30px;
            border-radius: 10px;
        }
        .submit{
            width: 250px;
            height: 40px;
            background-color:rgb(75, 106, 13);
            color: white;
            border-radius: 15px;
        }
        .google{
            width: 250px;
            height: 40px;
            background-color:rgb(75, 106, 13);
            color: white;
            border-radius: 15px;
        }
        a{
            text-decoration-line: none;
        }
        .link{
            font-size: 15px;
            margin-left: 150px;
            font-family:'Times New Roman', Times, serif
        }
    </style>
</head>
<body>
    <div class="login">
        <div class="general">
            <div class="all">
            <div class="header">
                <h1><b>Welcome Back!</b></h1>
                <span>Please enter your details</span>
            </div><br><br><br><br><br>
            <div class="info">
            <form method="POST">

            <input type="text" name="email" placeholder="Email or Phone"
            value="<?php echo isset($_COOKIE['user_email']) ? $_COOKIE['user_email'] : ''; ?>" required><br><br>

            <input type="password" name="password" placeholder="Password"
            value="<?php echo isset($_COOKIE['user_password']) ? $_COOKIE['user_password'] : ''; ?>" required><br>

            <a class="link" href="forgot_password.php"">Forgot Password?</a>
            <br><br><br><br>
    
            <button type="submit" name="login" class="submit">Log In</button><br><br>
            <button type="button" class="google">Log in with Google</button><br><br><br><br><br>
            </form>

            <div class="signup-link">
            Don’t have an account? <a href="sign up.php"><b>Sign Up</b></a>
            </div></div></div>
        </div>
    </div>
</body>
</html>
