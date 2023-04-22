<?php session_start();//at first I wanted to use $GLOBALS but it wasn't stable across different requests(button clicks) ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>Landing Page</title>

    <link rel="icon" type="image/x-icon" href="/consumer/images/logo.png"></head>
<body>
    <?php
        /*
        These are my ideas to add as sensory data for my producer to produce:
            1. Lights                               DONE
            2. Windows closed/onn                   DONE
            3. Temperature                          DONE
            4. AC                                   DONE
            5. Weather                              DONE
            6. Emergency alerts                     DONE
        */
        //default boolean behavior is "false"
        
        if (!isset($_SESSION['isLightsOn'])) {$_SESSION['isLightsOn'] = false;}
        if (!isset($_SESSION['temperature'])) {$_SESSION['temperature'] = 25;}//celcius
        if (!isset($_SESSION['isAcOn'])) {$_SESSION['isAcOn'] = false;}
        if (!isset($_SESSION['isWindowBlindOn'])) {$_SESSION['isWindowBlindOn'] = false;}
        if (!isset($_SESSION['weatherForecast'])) {$_SESSION['weatherForecast'] = "sunny";}//options: sunny, rainy, cloudy, windy and stormy
        if (!isset($_SESSION['isEmergency'])) {$_SESSION['isEmergency'] = false;}
    ?>
    <?php include "../navbar.php" ?>

        <br><br><br>
        <div class="container text-center">
            <div class="row">
                <div class="col">
                <form method="POST">
                    <input class="btn btn-primary" type="submit" value="Lights Toggle"  name="lightsToggleButton"><br><br>
                    <input class="btn btn-primary" type="submit" value="AC Toggle" name="acToggleButton"><br><br>
                    <input class="btn btn-primary" type="submit" value="Window Blind Toggle" name="windowBlindToggleButton"><br><br>
                    <input class="btn btn-primary" type="submit" value="Emergency Alarm Toggle" name="emergencyToggleButton"><br><br>
                </form>
                </div>
                <div class="col">
                    <form method="POST">
                        <input type="text" placeholder="Please enter temperature(as Celcius)..." name="temperature"><br><br>
                        <input class="btn btn-primary" type="submit" name="temperatureButton"><br><br>
                    </form>
                </div>
                <div class="col">
                    <form method="POST">
                        <label for="weatherForecastId">Weather Forecast</label><br>
                        <select name="weatherForecast" id="weatherForecastId">
                            <option value="sunny">Sunny</option>
                            <option value="rainy">Rainy</option>
                            <option value="stormy">Stormy</option>
                            <option value="windy">Windy</option>
                            <option value="cloudy">Cloudy</option>
                        </select>
                        <input class="btn btn-primary" type="submit" name="weatherForecastButton" />
                    </form>
                </div>
            </div>
        </div>
        
        <?php include '../toast.php' ?>
        <?php include "../footer.php" ?>




    <?php
        if (isset($_POST["lightsToggleButton"]))
        {
            alert("Lights were " . ($_SESSION['isLightsOn'] ? "on" : "off") . ". And now they are " . ($_SESSION['isLightsOn'] ? "off" : "on") . " .");
            $_SESSION['isLightsOn'] = $_SESSION['isLightsOn'] ? false : true;
        }
        if (isset($_POST["acToggleButton"]))
        {
            alert("AC was " . ($_SESSION['isAcOn'] ? "on" : "off") . ". And now it is " . ($_SESSION['isAcOn'] ? "off" : "on") . " .");
            $_SESSION['isAcOn'] = $_SESSION['isAcOn'] ? false : true;
        }
        if (isset($_POST["windowBlindToggleButton"]))
        {
            alert("Window blinds were " . ($_SESSION['isWindowBlindOn'] ? "on" : "off") . ". And now they are " . ($_SESSION['isWindowBlindOn'] ? "off" : "on") . " .");
            $_SESSION['isWindowBlindOn'] = $_SESSION['isWindowBlindOn'] ? false : true;
        }
        if (isset($_POST["emergencyToggleButton"]))
        {
            alert("Emergency alarm was " . ($_SESSION['isEmergency'] ? "on" : "off") . ". And now it is " . ($_SESSION['isEmergency'] ? "off" : "on") . " .");
            $_SESSION['isEmergency'] = $_SESSION['isEmergency'] ? false : true;
        }
        if (isset($_POST["weatherForecastButton"]))
        {
            alert("Weather forecast " . $_POST['weatherForecast'] . " selected.");
            $_SESSION['weatherForecast'] = $_POST['weatherForecast'];//weatherForecastButton
        }
        if (isset($_POST["temperatureButton"])) {
            //is_numeric function is used with strings to test if they are stringified representations of integers
            if (!is_numeric($_POST["temperature"])) {
                throw new Exception("Temperature must be a number!");
            }
            $_SESSION['temperature'] = $_POST["temperature"];
            alert("Temperature is set to " . $_SESSION['temperature'] . "C.");
        }
        //this part writes all custom global variables to a txt file where consumer can reach
        $myfile = fopen("../keyValuePairs.txt", "w");
        fwrite($myfile, ($_SESSION['isLightsOn'] ? "isLightsOn=true" : "isLightsOn=false") . "\n" . 
                        "temperature=" . $_SESSION['temperature'] . "\n" .//I use doublevar, because if you don't use it 0.30 and 0.3 will appear as if they aren't same things
                        ($_SESSION['isAcOn'] ? "isAcOn=true" : "isAcOn=false") . "\n" .
                        ($_SESSION['isWindowBlindOn'] ? "isWindowBlindOn=true" : "isWindowBlindOn=false") . "\n" .
                        "weatherForecast=" . $_SESSION['weatherForecast'] . "\n" .
                        ($_SESSION['isEmergency'] ? "isEmergency=true" : "isEmergency=false")
                        );
        fclose($myfile);

        function alert($msg) {//you can use this function to alert the updates instead of echoing them at the bottom of the page
            echo "<script type='text/javascript'>alert('$msg')</script>";
        }
    ?>
</body>
</html>