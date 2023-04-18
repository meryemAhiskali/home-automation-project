<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>    
</head>
<body>
    <?php
        session_start();
        if (!isset($_SESSION['isLightsOn'])) {
            $myfile = fopen("../keyValuePairs.txt", "r") or die("Unable to open file!");
            $data = fread($myfile,filesize("../keyValuePairs.txt"));
            $data = explode("\n", $data);
            foreach ($data as $s) {
                $line = explode("=", $s);
                if (substr($line[0], 0, 2) == "is") {
                    $_SESSION[$line[0]] = ($line[1] == "true" ? true : false);
                } else if (is_numeric($line[1])) {
                    $_SESSION[$line[0]] = (is_int($line[1]) ? intval($line[1]) : doubleval($line[1]));
                } else {
                    $_SESSION[$line[0]] = $line[1];
                }
            }
            fclose($myfile);
        }
    ?>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand ms-5" href="#">
            <img src="./images/logo.png" alt="Logo" width="55" height="55">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="d-flex me-5" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item mx-3">
            <a class="nav-link active" aria-current="page" href="./landingPage.php"><b>Home</b></a>
            </li>
            <li class="nav-item mx-3">
            <a class="nav-link" href="#"><b>Features</b></a>
            </li>
            <li class="nav-item mx-3">
            <a class="nav-link" href="#"><b>Pricing</b></a>
            </li>
            <li class="nav-item mx-3">
                <button type="button" class="btn btn-outline-dark">Login</button>
            </li>
            <li class="nav-item mx-3">
                <button type="button" class="btn btn-outline-dark">Signup</button>
            </li>
            <li class="nav-item ms-3">
                <button type="button" class="btn btn-outline-dark">Language</button>
            </li>
        </ul>
        </div>
    </div>
    </nav>
    <!-- NAVBAR -->
    <div class="my-5"></div><!-- to give some space -->

    <div class="row mx-3">
        <div class="col mb-3 mb-sm-0">
            <div class="card">
                <?php echo '<img src="' . ($_SESSION['isLightsOn'] ? "./images/lightsOn.png" : "./images/lightsOff.png") . '" class="card-img-top" alt="..." height="235">' ?>
                <div class="card-body">
                    <h5 class="card-title">Switch Lights</h5>
                    <?php echo '<p class="card-text">You can switch lights on and off from here. It\'s <b>' . ($_SESSION['isLightsOn'] ? "on" : "off") . '</b> now.</p>' ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <input type="submit" value="Open Lights" name="lightsOnButton">
                        <input class="btn btn-primary" type="submit" value="Close Lights" name="lightsOffButton">
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <?php echo '<img src="./images/lightBrightness.png" class="card-img-top" alt="..." height="235" style="opacity:'. $_SESSION['lightBrightness'] . '">' ?>
                <div class="card-body">
                    <h5 class="card-title">Control Light Brightness</h5>
                    <?php echo '<p class="card-text">Opacity of this image will change. Brightness: <b>' . $_SESSION['lightBrightness'] . '</b></p>' ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <input class="btn btn-primary" type="submit" value="Decrease" name="lightBrightnessDecrease">
                        <input class="btn btn-primary" type="submit" value="Increase" name="lightBrightnessIncrease">
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="./images/waterLevel.png" class="card-img-top" alt="..." height="235">
                <div class="card-body">
                    <h5 class="card-title">Water Level</h5>
                    <?php echo '<p class="card-text">Water level is <b>' . $_SESSION['waterLevel'] . '</b> cm.</p>' ?>
                    <!-- TO GIVE SOME SPACE -->
                    <div class="mb-5"></div>
                    <!-- TO GIVE SOME SPACE -->
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <?php echo '<img src="' . ($_SESSION['isWindowBlindOn'] ? "./images/blindsOpened.png" : "./images/blindsClosed.png") . '" class="card-img-top" alt="..." height="235">' ?>
                <div class="card-body">
                    <h5 class="card-title">Control Window Blinds</h5>
                    <p class="card-text">You can control them anytime you want.</p>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <input class="btn btn-primary" type="submit" value="Open" name="windowBlindOnButton">
                        <input class="btn btn-primary" type="submit" value="Close" name="windowBlindOffButton">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="my-5"></div><!-- to give some space -->

    <div class="row mx-3">
        <div class="col mb-3 mb-sm-0">
            <div class="card" id="temperature">
                <img src="./images/temperature.png" class="card-img-top" alt="Temperature image" height="235">
                <div class="card-body">
                    <h5 class="card-title">Temperature</h5>
                    <?php echo '<p class="card-text">House temperature is <b>' . $_SESSION['temperature'] . 'C.</b></p>' ?>
                    <form action= "#temperature" method="post">
                        <input class="btn btn-primary" type="submit" value="Heat up" name="temperatureUpButton">
                        <input class="btn btn-primary" type="submit" value="Cool down" name="temperatureDownButton">
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" id="airConditioning">
                <?php echo '<img src="' . ($_SESSION['isAcOn'] ? "./images/workingFan.gif" : "./images/stoppedFan.png") . '" class="card-img-top" alt="..." height="235" width="432" style="object-fit: contain;">' ?>
                <div class="card-body">
                    <h5 class="card-title">Air Conditioning</h5>
                    <p class="card-text">You can turn on/off AC.</p>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <input class="btn btn-primary" type="submit" value="Turn On" name="acOnButton">
                        <input class="btn btn-primary" type="submit" value="Turn Off" name="acOffButton">
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="./images/airPollution.png" class="card-img-top" alt="..." height="235">
                <div class="card-body">
                    <h5 class="card-title">Air Quality</h5>
                    <?php echo '<p class="card-text">Air pollution in the house is <b>' . (1 - doubleval($_SESSION['indoorQuality'])) . '</b> .</p>' ?>
                    <!-- TO GIVE SOME SPACE -->
                    <div class="mb-5"></div>
                    <!-- TO GIVE SOME SPACE -->
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <?php echo '<img src="' . ($_SESSION['isSmartLocksLocked'] ? "./images/locked.png" : "./images/unlocked.png") . '" class="card-img-top" alt="..." height="235">' ?>
                <div class="card-body">
                    <h5 class="card-title">Control Smart Locks</h5>
                    <p class="card-text">You can open/close your smart locks here.</p>
                    <form action="" method="post">
                        <input class="btn btn-primary" type="submit" value="Lock" name="smartLocksLockedButton">
                        <input class="btn btn-primary" type="submit" value="Unlock" name="smartLocksUnlockedButton">
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="my-5"></div><!-- to give some space -->

    <div class="row mx-3">
        <div class="col mb-3 mb-sm-0">
            <div class="card">
                <img src="./images/coffeeMachine.png" class="card-img-top" alt="..." height="235" width="432" style="object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">Coffee Machine</h5>
                    <?php echo '<p class="card-text">You can start your coffee machine before you arrive home. It\'s now <b>' . ($_SESSION['isCoffeeMachineStarted'] ? "started" : "stopped") .'</b></p>' ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <input class="btn btn-primary" type="submit" value="Start" name="coffeeMachineStartedButton">
                        <input class="btn btn-primary" type="submit" value="Stop" name="coffeeMachineStoppedButton">
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="./images/energyConsumption.svg" class="card-img-top" alt="..." height="235">
                <div class="card-body">
                    <h5 class="card-title">Energy Consumption</h5>
                    <?php echo '<p class="card-text">Your energy consumption is <b>' . $_SESSION['energyConsumption'] . 'kWs</b> per month.</p>' ?>
                    <!-- TO GIVE SOME SPACE -->
                    <div class="mb-5"></div>
                    <!-- TO GIVE SOME SPACE -->
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="./images/waterQuality.png" class="card-img-top" alt="..." height="235">
                <div class="card-body">
                    <h5 class="card-title">Water Quality in Tank</h5>
                    <?php echo '<p class="card-text">Your water quality is <b>' . $_SESSION['waterQuality'] . '</b>.</p>' ?>
                    <!-- TO GIVE SOME SPACE -->
                    <div class="mb-5"></div>
                    <!-- TO GIVE SOME SPACE -->
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="./images/waterTemperature.png" class="card-img-top" alt="..." height="235" width="432" style="object-fit: contain;">
                <div class="card-body">
                    <h5 class="card-title">Water Temperature in Tank</h5>
                    <?php echo '<p class="card-text">Your water tank is <b>' . $_SESSION['waterTemperature'] . 'C</b>.</p>' ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <input class="btn btn-primary" type="submit" value="Heat Up" name="waterTemperatureIncreaseButton">
                        <input class="btn btn-primary" type="submit" value="Cool Down" name="waterTemperatureDecreaseButton">
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="my-5"></div><!-- to give some space -->

    <div class="row mx-3">
        <div class="col">
            <div class="card">
                <?php echo '<img src="./images/' . $_SESSION['weatherForecast'] . '.png" class="card-img-top" alt="..." height="235" style="object-fit: contain;">' ?>
                <div class="card-body">
                    <h5 class="card-title">Weather Forecast</h5>
                    <?php echo '<p class="card-text">Forecasted weather for tomorrow is <b>' . $_SESSION['weatherForecast'] . '</b>.</p>' ?>
                    <!-- TO GIVE SOME SPACE -->
                    <div class="mb-5"></div>
                    <!-- TO GIVE SOME SPACE -->
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="./images/humidity.png" class="card-img-top" alt="..." height="235" style="object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">Humidity</h5>
                    <?php echo '<p class="card-text">Humidity of the house is <b>' . $_SESSION['humidity'] . '</b>.</p>' ?>
                    <!-- TO GIVE SOME SPACE -->
                    <div class="mb-5"></div>
                    <!-- TO GIVE SOME SPACE -->
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <?php echo '<img src="./images/' . ($_SESSION['isEmergency'] ? "emergency" : "nonEmergency") . '.png" class="card-img-top" alt="..." height="235" style="object-fit: contain">' ?>
                <div class="card-body">
                    <h5 class="card-title">Emergency Alert</h5>
                    <?php echo '<p class="card-text">Emergency alert is ' . ($_SESSION['isEmergency'] ? "<b>ON</b>" : "<b>off</b>") . '.</p>' ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <input class="btn btn-primary" type="submit" value="Open" name="emergencyOnButton">
                        <input class="btn btn-primary" type="submit" value="Close" name="emergencyOffButton">
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="./images/fanSpeed.png" class="card-img-top" alt="..." height="235" style="object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">Fan Speed</h5>
                    <?php echo '<p class="card-text">Fan speed is <b>' . $_SESSION['fanSpeed'] . 'RPMs</b>.</p>' ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input class="btn btn-primary" type="submit" value="Increase"  name="fanSpeedIncreaseButton">
                    <input class="btn btn-primary" type="submit" value="Decrease" name="fanSpeedDecreaseButton">
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- FOOTER -->

    <div class="container">
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
            </ul>
            <p class="text-center text-body-secondary">© 2023 Home Automation Company, Inc</p>
        </footer>
    </div>

    <?php
        if (isset($_POST["lightsOnButton"]))
        {
            $_SESSION['isLightsOn'] = true;
        }
        if (isset($_POST["lightsOffButton"]))
        {
            $_SESSION['isLightsOn'] = false;
        }
        if (isset($_POST['lightBrightnessIncrease'])) {
            if ($_SESSION['lightBrightness'] < 0.9) {
                $_SESSION['lightBrightness'] = $_SESSION['lightBrightness'] + 0.1;
            }
        }
        if (isset($_POST['lightBrightnessDecrease'])) {
            if ($_SESSION['lightBrightness'] > 0.1) {
                $_SESSION['lightBrightness'] = $_SESSION['lightBrightness'] - 0.1;
            } 
        }
        if (isset($_POST['windowBlindOnButton'])) {
            $_SESSION['isWindowBlindOn'] = true;
        }
        if (isset($_POST['windowBlindOffButton'])) {
            $_SESSION['isWindowBlindOn'] = false;
        }
        if (isset($_POST['temperatureUpButton'])) {
            $_SESSION['temperature'] = $_SESSION['temperature'] + 1; 
        }
        if (isset($_POST['temperatureDownButton'])) {
            $_SESSION['temperature'] = $_SESSION['temperature'] - 1; 
        }
        if (isset($_POST['acOnButton'])) {
            $_SESSION['isAcOn'] = true; 
        }
        if (isset($_POST['acOffButton'])) {
            $_SESSION['isAcOn'] = false; 
        }
        if (isset($_POST['smartLocksLockedButton'])) {
            $_SESSION['isSmartLocksLocked'] = true;
        }
        if (isset($_POST['smartLocksUnlockedButton'])) {
            $_SESSION['isSmartLocksLocked'] = false;
        }
        if (isset($_POST['coffeeMachineStartedButton'])) {
            $_SESSION['isCoffeeMachineStarted'] = true;
        }
        if (isset($_POST['coffeeMachineStoppedButton'])) {
            $_SESSION['isCoffeeMachineStarted'] = false;
        }
        if (isset($_POST['waterTemperatureIncreaseButton'])) {
            $_SESSION['waterTemperature'] = $_SESSION['waterTemperature'] + 1; 
        }
        if (isset($_POST['waterTemperatureDecreaseButton'])) {
            $_SESSION['waterTemperature'] = $_SESSION['waterTemperature'] - 1; 
        }
        if (isset($_POST['emergencyOnButton'])) {
            $_SESSION['isEmergency'] = true;
        }
        if (isset($_POST['emergencyOffButton'])) {
            $_SESSION['isEmergency'] = false;
        }
        if (isset($_POST['fanSpeedIncreaseButton'])) {
            $_SESSION['fanSpeed'] = $_SESSION['fanSpeed'] + 1; 
        }
        if (isset($_POST['fanSpeedDecreaseButton'])) {
            if ($_SESSION['fanSpeed'] > 0) {
                $_SESSION['fanSpeed'] = $_SESSION['fanSpeed'] - 1;
            }
        }

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
    ?>
</body>
</html>