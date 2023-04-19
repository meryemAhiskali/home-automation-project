<!DOCTYPE html>
<html>
<head>
	<link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>    

    <link rel="icon" type="image/x-icon" href="/consumer/images/logo.png"></head>
<body>
	<?php include "../navbar.php" ?>


	<?php
		$username = "";
		$password = "";

		$nameErr = $passErr = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST["username"])) {
				$nameErr = "Username is required";
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
	<div class="container">
		<div class="row align-items-center">
			<div class="col-4"></div>
			<div class="col-3 ms-5">
				<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<div class="mb-3">
						<label for="username" class="form-label">Username</label>
						<input type="text" name="username" class="form-control" id="username">
						<?php echo '<span style="color: red;">' . $nameErr . '</span>' ?>
					</div>
					<div class="mb-3">
						<label for="password" class="form-label">Password</label>
						<input name="password" type="password" class="form-control" id="password">
						<?php echo '<span style="color: red;">' . $passErr . '</span>' ?>
					</div>
					<button type="submit" class="btn btn-primary" value="Login">Submit</button>
				</form>
			</div>
			<div class="col-4"></div>
		</div>
	</div>

	
	<?php
		if ($username != "" && $password != "" && $username == "user" && $password == "1234") {
			header("Location: /home-automation-project/consumer/landingPage.php");
		}
	?>

	<?php include "../footer.php" ?>
</body>
</html>