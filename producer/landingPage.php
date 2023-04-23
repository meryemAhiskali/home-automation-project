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

    <link rel="icon" type="image/x-icon" href="./images/logo.png"></head>
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

        <div class="mt-4 mb-5 mx-5"><h2>Welcome Back, Meryem Ahıskalı<span class="badge bg-primary">Admin</span></h2></div>

        <div class="shadow-lg p-3 mb-5 mx-5 bg-body rounded">Control Panel</div>

        <div class="accordion mx-5" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Toggle Buttons
                </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <form method="POST">
                        <div class="container">
                            <div class="row justify-content-around">
                                <div class="col text-center">
                                    <input onclick="javascript:window.location.href='/navbar.php'" class="btn btn-primary" type="submit" value="Lights Toggle"  name="lightsToggleButton">
                                    <?php echo '<p><b>' . ($_SESSION['isLightsOn'] ? "ON" : "OFF") . '</b></p>' ?>
                                </div>
                                <div class="col text-center">
                                    <input class="btn btn-primary" type="submit" value="AC Toggle" name="acToggleButton">
                                    <?php echo '<p><b>' . ($_SESSION['isAcOn'] ? "ON" : "OFF") . '</b></p>' ?>
                                </div>
                                <div class="col text-center">
                                    <input class="btn btn-primary" type="submit" value="Window Blind Toggle" name="windowBlindToggleButton">
                                    <?php echo '<p><b>' . ($_SESSION['isWindowBlindOn'] ? "ON" : "OFF") . '</b></p>' ?>
                                </div>
                                <div class="col text-center">
                                    <input class="btn btn-primary" type="submit" value="Emergency Alarm Toggle" name="emergencyToggleButton">
                                    <?php echo '<p><b>' . ($_SESSION['isEmergency'] ? "ON" : "OFF") . '</b></p>' ?>
                                </div>
                            </div>
                        </div>
                    </form>    
                </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Change Temperature
                </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="container">
                        <div class="row justify-content-between">
                            <div class="col">
                                <form method="POST">
                                    <input type="text" placeholder="Please enter temperature(as Celcius)..." name="temperature" style="width: 18rem; height: 2.1rem;">
                                    <input class="btn btn-primary" type="submit" value="Change" name="temperatureButton">
                                    <input class="btn btn-primary" type="submit" value="Random" name="temperatureRandomButton">
                                </form>
                            </div>
                            <div class="col-3">
                                <?php echo '<p>' . "Right now, it is <b>" . $_SESSION['temperature'] . "C</b> degrees." . '</p>' ?>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Change Weather Forecast
                </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="container">
                        <div class="row justify-content-between">
                            <div class="col">
                                <form method="POST">
                                    <select name="weatherForecast" id="weatherForecastId" style="width: 18rem; height: 2.1rem;">
                                        <option value="sunny">Sunny</option>
                                        <option value="rainy">Rainy</option>
                                        <option value="stormy">Stormy</option>
                                        <option value="windy">Windy</option>
                                        <option value="cloudy">Cloudy</option>
                                    </select>
                                    <input class="btn btn-primary" type="submit" name="weatherForecastButton" value="Change"/>
                                    <input class="btn btn-primary" type="submit" name="weatherRandomButton" value="Random"/>
                                </form>
                            </div>
                            <div class="col-3">
                                <?php echo '<p>' . "Right now, it is <b>" . $_SESSION['weatherForecast'] . "</b>." . '</p>' ?>
                            </div>
                        </div>
                    </div>
                </div>
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
        if (isset($_POST['weatherRandomButton'])) {
            $opt = array("sunny", "rainy", "cloudy", "stormy", "windy")[rand(0,4)];
            alert("Weather forecast " . $opt . " selected.");
            $_SESSION['weatherForecast'] = $opt;
        }
        if (isset($_POST['temperatureRandomButton'])) {
            $_SESSION['temperature'] = rand(-20, 50);
            alert("Temperature is set to " . ($_SESSION['temperature'] + ((rand(0,5) > 2) ? rand(-2, -1) : rand(1, 2))) . "C.");
        }
        if (isset($_POST["temperatureButton"])) {
            //is_numeric function is used with strings to test if they are stringified representations of integers
            if (!is_numeric($_POST["temperature"])) {
                throw new Exception("Temperature must be a number!");
            }
            $_SESSION['temperature'] = $_POST["temperature"];
            alert("Temperature is set to " . ($_SESSION['temperature'] + ((rand(0,5) > 2) ? rand(-2, -1) : rand(1, 2))) . "C.");
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