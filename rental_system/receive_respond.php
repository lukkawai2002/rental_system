<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="This is the Receive Respond Page.">
    <meta name="author" content="lukkawai">
    <meta name="keywords" content="Receive Respond Page">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="300">
    <title>Receive Respond</title>
    <link rel="stylesheet" href="css/receive_respond_style.css">
</head>
<body>

    <?php

        $connect = mysqli_connect("localhost","root","willian1966","rental_system");

    
        $login_id = $_COOKIE['login_id'];

        $query = mysqli_query($connect, "SELECT * FROM rental_system.make_notice m, rental_system.respond r WHERE m.id = r.Notice_id AND m.Login_id = '$login_id';");

        while($row = mysqli_fetch_assoc($query)){

        
            echo "<div class = 'table'>";
            echo "<table align='center' border='1'>";
            echo "<caption>$row[Title] Respond</caption>";
            echo "<tr><th width='50'>Title:</th><td width='100'>$row[Title]</td><th width='100'>Location:</th><td width='150'>$row[Location]</td></tr>";
            echo "<tr><th>Respondent:</th><td>$row[Send_id]</td><th>Contact Number:</th><td>$row[Contact_Number]</td></tr>";
            echo "<tr><th colspan='4'>Respond:</th></tr>";
            echo "<tr><td colspan='4'>$row[Respond]</td></tr>";
            echo "</table>";
            echo "</div>";
            echo '<br><br>';
        }

    ?>

    <div class="box">
        <a href="menu.php"><button class="back_to_menu">Back To Menu</button></a>
    </div>

</body>
</html>