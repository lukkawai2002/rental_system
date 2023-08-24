<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="This is the Checking Login Page.">
    <meta name="author" content="lukkawai">
    <meta name="keywords" content="Checking Login Page">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="300">
    <title>Checking Login</title>
    <link rel="stylesheet" href="css/checking_login_style.css">
</head>
<body>

    <?php
        $connect = mysqli_connect("localhost","root","willian1966","rental_system");

        if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
            
            $login_id = mysqli_real_escape_string($connect, $_POST['login_id']);
            $password = mysqli_real_escape_string($connect, $_POST['password']);

            $result = mysqli_query($connect, "SELECT * FROM rental_system.user WHERE Login_id = '$login_id' AND Password = '$password'");
            $match = mysqli_fetch_array($result);
            
            $nickname_result = mysqli_query($connect, "SELECT Nickname FROM rental_system.user WHERE Login_id = '$login_id' AND Password = '$password'");
            while($row = mysqli_fetch_assoc($nickname_result)) {
                $nickname = $row["Nickname"];
              }

            if(is_array($match)) {
                setcookie('login_id', $login_id, time() + 86400 * 7);
                setcookie('nickname', $nickname, time() + 86400 * 7);
                echo "<script> alert('Login Successful'); </script>";
                header('Location: menu.php');
            }
            else { ?>

                <div class="home_box">
                    <h1>Invalid Login</h1>
                    <div class="button">
                        <a href="login.php"><button class="login_button">Back to Login Page</button></a>
                    </div>
                </div>

                <?php
            }
        }
    ?>

</body>
</html>