<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="This is the Delete Notice Checking Page.">
    <meta name="author" content="lukkawai">
    <meta name="keywords" content="Delete Notice Checking Page">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="300">
    <title>Delete Notice Checking</title>
</head>
<body>

    <?php
        $connect = mysqli_connect("localhost","root","willian1966","rental_system");

        if ($_SERVER["REQUEST_METHOD"] == "POST" ) {

            $login_id = $_COOKIE['login_id'];
            $title = mysqli_real_escape_string($connect, $_POST['title']);
            $result = mysqli_query($connect, "SELECT * FROM rental_system.make_notice WHERE Title = '$title' AND Login_id = '$login_id'");

            $match = mysqli_fetch_array($result);

            if(is_array($match)) {
                $delete = mysqli_query($connect, "DELETE FROM rental_system.make_notice WHERE Title = '$title'");
                echo "<script> alert('Delete Successful'); </script>";
                echo "<script> window.location = 'manage_notice.php' </script>";
            }
            else { 
                echo "<script> alert('Invaid Title'); </script>";
                echo "<script> window.location = 'manage_notice.php' </script>";
            }
        }
    ?>

</body>
</html>