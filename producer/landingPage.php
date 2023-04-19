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
        session_start();//at first I wanted to use $GLOBALS but it wasn't stable across different requests(button clicks)
        /*
        These are my ideas to add as sensory data for my producer to produce:
            1. Lights                               DONE
            2. Light brightness                     DONE
            3. Water level                          DONE
            4. Windows closed/onn                   DONE
            5. Temperature                          DONE
            6. AC                                   DONE
            7. Fan speed                            DONE
            8. Air quality                          DONE
            9. Smart locks                          DONE
            10. Coffee machine                      DONE     
            11. Energy consumption                  DONE
            12. Water quality                       DONE
            13. Water temperature in tank           DONE
            14. Weather                             DONE
            15. Humidity                            DONE
            16. Emergency alerts                    DONE
        */
        //default boolean behavior is "false"
        
        if (!isset($_SESSION['isLightsOn'])) {$_SESSION['isLightsOn'] = false;}
        if (!isset($_SESSION['temperature'])) {$_SESSION['temperature'] = 25;}//celcius
        if (!isset($_SESSION['isAcOn'])) {$_SESSION['isAcOn'] = false;}
        if (!isset($_SESSION['lightBrightness'])) {$_SESSION['lightBrightness'] = 0.75;}//percentages
        if (!isset($_SESSION['waterLevel'])) {$_SESSION['waterLevel'] = 88;}//centimeters
        if (!isset($_SESSION['isWindowBlindOn'])) {$_SESSION['isWindowBlindOn'] = false;}
        if (!isset($_SESSION['fanSpeed'])) {$_SESSION['fanSpeed'] = 300;}//RPMs
        if (!isset($_SESSION['indoorQuality'])) {$_SESSION['indoorQuality'] = 0.7;}//percentages
        if (!isset($_SESSION['isSmartLocksLocked'])) {$_SESSION['isSmartLocksLocked'] = false;}
        //coffee machine started=false means it's not started|stopped
        if (!isset($_SESSION['isCoffeeMachineStarted'])) {$_SESSION['isCoffeeMachineStarted'] = false;}
        if (!isset($_SESSION['energyConsumption'])) {$_SESSION['energyConsumption'] = 1958;}//kWs per month
        if (!isset($_SESSION['waterQuality'])) {$_SESSION['waterQuality'] = 0.75;}//percentages(75 percent clean)
        if (!isset($_SESSION['waterTemperature'])) {$_SESSION['waterTemperature'] = 60;}//celcius, below 60 may contain bacteria risks
        if (!isset($_SESSION['weatherForecast'])) {$_SESSION['weatherForecast'] = "sunny";}//options: sunny, rainy, cloudy, windy and stormy
        if (!isset($_SESSION['humidity'])) {$_SESSION['humidity'] = 0.3;}//percentages
        if (!isset($_SESSION['isEmergency'])) {$_SESSION['isEmergency'] = false;}
    ?>
    <?php include "../navbar.php" ?>

        <br><br><br>
        <div class="container text-center">
            <div class="row">
                <div class="col">
                <form method="POST">
                    <input class="btn btn-primary" type="submit" value="Lights On"   name="lightsOnButton"><br><br>
                    <input class="btn btn-primary" type="submit" value="Lights Off"  name="lightsOffButton"><br><br>
                    <input class="btn btn-primary" type="submit" value="Turn AC on"  name="acOnButton"><br><br>
                    <input class="btn btn-primary" type="submit" value="Turn AC off" name="acOffButton"><br><br>
                    <input class="btn btn-primary" type="submit" value="Open window blind"  name="windowBlindOnButton"><br><br>
                    <input class="btn btn-primary" type="submit" value="Close window blind" name="windowBlindOffButton"><br><br>
                    <input class="btn btn-primary" type="submit" value="Lock smart locks"  name="smartLocksLockedButton"><br><br>
                    <input class="btn btn-primary" type="submit" value="Unlock smart locks" name="smartLocksUnlockedButton"><br><br>
                    <input class="btn btn-primary" type="submit" value="Start coffee machine"  name="coffeeMachineStartedButton"><br><br>
                    <input class="btn btn-primary" type="submit" value="Stop coffee machine" name="coffeeMachineStoppedButton"><br><br>
                    <input class="btn btn-primary" type="submit" value="Start emergency alarm" name="emergencyOnButton"><br><br>
                    <input class="btn btn-primary" type="submit" value="Stop emergency alarm" name="emergencyOffButton"><br><br>
                </form>
                </div>
                <div class="col">
                    <form method="POST">
                        <input type="text" placeholder="Please enter temperature(as Celcius)..." name="temperature"><br><br>
                        <input class="btn btn-primary" type="submit" name="temperatureButton"><br><br>
                    </form>
                    <form method="POST">
                        <input type="text" placeholder="Please enter lightbrightness(as percentages)..." name="lightBrightness"><br><br>
                        <input class="btn btn-primary" type="submit" name="lightBrightnessButton"><br><br>
                    </form>
                    <form method="POST">
                        <input type="text" placeholder="Please enter water level(as CMs)..." name="waterLevel"><br><br>
                        <input class="btn btn-primary" type="submit" name="waterLevelButton"><br><br>
                    </form>
                    <form method="POST">
                        <input type="text" placeholder="Please enter fan speed(as RPMs)..." name="fanSpeed"><br><br>
                        <input class="btn btn-primary" type="submit" name="fanSpeedButton"><br><br>
                    </form>
                    <form method="POST">
                        <input type="text" placeholder="Please enter air quality(as percentages)..." name="indoorQuality"><br><br>
                        <input class="btn btn-primary" type="submit" name="indoorQualityButton"><br><br>
                    </form>
                    <form method="POST">
                        <input type="text" placeholder="Please enter energy consumption(as kWs per month)..." name="energyConsumption"><br><br>
                        <input class="btn btn-primary" type="submit" name="energyConsumptionButton"><br><br>
                    </form>
                </div>
                <div class="col">
                    <form method="POST">
                        <input type="text" placeholder="Please enter water quality(as percentages)..." name="waterQuality"><br><br>
                        <input class="btn btn-primary" type="submit" name="waterQualityButton"><br><br>
                    </form>
                    <form method="POST">
                        <input type="text" placeholder="Please enter tank water temperature(as percentages)..." name="waterTemperature"><br><br>
                        <input class="btn btn-primary" type="submit" name="waterTemperatureButton"><br><br>
                    </form>
                    <form method="POST">
                        <input type="text" placeholder="Please enter tank water temperature(as percentages)..." name="waterTemperature"><br><br>
                        <input class="btn btn-primary" type="submit" name="waterTemperatureButton"><br><br>
                    </form>
                    <form method="POST">
                        <input type="text" placeholder="Please enter humidity(as percentages)..." name="humidity"><br><br>
                        <input class="btn btn-primary" type="submit" name="humidityButton"><br><br>
                    </form>
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

        <?php include "../footer.php" ?>




    <?php
        if (isset($_POST["lightsOnButton"]))
        {
            alert("Lights are opened");
            $_SESSION['isLightsOn'] = true;
        }
        if (isset($_POST["lightsOffButton"]))
        {
            alert("Lights are closed");
            $_SESSION['isLightsOn'] = false;
        }
        if (isset($_POST["acOnButton"]))
        {
            alert("AC is on.");
            $_SESSION['isAcOn'] = true;
        }
        if (isset($_POST["acOffButton"]))
        {
            alert("AC is off.");
            $_SESSION['isAcOn'] = false;
        }
        if (isset($_POST["windowBlindOnButton"]))
        {
            alert("Window blind is opened.");
            $_SESSION['isWindowBlindOn'] = true;
        }
        if (isset($_POST["windowBlindOffButton"]))
        {
            alert("Window blind is closed.");
            $_SESSION['isWindowBlindOn'] = false;
        }
        if (isset($_POST["smartLocksLockedButton"]))
        {
            alert("Smart locks locked.");
            $_SESSION['isSmartLocksLocked'] = true;
        }
        if (isset($_POST["smartLocksUnlockedButton"]))
        {
            alert("Smart locks unlocked.");
            $_SESSION['isSmartLocksLocked'] = false;
        }
        if (isset($_POST["coffeeMachineStartedButton"]))
        {
            alert("Coffee machine started.");
            $_SESSION['isCoffeeMachineStarted'] = true;
        }
        if (isset($_POST["coffeeMachineStoppedButton"]))
        {
            alert("Coffee machine stopped.");
            $_SESSION['isCoffeeMachineStarted'] = false;
        }
        if (isset($_POST["emergencyOnButton"]))
        {
            alert("Alarm started!");
            $_SESSION['isEmergency'] = true;
        }
        if (isset($_POST["emergencyOffButton"]))
        {
            alert("Alarm stopped.");
            $_SESSION['isEmergency'] = false;
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
        if (isset($_POST["lightBrightnessButton"])) {
            //is_numeric function is used with strings to test if they are stringified representations of integers
            if (!is_numeric($_POST["lightBrightness"]) || $_POST["lightBrightness"] < 0 || $_POST["lightBrightness"] > 1) {
                throw new Exception("Light brightness must be a percentage!");
            }
            $_SESSION['lightBrightness'] = $_POST["lightBrightness"];
            alert("Light brightness is set to " . $_SESSION['lightBrightness'] . "%.");
        }
        if (isset($_POST["waterLevelButton"])) {
            //is_numeric function is used with strings to test if they are stringified representations of integers
            if (!is_numeric($_POST["waterLevel"]) || $_POST["waterLevel"] < 0) {
                throw new Exception("Water level must be a positive number!");
            }
            $_SESSION['waterLevel'] = $_POST["waterLevel"];
            alert("Water level is set to " . $_SESSION['waterLevel'] . "CM.");
        }
        if (isset($_POST["fanSpeedButton"])) {
            //is_numeric function is used with strings to test if they are stringified representations of integers
            if (!is_numeric($_POST["fanSpeed"]) || $_POST["fanSpeed"] < 0) {
                throw new Exception("Fan speed must be a number!");
            } 
            $_SESSION['fanSpeed'] = $_POST["fanSpeed"];
            alert("Fan speed is set to " . $_SESSION['fanSpeed'] . "RPMs.");
        }
        if (isset($_POST["indoorQualityButton"])) {
            //is_numeric function is used with strings to test if they are stringified representations of integers
            if (!is_numeric($_POST["indoorQuality"]) || $_POST["indoorQuality"] < 0 || $_POST["indoorQuality"] > 1) {
                throw new Exception("Air quality must be a percentages!");
            } 
            $_SESSION['indoorQuality'] = $_POST["indoorQuality"];
            alert("Air quality is set to " . $_SESSION['indoorQuality'] . "%.");
        } if (isset($_POST["energyConsumptionButton"])) {
            //is_numeric function is used with strings to test if they are stringified representations of integers
            if (!is_numeric($_POST["energyConsumption"]) || $_POST["energyConsumption"] < 0) {
                throw new Exception("Energy consumption must be a positive number!");
            } 
            $_SESSION['energyConsumption'] = $_POST["energyConsumption"];
            alert("Energy consumption is set to " . $_SESSION['energyConsumption'] . "kWs.");
        } if (isset($_POST["waterQualityButton"])) {
            //is_numeric function is used with strings to test if they are stringified representations of integers
            if (!is_numeric($_POST["waterQuality"]) || $_POST["waterQuality"] < 0 || $_POST["waterQuality"] > 1) {
                throw new Exception("Water quality must be a percentage!");
            }
            $_SESSION['waterQuality'] = $_POST["waterQuality"];
            alert("Water quality is set to " . $_SESSION['waterQuality'] . "%.");
        } if (isset($_POST["waterTemperatureButton"])) {
            //is_numeric function is used with strings to test if they are stringified representations of integers
            if (!is_numeric($_POST["waterTemperature"])) {
                throw new Exception("Temperature must be a number!");
            }
            $_SESSION['waterTemperature'] = $_POST["waterTemperature"];
            alert("Temperature is set to " . $_SESSION['waterTemperature'] . "C.");
        }
        if (isset($_POST["humidityButton"])) {
            //is_numeric function is used with strings to test if they are stringified representations of integers
            if (!is_numeric($_POST["humidity"]) || $_POST["humidity"] < 0 || $_POST["humidity"] > 1) {
                throw new Exception("Humidity must be a percentage!");
            }
            $_SESSION['humidity'] = $_POST["humidity"];
            alert("Humidity is set to " . $_SESSION['humidity'] . "%.");
        }
        //this part writes all custom global variables to a txt file where consumer can reach
        $myfile = fopen("../keyValuePairs.txt", "w");
        fwrite($myfile, ($_SESSION['isLightsOn'] ? "isLightsOn=true" : "isLightsOn=false") . "\n" . 
                        "temperature=" . $_SESSION['temperature'] . "\n" .
                        ($_SESSION['isAcOn'] ? "isAcOn=true" : "isAcOn=false") . "\n" .
                        "lightBrightness=" . doubleval($_SESSION['lightBrightness']) . "\n" . //I use doublevar, because if you don't use it 0.30 and 0.3 will appear as if they aren't same things
                        "waterLevel=" . doubleval($_SESSION['waterLevel']) . "\n" .
                        ($_SESSION['isWindowBlindOn'] ? "isWindowBlindOn=true" : "isWindowBlindOn=false") . "\n" .
                        "fanSpeed=" . strval($_SESSION['fanSpeed']) . "\n" .
                        "indoorQuality=" . doubleval($_SESSION['indoorQuality']) . "\n" .
                        ($_SESSION['isSmartLocksLocked'] ? "isSmartLocksLocked=true" : "isSmartLocksLocked=false") . "\n" .
                        ($_SESSION['isCoffeeMachineStarted'] ? "isCoffeeMachineStarted=true" : "isCoffeeMachineStarted=false") . "\n" .
                        "energyConsumption=" . $_SESSION['energyConsumption'] . "\n" .
                        "waterQuality=" . $_SESSION['waterQuality'] . "\n" .
                        "waterTemperature=" . $_SESSION['waterTemperature'] . "\n" .
                        "weatherForecast=" . $_SESSION['weatherForecast'] . "\n" .
                        "humidity=" . $_SESSION['humidity'] . "\n" .
                        ($_SESSION['isEmergency'] ? "isEmergency=true" : "isEmergency=false")
                        );
        fclose($myfile);

        function alert($msg) {//you can use this function to alert the updates instead of echoing them at the bottom of the page
            echo "<script type='text/javascript'>alert('$msg')</script>";
        }
    ?>
</body>
</html>