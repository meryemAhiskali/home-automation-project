<!DOCTYPE html>
<html>
<head></head>
<body>
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
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<label for="username">Username:</label>
		<input type="text" id="username" name="username">
		<span class="error">* <?php echo $nameErr;?></span>
		<label for="password">Password:</label>
		<input type="password" id="password" name="password">
		<span class="error">* <?php echo $passErr;?></span>
		<input type="submit" value="Login">
	</form>
	<?php
		if ($username != "" && $password != "" && $username == "admin" && $password == "1234") {
			header("Location: /producer/landingPage.php");
		}
	?>
</body>
</html>