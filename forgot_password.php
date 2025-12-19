<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .password{
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
            width: 280px;
            height: 30px;
            border-radius: 40px;
        }
        .submit{
            width: 280px;
            height: 40px;
            background-color:rgb(75, 106, 13);
            color: white;
            border-radius: 40px;
        }
        .submit2{
            width: 280px;
            height: 40px;
            background-color:rgb(243, 238, 238);
            color: black;
            border-radius: 40px;
        }
        a{
            text-decoration-line: none;
        }
        .link{
            font-size: 15px;
            margin-left: 150px;
            font-family:'Times New Roman', Times, serif
        }
        p{
          margin-left: 50px;  
        }
    </style>
</head>
<body>
    <div class="password">
        <div class="general">
            <div class="all">
            <div class="header">
                <h1><b>Forgot Password</b></h1>
                <span>Enter Email Address</span>
            </div><br><br><br><br><br>
            <div class="info">
            <form method="POST">
            <input type="text" name="email" placeholder=" example@gmail.com" required><br><br><br>
            <button type="submit" name="send" class="submit">Send</button><br><br><br><br>
            <p>Do you have an account?</p>
            <button onclick="window.location.href='sign up.php'" type="button" name="sign up" class="submit2">Sign up</button><br><br>
            </form>

            </div></div>
        </div>
    </div>
</body>
</html>