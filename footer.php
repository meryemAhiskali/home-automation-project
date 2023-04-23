<!-- FOOTER -->

<footer>
    <?php 
        $x = __FILE__;
        $x = explode(DIRECTORY_SEPARATOR, $x);
        $ihtdocs = -1;
        $ifooter = -1;
        $addpath = "";
        for ($i = 0; $i < count($x); $i++) {
            //echo $i . " " . $x[$i] . ", ";
            if ($x[$i] == "htdocs") {
                $ihtdocs = $i;
            }
            if ($x[$i] == "footer.php") {
                $ifooter = $i;
            }
        }
        //echo $ihtdocs . " " . $ifooter;
        for ($i = $ihtdocs + 1; $i < $ifooter; ++$i) {
            $addpath = $addpath . "/" . $x[$i];
        }
        //echo $addpath;
        //echo $addpath . "/consumer/landingPage.php";
    ?>
    <div class="container">
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <?php echo '
            <li class="nav-item"><a href="'. $addpath . '/consumer/landingPage.php" class="nav-link px-2 text-body-secondary">Home</a></li>
            <li class="nav-item"><a href="'. $addpath . '/consumer/features.php" class="nav-link px-2 text-body-secondary">Features</a></li>
            <li class="nav-item"><a href="'. $addpath . '/consumer/faqs.php" class="nav-link px-2 text-body-secondary">FAQs</a></li>
            <li class="nav-item"><a href="'. $addpath . '/consumer/about.php" class="nav-link px-2 text-body-secondary">About</a></li>'
            ?>
            </ul>
            <p class="text-center text-body-secondary">© 2023 Home Automation Company, Inc</p>
        </footer>
    </div>
</footer>