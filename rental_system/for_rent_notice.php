<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="This is the For Rent Notice Page.">
    <meta name="author" content="lukkawai">
    <meta name="keywords" content="For Rent Notice Page">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="300">
    <title>For Rent Notice</title>
    <link rel="stylesheet" href="css/for_rent_notice_style.css">
</head>
<body>
    <?php

        $connect = mysqli_connect("localhost","root","willian1966","rental_system");

        $query = "SELECT Login_id, Title FROM rental_system.make_notice";
        $result = mysqli_query($connect, $query);
        
        echo "<div class='table'>";
        echo "<table>";
        echo "<caption>All The Notice</caption>";
        echo "<tr>";
        echo "<th width='100'>Login ID</th>";
        echo "<th width='200'>Title</th>";
        echo "</tr>";
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td style='text-align: center;'>$row[Login_id]</td>";
            echo "<td style='text-align: center;'>$row[Title]</td>";
            $title = str_replace(" ", "_", $row['Title']);
            echo "<td><form action='view.php' method='POST'><input type='hidden' value = $row[Login_id] name='login_id'><input type='hidden' value = $title name='title'><input type='submit' value='view' name='submit'></form></td>";
            echo "</tr>";
        }
        echo "</table>";

        echo "</div>";
    ?>

    <div class="box">
        <a href="menu.php"><button>Back</button></a>
    </div>

</body>
</html>