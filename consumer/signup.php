<!DOCTYPE html>
<html>
<head>
	<link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>    

    <link rel="icon" type="image/x-icon" href="/consumer/images/logo.png">
</head>
<body>
	<?php include "../navbar.php" ?>


	<?php
		$username = "";
		$password = "";
        $sirName  = "";
        $name     = "";

		$nameErr = $passErr = $usernameErr = $sirNameErr = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["sirname"])) {
				$sirNameErr = "SirName is required";
			  } else {
				$sirName = test_input($_POST["sirname"]);
			  }
            if (empty($_POST["name"])) {
				$nameErr = "Name is required";
			  } else {
				$name = test_input($_POST["name"]);
			  }
			if (empty($_POST["username"])) {
				$usernameErr = "Username is required";
			  } else {
				$username = test_input($_POST["username"]);
			  }
			if (empty($_POST["username"])) {
				$passErr = "Password is required";
			} else {
				$password = test_input($_POST["password"]);
			}
		}

		function test_input($data) {
        	$data = htmlspecialchars($data);
			$data = stripslashes($data);
            $data = trim($data);
			return $data;
		}
	?>

	<div class="shadow p-3 my-5 mx-5 bg-body rounded">Please Sign Up To Proceed</div>

	<div class="container mt-5">
		<div class="row align-items-center">
			<div class="col-4"></div>
			<div class="col-3 ms-5">
				<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="mb-3">
						<label for="name" class="form-label">Name</label>
						<input type="text" name="name" class="form-control" id="name">
						<?php echo '<span style="color: red;">' . $nameErr . '</span>' ?>
					</div>
                    <div class="mb-3">
						<label for="sirname" class="form-label">Sirname</label>
						<input type="text" name="sirname" class="form-control" id="sirname">
						<?php echo '<span style="color: red;">' . $sirNameErr . '</span>' ?>
					</div>
					<div class="mb-3">
						<label for="username" class="form-label">Username</label>
						<input type="text" name="username" class="form-control" id="username">
						<?php echo '<span style="color: red;">' . $usernameErr . '</span>' ?>
					</div>
					<div class="mb-3">
						<label for="password" class="form-label">Password</label>
						<input name="password" type="password" class="form-control" id="password">
						<?php echo '<span style="color: red;">' . $passErr . '</span>' ?>
					</div>
					<button type="submit" class="btn btn-primary" value="SignUp">Sign Up</button>
				</form>
			</div>
			<div class="col-4"><button class="btn btn-primary" style="margin: 0px" onclick="javascript:window.location.href='/consumer/landingPage.php'">Skip Logging In</button></div>
		</div>
	</div>

	<?php include '../toast.php' ?>
	<?php include "../footer.php" ?>
</body>
</html>