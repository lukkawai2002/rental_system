<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="This is the Manage Notice Page.">
    <meta name="author" content="lukkawai">
    <meta name="keywords" content="Manage Notice Page">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="300">
    <title>Manage Notice</title>
    <link rel="stylesheet" href="css/manage_notice_style.css">
</head>
<body>
    
    <?php
        $login_id = $_COOKIE['login_id'];
        $connect = mysqli_connect("localhost","root","willian1966","rental_system");

        $query = "SELECT * FROM rental_system.make_notice WHERE Login_id = '$login_id'";
        $result = mysqli_query($connect, $query);

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
            echo "<div class='box'>";
            echo "<button id = 'delete_button' onclick = 'delete_notice()'>Delete</button>";
            echo "</div>";
        }
    ?>

    <div class="box">
        <a href="menu.php"><button>Back</button></a>
    </div>

    <script src="javascript/delete_notice.js"></script>
</body>
</html>