<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="This is the Registration Status Page.">
    <meta name="author" content="lukkawai">
    <meta name="keywords" content="Registration Status Page">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="300">
    <title>Registration Status</title>
    <link rel="stylesheet" href="css/registration_status_style.css">
</head>
<body>

    <?php

        $connect = mysqli_connect("localhost","root","willian1966","rental_system");

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // mysqli_real_escape_string for preventing SQL injection
        $login_id = mysqli_real_escape_string($connect, $_POST['login_id']);
        $password = mysqli_real_escape_string($connect, $_POST['password']);
        $email = mysqli_real_escape_string($connect, $_POST['email']);
        $nickname = mysqli_real_escape_string($connect, $_POST['nickname']);

        $duplicate_login_id = mysqli_query($connect, "SELECT * FROM rental_system.user WHERE Login_id = '$login_id'");

        $duplicate_email = mysqli_query($connect, "SELECT * FROM rental_system.user WHERE Email = '$email'");

        // finding if there is another same login id
        if(mysqli_num_rows($duplicate_login_id) > 0){
            echo "<script> alert('Login ID Has Been Used'); </script>";
        }
        else if(mysqli_num_rows($duplicate_email) > 0){
            echo "<script> alert('Email Has Been Used'); </script>";
        }
        else{
            $query = "INSERT INTO rental_system.user VALUES('$login_id', '$password', '$email', '$nickname')";
            mysqli_query($connect, $query);
            echo "<script> alert('Registration Successful'); </script>";
        }
    }       
    ?>

    <div class="home_box">
        <h1>Back to Home Page</h1>
        <div class="button">
            <a href="index.php"><button class="index_button">Home Page</button></a>
        </div>
    </div>
</body>
</html>