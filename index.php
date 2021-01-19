<?php 
  session_start(); 

  if (!isset($_SESSION['user'])) 
  {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }

  if (isset($_GET['logout'])) 
  {
  	session_destroy();
  	header("location: login.php");
  }
?>

<!DOCTYPE html>

<html>

	<head>
		<title>Home</title>
	</head>

	<body>

		<div class="header">
			<h2>Homepage</h2>
		</div>

		<div class = content>
			<?php if (isset($_SESSION['success'])): ?>
				<h3>
					<?php 
					echo $_SESSION['success'];
					unset($_SESSION['success']);
					?>
				</h3>
		</div>

			<?php endif ?>

		<!-- logged in user information -->
    	<?php  if (isset($_SESSION['user'])) : ?>
    		<p>Welcome <strong></strong></p>
    		<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
		<?php endif ?>
		
	</body>

</html>