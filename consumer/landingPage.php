<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="/consumer/images/logo.png">
    <style>
        .chart-container {
            width: 90rem;
            height: 50%;
        }
    </style>
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
    <?php include "../navbar.php" ?>

    <div class="mt-1 ms-5 mb-5">
        <h2>Welcome Back, Alper Kaya<span class="badge bg-secondary">Account Holder</span></h2>
    </div>
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            
            <div class="carousel-item active">
                <div class="card" id="emergencyAlert">
                    <?php echo '<img src="./images/' . ($_SESSION['isEmergency'] ? "emergency" : "nonEmergency") . '.png" class="card-img-top" alt="..." height="235" style="object-fit: contain">' ?>
                    <div class="card-body">
                        <div class="container text-center">
                        <h5 class="card-title">Emergency Alert</h5>
                        <?php echo '<p class="card-text">Emergency alert is ' . ($_SESSION['isEmergency'] ? "<b>ON</b>" : "<b>off</b>") . '.</p>' ?>
                        </div>
                        <form action="" method="post">
                            <div class="container text-center">
                                <div class="row justify-content-between">
                                    <div class="col-6">
                                        <button class="btn btn-primary" type="submit" name="emergencyOnButton">Open</button>
                                    </div>
                                    <div class="col-6">
                                        <button class="btn btn-primary" type="submit" name="emergencyOffButton">Close</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="card">
                    <?php echo '<img src="./images/' . $_SESSION['weatherForecast'] . '.png" class="card-img-top" alt="..." height="235" style="object-fit: contain;">' ?>
                    <div class="card-body">
                        <div class="container text-center">
                            <h5 class="card-title">Weather Forecast</h5>
                            <?php echo '<p class="card-text">Forecasted weather for tomorrow is <b>' . $_SESSION['weatherForecast'] . '</b>.</p>' ?>
                            <!-- TO GIVE SOME SPACE -->
                            <div class="mb-4"></div>
                            <!-- TO GIVE SOME SPACE -->
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="carousel-item">
                <div class="card" id="airConditioning">
                    <?php echo '<img src="' . ($_SESSION['isAcOn'] ? "./images/workingFan.gif" : "./images/stoppedFan.png") . '" class="card-img-top" alt="..." height="235" width="432" style="object-fit: contain;">' ?>
                    <div class="card-body">
                        <div class="container text-center">
                            <h5 class="card-title">Air Conditioning</h5>
                            <p class="card-text">You can turn on/off AC.</p>
                        </div>
                        <form method="post">
                            <div class="container text-center">
                                <div class="row justify-content-between">
                                    <div class="col-6">
                                        <input class="btn btn-primary" type="submit" value="Turn On" name="acOnButton">
                                    </div>
                                    <div class="col-6">
                                        <input class="btn btn-primary" type="submit" value="Turn Off" name="acOffButton">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="card">
                    <?php echo '<img src="' . ($_SESSION['isLightsOn'] ? "./images/lightsOn.png" : "./images/lightsOff.png") . '" class="card-img-top" alt="..." height="235" width="432" style="object-fit: contain;">' ?>
                    <div class="card-body">
                        <div class="container text-center">
                            <h5 class="card-title">Switch Lights</h5>
                            <?php echo '<p class="card-text">You can switch lights on and off from here. It\'s <b>' . ($_SESSION['isLightsOn'] ? "on" : "off") . '</b> now.</p>' ?>
                        </div>
                        <form action="" method="post">
                            <div class="container text-center">
                                <div class="row justify-content-between">
                                    <div class="col-6">
                                        <button class="btn btn-primary" type="submit" name="lightsOnButton">Turn On</button>
                                    </div>
                                    <div class="col-6">
                                        <button class="btn btn-primary" type="submit" name="lightsOffButton">Turn Off</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="card">
                    <?php echo '<img src="' . ($_SESSION['isWindowBlindOn'] ? "./images/blindsOpened.png" : "./images/blindsClosed.png") . '" class="card-img-top" alt="..." height="235" width="432" style="object-fit: contain;">' ?>
                    <div class="card-body">
                        <div class="container text-center">
                            <h5 class="card-title">Control Window Blinds</h5>
                            <p class="card-text">You can control them anytime you want.</p>
                        </div>
                        <form action="" method="post">
                            <div class="container text-center">
                                <div class="row justify-content-between">
                                    <div class="col-6">
                                        <button class="btn btn-primary" type="submit" name="windowBlindOnButton">Open</button>
                                    </div>
                                    <div class="col-6">
                                        <button class="btn btn-primary" type="submit" name="windowBlindOffButton">Close</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="card" id="temperature">
                    <img src="./images/temperature.png" class="card-img-top" alt="Temperature image" height="235" width="432" style="object-fit: contain;">
                    <div class="card-body">
                        <div class="container text-center">
                            <h5 class="card-title">Temperature</h5>
                            <?php echo '<p class="card-text">House temperature is <b>' . $_SESSION['temperature'] . 'C.</b></p>' ?>
                        </div>
                        
                        <form action="" method="post">
                            <div class="container text-center">
                                <div class="row justify-content-between">
                                    <div class="col-6">
                                        <button class="btn btn-primary" type="submit" name="temperatureUpButton">+</button>
                                    </div>
                                    <div class="col-6">
                                        <button class="btn btn-primary" type="submit" name="temperatureDownButton">-</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <button class="carousel-control-prev carousel-dark" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next carousel-dark" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container text-center my-5"><div class="row"><div class="col-12"><img src="./images/seperator.png" height="20rem" style="opacity:0.8"></div></div></div>

    <div class="shadow-lg p-3 mb-5 mx-5 bg-body rounded">Your House Statistics</div>

    <div class="card chart-container mx-5">
        <div class="row justify-content-center">
            <div class="col">
                <canvas id="chart"></canvas>
            </div>
            <div class="col">
                <canvas id="chart-2"></canvas>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col">
                <canvas id="chart-3"></canvas>
            </div>
            <div class="col">
                <canvas id="chart-4"></canvas>
            </div>
        </div>
    </div>

    <div class="container text-center my-5"><div class="row"><div class="col-12"><img src="./images/seperator.png" height="20rem" style="opacity:0.8"></div></div></div>

    <div class="shadow-lg p-3 mb-5 mx-5 bg-body rounded">About Your House</div>

    <div class="shadow-lg p-3 mb-5 mx-5 bg-body rounded">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ultrices imperdiet tempor. Etiam eu scelerisque odio. Nullam auctor eget mi eget tincidunt. In lacinia pulvinar neque nec bibendum. Nulla nulla enim, aliquet consequat felis eu, consequat tempus elit. Aliquam erat volutpat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nunc feugiat nulla nec justo fermentum sodales. In vulputate justo lacus, id fermentum ligula tristique non. Ut ultricies diam vitae pulvinar tempor. Suspendisse potenti. Suspendisse potenti. Mauris vel lacus mi. Cras convallis augue at dapibus accumsan.

Ut lacinia enim velit, in semper ligula ornare ac. Nulla a feugiat tortor. Fusce vulputate posuere ex, nec interdum ante viverra sed. Phasellus orci mi, mattis vel euismod vel, malesuada at elit. Integer pretium ex eu pretium lacinia. Donec auctor mollis venenatis. Duis in congue sapien. Sed faucibus at ex vitae vestibulum. Fusce ac odio quam.

Donec non venenatis libero, eget aliquet felis. Morbi quis ex efficitur, luctus dui in, sollicitudin ligula. Vestibulum maximus velit risus, ut maximus purus blandit vel. Aenean consequat sit amet mi euismod ultricies. Nunc ac augue quis velit molestie scelerisque quis a elit. Proin aliquet magna efficitur lobortis aliquam. Pellentesque at arcu non enim sodales porta sed nec orci. Curabitur massa orci, ornare non semper in, imperdiet at lorem. Morbi nisi libero, mattis in urna a, tincidunt lacinia felis. Proin efficitur cursus sem, a hendrerit velit ornare ut. Ut in nunc non est iaculis posuere non vitae ex. Morbi lobortis diam id rhoncus pellentesque. Nunc nec magna ipsum. Suspendisse consequat non nisi ac scelerisque. In blandit nisi interdum pellentesque congue. Quisque sed posuere neque.
    </div>











    <?php include '../toast.php' ?>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
    <script>
      const ctx = document.getElementById("chart").getContext('2d');
      const myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday",
          "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            label: 'Temperature',
            backgroundColor: 'rgb(178, 164, 255)',
            borderColor: 'rgb(147, 132, 209)',
            data: [2, 4, 16, 64, 38, 45, 60],
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true,
              }
            }]
          }
        },
      });
    </script>

    <script>
      const ctx2 = document.getElementById("chart-2").getContext('2d');
      const myChart2 = new Chart(ctx2, {
        type: 'bar',
        data: {
          labels: ["rice", "yam", "tomato", "potato",
          "beans", "maize", "oil"],
          datasets: [{
            label: 'food Items',
            backgroundColor: 'rgb(255, 180, 180)',
            borderColor: 'rgb(147, 132, 209)',
            data: [300, 400, 200, 500, 800, 900, 200],
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true,
              }
            }]
          }
        },
      });
    </script>

    <script>
        const ctx3 = document.getElementById("chart-3").getContext('2d');
        const myChart3 = new Chart(ctx3, {
            type: 'pie',
            data: {
            labels: ["rice", "yam", "tomato", "potato",
            "beans", "maize", "oil"],
            datasets: [{
                label: 'food Items',
                backgroundColor: 'rgb(255, 222, 180)',
                borderColor: 'rgb(255, 180, 180)',
                data: [30, 40, 20, 50, 80, 90, 20],
            }]
            },
        });
    </script>

    <script>
      const ctx4 = document.getElementById("chart-4").getContext('2d');
      const myChart4 = new Chart(ctx4, {
        type: 'doughnut',
        data: {
          labels: ["rice", "yam", "tomato", "potato", "beans",
           "maize", "oil"],
          datasets: [{
            label: 'food Items',
            data: [30, 40, 20, 50, 80, 90, 20],
            backgroundColor: ["#FDF4F5", "#E8A0BF", "#BA90C6",
            "#C0DBEA", "#FDF4F5", "#E8A0BF", "#BA90C6",
            "#C0DBEA", "#FDF4F5", "#E8A0BF", "#BA90C6",
            "#C0DBEA", "#FDF4F5", "#C0DBEA", "#C0DBEA"]
          }]
        },
      });
    </script>

    <script>
      const ctx4 = document.getElementById("chart-4").getContext('2d');
      const myChart4 = new Chart(ctx4, {
        type: 'bar',
        data: {
          labels: ["rice", "yam", "tomato", "potato",
          "beans", "maize", "oil"],
          datasets: [{
            label: 'food Items',
            backgroundColor: 'rgb(253, 247, 195)',
            borderColor: 'rgb(147, 132, 209)',
            data: [300, 400, 200, 500, 800, 900, 200],
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true,
              }
            }]
          }
        },
      });
    </script>

    <?php include "../footer.php" ?>

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