<?php include('server.php');

#$_SESSION['userType'] = 0;

if (($_SESSION['userType'] == 1 OR $_SESSION['userType'] == 2)) {
    header('location: HomePage.php');
}

?>

<!DOCTYPE html>

<html>

	<head>
		<title>Login</title>
		<link rel="stylesheet"href="layouts.css"type="text/css">
	</head>

	<body>

		<div class="header">
			<h2>Login</h2>
		</div>

		<form method="post" class="form" action="login.php">

			<?php include('errors.php'); ?>

			<div class="input-group">
				<label><strong>Username</strong></label>
				<input type="text" name="username" required>
			</div>

			<div class="input-group">
				<label><strong>Password</strong></label>
				<input type="password" name="password" required>
			</div>

			<div class="input-group">
				<button type="submit" class="btn" name="login_btn"><strong>Login</strong></button>
			</div>

			<p>
				Don't have an account yet? <a href="register.php">Sign up</a> here
			</p>

			<p>
				Forgot Password? <a href="fpwd.php">Click here</a>
			</p>

		</form>
	</body>
</html>