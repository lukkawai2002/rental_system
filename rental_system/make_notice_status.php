<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="This is the Make Notice Status Page.">
    <meta name="author" content="lukkawai">
    <meta name="keywords" content="Make Notice status Page">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="300">
    <title>Make Notice Status</title>
    <link rel="stylesheet" href="css/make_notice_status_style.css">
</head>
<body>

    <?php

        $connect = mysqli_connect("localhost","root","willian1966","rental_system");

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // mysqli_real_escape_string for preventing SQL injection
        $title = mysqli_real_escape_string($connect, $_POST['title']);
        $location = mysqli_real_escape_string($connect, $_POST['location']);
        $homesize = mysqli_real_escape_string($connect, $_POST['homesize']);
        $number_of_room = mysqli_real_escape_string($connect, $_POST['number_of_room']);
        $price = mysqli_real_escape_string($connect, $_POST['price']);
        $contact_number = mysqli_real_escape_string($connect, $_POST['contact_number']);
        $description = mysqli_real_escape_string($connect, $_POST['description']);
        $login_id = $_COOKIE['login_id'];
        
        $duplicate_title = mysqli_query($connect, "SELECT * FROM rental_system.make_notice WHERE Title = '$title'");

        $duplicate_location = mysqli_query($connect, "SELECT * FROM rental_system.make_notice WHERE Location = '$location'");

        // check if there are another same title
        if(mysqli_num_rows($duplicate_title) > 0){
            echo "<script> alert('This title has been used by other notices. Please enter another title.'); </script>";
        }
        else if(mysqli_num_rows($duplicate_location) > 0){
            echo "<script> alert('This location has been used by other notices. Please enter another location.'); </script>";
        }
        else{
            $query = "INSERT INTO rental_system.make_notice VALUES(NULL, '$title', '$location', '$homesize', '$number_of_room', '$price', '$contact_number', '$description', '$login_id')";
            mysqli_query($connect, $query);
            echo "<script> alert('Notice Created Successful'); </script>";
        }
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