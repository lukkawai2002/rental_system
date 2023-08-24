<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="This is the Delete Notice Page.">
    <meta name="author" content="lukkawai">
    <meta name="keywords" content="Delete Notice Page">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="300">
    <title>Delete Notice</title>
    <link rel="stylesheet" href="css/delete_notice_style.css">
</head>
<body>

    <div class="login_box">
        <form class="form" action="delete_notice_checking.php" method="POST">
            <h1>Confirm</h1>
            <div class="user_input">
                <input type="text" placeholder="Title" name="title" id="title" maxlength="20" required>
            </div>
            <input class="submit" type="submit" value="Delete">
        </form>
        <a href="manage_notice.php"><button class="back">Back</button></a>
    </div>
    
</body>
</html>