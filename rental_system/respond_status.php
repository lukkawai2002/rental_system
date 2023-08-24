<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="This is the Respond Status Page.">
    <meta name="author" content="lukkawai">
    <meta name="keywords" content="Respond Status Page">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="300">
    <title>Respond Status</title>
    <link rel="stylesheet" href="css/respond_status_style.css">
</head>
<body>

    <?php

        $connect = mysqli_connect("localhost","root","willian1966","rental_system");

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // mysqli_real_escape_string for preventing SQL injection
            $login_id = mysqli_real_escape_string($connect, $_COOKIE['login_id']);
            $respond = mysqli_real_escape_string($connect, $_POST['respond']);

            $get_create_notice_id = mysqli_query($connect, "SELECT * FROM rental_system.make_notice WHERE Title = '$_SESSION[title]'");

            while($row = mysqli_fetch_assoc($get_create_notice_id)){
                $query = "INSERT INTO rental_system.respond VALUES(NULL, '$respond', '$login_id', '$row[Login_id]' , '$row[id]')";
                mysqli_query($connect, $query);
            }
            

            echo "<script> alert('Respond Submitted'); </script>";
    }       
    ?>

    <div class="menu_box">
        <h1>Back to Menu Page</h1>
        <div class="button">
            <a href="menu.php"><button class="menu_button">Menu Page</button></a>
        </div>
    </div>
</body>
</html>