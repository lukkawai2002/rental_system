<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="This is the Price Statistic Page.">
    <meta name="author" content="lukkawai">
    <meta name="keywords" content="Price Statistic Page">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="300">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="css/price_statistic_style.css">
    <title>Price Statistic</title>
</head>
<body>
    
    <?php
        $connect = mysqli_connect("localhost","root","willian1966","rental_system");

        $query = mysqli_query($connect, "SELECT COUNT(*) FROM rental_system.make_notice WHERE Price < 20000;");
        $result = mysqli_fetch_array($query);
        $count1 = $result[0];

        $query = mysqli_query($connect, "SELECT COUNT(*) FROM rental_system.make_notice WHERE Price >= 20000 AND Price < 40000;");
        $result = mysqli_fetch_array($query);
        $count2 = $result[0];
        
        $query = mysqli_query($connect, "SELECT COUNT(*) FROM rental_system.make_notice WHERE Price >= 40000 AND Price < 60000;");
        $result = mysqli_fetch_array($query);
        $count3 = $result[0];

        $query = mysqli_query($connect, "SELECT COUNT(*) FROM rental_system.make_notice WHERE Price >= 60000 AND Price < 80000;");
        $result = mysqli_fetch_array($query);
        $count4 = $result[0];

        $query = mysqli_query($connect, "SELECT COUNT(*) FROM rental_system.make_notice WHERE Price > 80000;");
        $result = mysqli_fetch_array($query);
        $count5 = $result[0];
    ?>




    <h1>Price Statistic</h1>
    <canvas id="cookieChart" width="130" height="60"></canvas>
    <script src="javascript/price_statistic.js"></script>

    <script>
        var canvasElement = document.getElementById("cookieChart");

        var config = {
            type: "bar",
            data: {
                labels: ["$1 - $19,999", "$20,000 - $39,999", "$40,000 - $59,999", "$60,000 - $79,999", "$80,000 - $99,999"], 
                datasets: [{ 
                    label: "Price Figure", 
                    data: [<?php echo $count1 ?>, <?php echo $count2 ?>, <?php echo $count3 ?>, <?php echo $count4 ?>, <?php echo $count5 ?>],
                    backgroundColor: [
                        "rgba(0, 0, 232, 0.5)",
                        "rgba(0, 183, 165, 0.5)",
                        "rgba(205, 0, 0, 0.5)",
                        "rgba(255, 189, 0, 0.5)",
                        "rgba(0, 88, 37, 0.5)",
                    ],
                }],
            },

        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        font: {
                            size: 20
                        }
                    }
                },
                x: {
                    ticks: {
                        font: {
                            size: 20
                        }
                    }
                }
            }
        }

        };

        var cookieChart = new Chart(canvasElement, config);

    </script>

    <div class="box">
        <a href="menu.php"><button>Back</button></a>
    </div>

</body>
</html>