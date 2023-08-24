<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="This is the Registration Page.">
    <meta name="author" content="lukkawai">
    <meta name="keywords" content="Registration Page">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="300">
    <title>Registration</title>
    <link rel="stylesheet" href="css/registration_style.css">
</head>
<body>

    <div class="registration_box">
        <form class="form" action="registration_status.php" method="POST">
            <h1>Registration</h1>
            <div class="user_input">
                <input type="text" placeholder="Login ID" name="login_id" maxlength="9" required>
            </div>
            <div class="user_input">
                <input type="password" placeholder="Password" name="password" maxlength="20" required>
            </div>
            <div class="user_input">
                <input type="email" placeholder="Email" name="email" maxlength="30" required>
            </div>
            <div class="user_input">
                <input type="text" placeholder="Nickname" name="nickname" maxlength="15" required>
            </div>
            <input class="submit" type="submit" value="Register">
        </form>
        <a href="index.php"><button class="back">Back</button></a>
    </div>
    
</body>
</html>