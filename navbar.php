<?php
    function getCurrentUrl() {
        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
            $url = "https://";   
        else  
            $url = "http://";   
        // Append the host(domain name, ip) to the URL.   
        $url.= $_SERVER['HTTP_HOST'];   
        
        // Append the requested resource location to the URL   
        $url.= $_SERVER['REQUEST_URI'];    
        
        return $url;
    }
    function isConsumer() {
        $link = getCurrentUrl();
        foreach (explode("/", $link) as $data) {
            if ($data == "consumer") {
                return true;
            }
        }
        return false;
    }
?>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand ms-5" href="#">
            <img src="/consumer/images/logo.png" alt="Logo" width="55" height="55">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="d-flex me-5" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item mx-3">
            <?php echo '<a class="nav-link active" aria-current="page" href="/' . (isConsumer() ? "consumer" : "producer") . '/landingPage.php"><b>Home</b></a>' ?>
            </li>
            <?php echo (isConsumer() ? '<li class="nav-item mx-3"> <a class="nav-link" href="/consumer/features.php"><b>Features</b></a> </li>' : ''); ?>
            <?php echo (isConsumer() ? '<li class="nav-item mx-3"> <a class="nav-link" href="/consumer/pricing.php"><b>Pricing</b></a> </li>' : ''); ?>
            <li class="nav-item mx-3">
                <button type="button" class="btn btn-outline-dark">Log out</button>
            </li>
            <li class="nav-item ms-3">
                <button type="button" class="btn btn-outline-dark">Language</button>
            </li>
        </ul>
        </div>
    </div>
    </nav>
    <!-- NAVBAR -->
