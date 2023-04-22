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
</head>

<body>
    <?php include "./navbar.php" ?>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-1">
                <button class="btn btn-primary" onclick="javascript:window.location.href='/consumer'">Consumer</button>
            </div>
            <div class="col-1">
                <button class="btn btn-primary" onclick="javascript:window.location.href='/producer'">Producer</button>
            </div>
        </div>
    </div>
    
    <?php include "./footer.php" ?>
</body>
</html>