<?php

session_start()

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather</title>

    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <! -- ============== Navigation ============ -->
    <div class = "container">
        <div class ="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="leaf-outline"></ion-icon></span>
                        <span class="title">Agric_mgt</span>
                    </a>
                </li>

                <li>
                <a href="../admin/dashboard.php">
                        <span class="icon"><ion-icon name="checkmark-done-circle-outline"></ion-icon></span>
                        <span class="title">Home</span>
                    </a>
                </li>

                <li>
                    <a href="../views/crop_mgt.php">
                        <span class="icon"><ion-icon name="logo-stackoverflow"></ion-icon></span>
                        <span class="title">Crop Management</span>
                    </a>
                </li>

                <li>
                    <a href="../views/weather.php">
                        <span class="icon"><ion-icon name="rainy-outline"></ion-icon></span>
                        <span class="title">Weather </span>
                    </a>
                </li>

                <li>
                    <a href="../views/task_mgt.php">
                        <span class="icon"><ion-icon name="list-outline"></ion-icon></span>
                        <span class="title">Tasks</span>
                    </a>
                </li>

                <li>
                    <a href="../login_view/logout.php">
                        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                        <span class="title">logout</span>
                    </a>
                </li>

                
            </ul>
        </div>
        <! -- ============== Main ============ -->
        <div class = "main">
            <div class = "topbar">
                <div class="toggle">
                    <ion-icon name="list-outline"></ion-icon>
                </div>



                <div class="user">
                    <img src="../images/customer01.jpg" alt="">
                </div>
            </div>

        <div class="weather-box">
            <form method="post">
                <h1>The Weather App</h1>
                <input type="text" name="city" id="city" placeholder="Enter city name">
                <input type="submit" name="submit" value="Check weather">
            </form>

            <!-- Weather information display -->
            <div class="weather-info">
                <?php
                if(isset($_POST["submit"])){
                    if(empty($_POST["city"])){
                        echo "Please enter a city name";
                    } else {
                        $city = $_POST["city"];
                        $api_key = "d383d094cfc6fadade4f6dd41b0cc669";
                        $api = "https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$api_key";
                        $api_data = file_get_contents($api);
                        $weather = json_decode($api_data, true);
                        if(isset($weather['main']) && isset($weather['weather'][0]) && isset($weather['wind']) && isset($weather['visibility'])) {
                            $weather_desc = $weather['weather'][0]['description'];
                            $temp = round($weather['main']['temp'] - 273.15, 2);
                            $humidity = $weather['main']['humidity'];
                            $visibility = $weather['visibility'];
                            $wind_speed = $weather['wind']['speed'];
                            echo "<h2>Weather in $city:</h2>";

                            echo "<p style='margin-top: 20px;'>Temperature: " . $temp . "°C</p>";
                            
                            echo "<p style='margin-top: 20px;'>Humidity: " . $humidity . "%</p>";
                            
                            echo "<p style='margin-top: 20px;'>Visibility: " . $visibility . " meters</p>";
                            
                            echo "<p style='margin-top: 20px;'>Wind Speed: " . $wind_speed . " m/s</p>";
                            
                            echo "<p style='margin-top: 20px;'>Weather: " . $weather_desc . "</p>";
                        } else {
                            echo "Weather data not available for the city.";
                        }
                    }
                }
                ?>
            </div>
        </div>

            <script src="../js/main.js"></script>

            <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>