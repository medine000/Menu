<?php
$conn = mysqli_connect("localhost", "root", "", "food_order_db");

if (!$conn) {
    die("Bağlantı alınmadı: " . mysqli_connect_error());
}

if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        echo "<script>
            alert('Bu email artıq qeydiyyatdan keçib!');
        </script>";
    } else {
        $insert = mysqli_query($conn, "INSERT INTO users (name, email, password) VALUES ('$username', '$email', '$password')");
        if ($insert) {
            echo "<script>alert('Qeydiyyat uğurludur!'); window.location='login.php';</script>";
        } else {
            echo "<script>
                  alert('Xəta baş verdi!');
               </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        .signup{
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
        a{
            text-decoration-line: none;
        }
    </style>
</head>
<body>
    <div class="signup">
        <div class="general">
            <div class="all">
                <div class="header">
                    <h1><b>Create Account</b></h1>
                    <span>Fill in your details</span>
                </div><br><br><br><br><br>
                <div class="info">
                    <form method="POST">
                        <input type="text" name="username" placeholder="Username" required><br><br>
                        <input type="email" name="email" placeholder="Email" required><br><br>
                        <input type="password" name="password" placeholder="Password" required><br><br><br><br><br>

                        <button type="submit" name="signup" class="submit">Sign Up</button><br><br>
                    </form>

                    <div class="login-link">
                        Already have an account? <a href="login.php"><b>Log In</b></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
