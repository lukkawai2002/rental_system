<?php
    session_start();
    // if there is login_id in cookie, that's mean the cookie is not deleted and user did not logout
    // it will directly go to main.php and do not need to login
    if(!empty($_COOKIE['login_id'])) {
        if($_COOKIE['login_id']) {
            header('Location: menu.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="This is the Login Page.">
    <meta name="author" content="lukkawai">
    <meta name="keywords" content="Login Page">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="300">
    <title>Login</title>
    <link rel="stylesheet" href="css/login_style.css">
</head>
<body>

    <div class="login_box">
        <form class="form" action="checking_login.php" method="POST">
            <h1>Login</h1>
            <div class="user_input">
                <input type="text" placeholder="Login ID" name="login_id" maxlength="9" required>
            </div>
            <div class="user_input">
                <input type="password" placeholder="Password" name="password" maxlength="20" required>
            </div>
            <input class="submit" type="submit" value="Login">
        </form>
        <a href="index.php"><button class="back">Back</button></a>
    </div>
    
</body>
</html>