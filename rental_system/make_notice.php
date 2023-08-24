<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="This is the Make Notice Page.">
    <meta name="author" content="lukkawai">
    <meta name="keywords" content="Make Notice Page">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="300">
    <title>Make Notice</title>
    <link rel="stylesheet" href="css/make_notice_style.css">
</head>
<body>
    <header>
        <h1>Make Your Notice</h1>
        <h2>Please enter the information</h2>
    </header>
    
    <form class="form" action="make_notice_status.php" method="POST">
        <div class="container">
        <label for="title">Enter the Title:</label>
        <div class="notice_detail">
            <input type="text" placeholder="Title" name="title" id="title" maxlength="20" required>
        </div>
        <label for="location">Enter the Location:</label>
        <div class="notice_detail">
            <input type="text" placeholder="Location" name="location" id="location" maxlength="30" required>
        </div>
        <label for="homesize">Enter the Home Size (ft<sup>2</sup>):</label>
        <div class="notice_detail">
        <input type="number" placeholder="Home Size (1 - 99999)" name="homesize" id="homesize" min="1" max="99999" oninput="validity.valid||(value='');" required>
        </div>
        <label for="number_of_room">Enter the Number of Room:</label>
        <div class="notice_detail">
        <input type="number" placeholder="Number of Room (0 - 20)" name="number_of_room" id="number_of_room" min="0" max="20" oninput="validity.valid||(value='');" required>
        </div>
        <label for="price">Enter the Price: (HKD)</label>
        <div class="notice_detail">
            <!-- prevent user input 0 and negative number -->
        <input type="number" placeholder="Price ($1 - $99999)" name="price" id="price" min="1" max="99999" oninput="validity.valid||(value='');" required>
        </div>
        <label for="contact_number">Enter the Contact Number:</label>
        <div class="notice_detail">
            <!-- prevent user input string or other symbol -->
            <input type="tel" placeholder="Hong Kong Phone Number" name="contact_number" id="contact_number" maxlength="8" oninput="this.value=this.value.replace(/[^\d]/g,'');" required>
        </div>
        <label for="description">Enter the Description:</label>
        <div class="notice_detail">
            <textarea rows="6" cols="34" placeholder="Description (No more than 100 characters)" name="description" id="description" maxlength="100" required></textarea>
        </div>
        <br>
        <input class="submit" type="submit" value="Submit">
        <br>
        <br>
        <input class="reset" type="reset" value="Reset">
        <br>
        <br>
        <a href="menu.php"><input class="back" type="button" value="Back"></a>
        </div>

    </form>


</body>
</html>