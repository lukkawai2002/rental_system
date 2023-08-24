<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="This is the Menu Page.">
    <meta name="author" content="lukkawai">
    <meta name="keywords" content="Menu Page">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="300">
    <title>Menu</title>
    <link rel="stylesheet" href="css/menu_style.css">
</head>
<body>

    <?php
        $nickname = $_COOKIE['nickname'];
    ?>


    <div class="wrap">
        <h1 id="greeting"></h1>
        <h1 id="clock"></h1>
    </div>

    <script>

        function clock() {
            var date = new Date();
            var hours = date.getHours();
            var minutes = date.getMinutes();
            var seconds = date.getSeconds();
            var midday;

            hours = updateTime(hours);
            minutes = updateTime(minutes);
            seconds = updateTime(seconds);
            var name = "<?php echo $nickname ?>";

            midday = (hours >= 12) ? "PM" : "AM";

            document.getElementById("clock").innerHTML = "<span>" + hours + "</span>" + ":" + "<span>" + minutes + "</span>" + ":" + "<span>" + seconds + "</span>" + "<span>" +midday + "</span>";

            var time = setTimeout(function() {
                clock();
            }, 1000);


            if (hours < 12) {
                var greeting = "Good Morning, " + name;
            }
            else if (hours >= 12 && hours <= 18) {
                var greeting = "Good Afternoon, " + name;
            }
            else {
                var greeting = "Good Evening, " + name;
            }

            document.getElementById("greeting").innerHTML = greeting;
        }

        function updateTime(t) {
            if (t < 10) {
                return "0" + t;
            }
            else {
                return t;
            }
        }

        clock();

    </script>


    <div class="box">
        <a href="make_notice.php"><button>Make Notice</button></a>
        <br><br>
        <a href="manage_notice.php"><button>Manage Notice</button></a>
        <br><br>
        <a href="price_statistic.php"><button>Price Statistic</button></a>
        <br><br>
        <a href="for_rent_notice.php"><button>For Rent Notice</button></a>
        <br><br>
        <a href="receive_respond.php"><button>Your Respond</button></a>
        <br><br>
        <a href="logout.php"><button>Logout</button></a>
    </div>
</body>
</html>