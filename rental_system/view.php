<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="This is the View Page.">
    <meta name="author" content="lukkawai">
    <meta name="keywords" content="View Page">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="300">
    <title>View</title>
    <link rel="stylesheet" href="css/view_style.css">
</head>
<body>
<?php

    $connect = mysqli_connect("localhost","root","willian1966","rental_system");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // mysqli_real_escape_string for preventing SQL injection
        $login_id = mysqli_real_escape_string($connect, $_POST['login_id']);
        $title_with_underline = mysqli_real_escape_string($connect, $_POST['title']);
        $title = str_replace("_", " ", $title_with_underline);
        $query = "SELECT * FROM rental_system.make_notice WHERE Login_id = '$login_id' AND Title = '$title'";
        $result = mysqli_query($connect, $query);

        $_SESSION['login_id'] = $login_id;
        $_SESSION['title'] = $title;
        
        while($row = mysqli_fetch_assoc($result)){
            echo "<div class = 'table'>";
            echo "<table align='center' border='1'>";
            echo "<caption>Detail Information</caption>";
            echo "<tr><th width='120'>Title:</th><td width='80'>$row[Title]</td><th width='150'>Location:</th><td width='150'>$row[Location]</td></tr>";
            echo "<tr><th>Price: (HKD)</th><td>$$row[Price]</td><th>Contact Number:</th><td>$row[Contact_Number]</td></tr>";
            echo "<tr><th>Home Size (ft" . "<sup>2</sup>" . "):</th><td>$row[Home_Size]</td><th>Number of Room:</th><td>$row[Number_Of_Room]</td></tr>";
            echo "<tr><th colspan='4'>Description</th></tr>";
            echo "<tr><td colspan='4'>$row[Description]</td></tr>";
            echo "</table>";
            echo "</div>";
        }

    }
?>

    <div class="box">
        <a href="respond.php"><button class="respond">Respond</button></a>
        <a href="menu.php"><button class="back">Back</button></a>
    </div>

</body>
</html>