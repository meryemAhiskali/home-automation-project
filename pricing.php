<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>    
    <title>Pricing</title>
</head>
<body>
    <?php include "./navbar.php" ?>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                <img src="./consumer/images/bronze.png" class="card-img-top" alt="Bronze">
                <div class="card-body">
                    <h5 class="card-title">Free Membership</h5>
                    <p class="card-text">This membership is free, so you are not going to be able to use most of the crucial features.</p>
                    <a href="#" class="btn btn-primary">Try</a>
                </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                <img src="./consumer/images/silver.png" class="card-img-top" alt="Silver">
                <div class="card-body">
                    <h5 class="card-title">Normal Membership</h5>
                    <p class="card-text">If you are an indivual, this membership is for you. You are good to go.</p>
                    <a href="#" class="btn btn-secondary">Buy!</a>
                </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                <img src="./consumer/images/premium.png" class="card-img-top" alt="Gold">
                <div class="card-body">
                    <h5 class="card-title">Premium</h5>
                    <p class="card-text">You are the king.</p>
                    <a href="#" class="btn btn-warning">Buy!</a>
                </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "./footer.php" ?>
</body>
</html>