<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="This is the Respond Page.">
    <meta name="author" content="lukkawai">
    <meta name="keywords" content="Respond Page">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="300">
    <title>Respond</title>
    <link rel="stylesheet" href="css/respond_style.css">
</head>
<body>

    <form action="respond_status.php" method="POST">
        <h1>Your Respond</h1>
        <div class="notice_detail">
            <textarea rows="6" cols="34" placeholder="Your respond (No more than 100 characters)" name="respond" id="respond" maxlength="100" required></textarea>
        </div>
        <br>
        <input class="submit" type="submit" value="Submit">
        <br>
    </form>

    <div class="box">
        <a href="menu.php"><button>Back To Menu</button></a>
    </div>

</body>
</html>