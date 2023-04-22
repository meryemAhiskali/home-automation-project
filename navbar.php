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
    function isProducer() {
        $link = getCurrentUrl();
        foreach (explode("/", $link) as $data) {
            if ($data == "producer") {
                return true;
            }
        }
        return false;
    }
    function isIndexPhp() {
        return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1) == "index.php";
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
            <?php echo '<a class="nav-link" aria-current="page" href="/' . (isConsumer() ? "consumer" : "producer") . '/landingPage.php"><b>Home</b></a>' ?>
            </li>
            <li>
                <?php echo (isConsumer() ? '<li class="nav-item mx-3"> <a class="nav-link" href="/consumer/features.php"><b>Features</b></a> </li>' : ''); ?>
            </li>
            <li>
                <a class="nav-link" aria-current="page" href="/consumer/about.php"><b>About</b></a>
            </li>
            <li>
                <li class="nav-item mx-3"> <a class="nav-link" href="/consumer/faqs.php"><b>FAQs</b></a> </li>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <b>Language</b>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">English</a></li>
                    <li><a class="dropdown-item" href="#">Turkish</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <?php echo '<a class="nav-link" href=\'/index.php\'><b>Return to ' . (isConsumer() ? "Producer" : (isProducer() ? "Consumer" : "Root")) . '</b></a>' ?>
            </li>
            <li>
               <?php echo (isIndexPhp() ? '' : '<li class="nav-item mx-3"><button type="button" class="btn btn-outline-secondary shadow-sm d-sm d-block" onclick="javascript:window.location.href = \'/' . (isConsumer() ? "consumer" : "producer") . '/index.' . (isConsumer() ? "html" : "php") . '\'">Log out</button></li>') ?>
            </li>
        </ul>
        </div>
    </div>
    </nav>
    <!-- NAVBAR -->
