<?php session_start();

//initializing variables
$email = "";
$username = "";
$ad_line1 = "";
$ad_line2 = "";
$city = "";
$state = "";
$postal_code = "";
$ans1 = "";
$ans2 = "";
$ans3 = "";
$errors = array();

//connecting to database
$db = mysqli_connect('localhost', 'root', '', 'cds');

//declare variable as global to enable variable to be called in function
global $db, $errors, $username;

//user registration
if (isset($_POST['reg_user']))
{
	//receiving all input variables from the form

	$email = mysqli_real_escape_string($db, $_POST['email']);
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
	$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
	$ad_line1 = mysqli_real_escape_string($db, $_POST['ad_line1']);
	$ad_line2 = mysqli_real_escape_string($db, $_POST['ad_line2']);
	$city = mysqli_real_escape_string($db, $_POST['city']);
	$state = mysqli_real_escape_string($db, $_POST['state']);
	$postal_code = mysqli_real_escape_string($db, $_POST['postal_code']);
	$ans1 = mysqli_real_escape_string($db, $_POST['ans1']);
	$ans2 = mysqli_real_escape_string($db, $_POST['ans2']);
	$ans3 = mysqli_real_escape_string($db, $_POST['ans3']);

	//form validation
	if (empty($email)) {array_push($errors, "Email is mandatory");}
	if (empty($username)) {array_push($errors, "Username is mandatory");}
	if (empty($password_1)) {array_push($errors, "Password is mandatory");}
	if (empty($password_2)) {array_push($errors, "Password is mandatory");}
	if ($password_1 != $password_2) {array_push($errors, "Both passwords do not match");}
	if (empty($ad_line1)) {array_push($errors, "Address is mandatory");}
	if (empty($city)) {array_push($errors, "Please enter your city");}
	if (empty($state)) {array_push($errors, "Please choose your state");}
	if (empty($postal_code)) {array_push($errors, "Postal code is mandatory");}
	if (empty($ans1)) {array_push($errors, "answer1 is mandatory");}
	if (empty($ans2)) {array_push($errors, "answer2 is mandatory");}
	if (empty($ans3)) {array_push($errors, "answer3 is mandatory");}

	//checking database to ensure user does not exist 
	$user_check_query = "SELECT * FROM user WHERE username = '$username'LIMIT 1";
	$result = mysqli_query($db, $user_check_query);
  	$user = mysqli_fetch_assoc($result);

  	//if user exists 
  	if ($user)
  	{
  		if ($user['username'] == $username)
  		{
  			array_push($errors, "Username already exists");
  		}
  	}

  	//registering user if no errors in the form
  	if (count($errors) == 0)
  	{
  		//password encryption before inserting into database
  		$password = md5($password_1);

  		if (isset($_POST['user_type']))
  		{
  			$user_type = e($_POST['user_type']);
  			$query = "INSERT INTO user (email, username, password, user_type, ad_line1, 
			  ad_line2, city, state, postal_code,ans1, ans2, ans3) VALUES ('$email', 
			  '$username', '$password', '$user_type', '$ad_line1', '$ad_line2', '$city', 
			  '$state', '$postal_code','$ans1','$ans2','$ans3')";

  			mysqli_query($db, $query);
  			$_SESSION['success'] = "New user successfully created";
  			header('location: login.php');	
  		}

  		else
  		{
  			$query = "INSERT INTO user (email, username, password, user_type, ad_line1,
			   ad_line2, city, state, postal_code,ans1, ans2, ans3) VALUES ('$email',
			   '$username', '$password', 'user', '$ad_line1', '$ad_line2', '$city',
			    '$state', '$postal_code','$ans1','$ans2','$ans3')"; 

  			mysqli_query($db, $query);

  			//getting ID for the created user
  			$logged_in_user_id = mysqli_insert_id($db);

  			$_SESSION['user'] = getUserById($logged_in_user_id);
  			$_SESSION['success'] = "You are now logged in";
  			header('location: login.php');
  		}
  	}
}

//admin registration
if (isset($_POST['reg_admin']))
{
	//receiving all input variables from the form

	$email = mysqli_real_escape_string($db, $_POST['email']);
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
	$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
	$ad_line1 = mysqli_real_escape_string($db, $_POST['ad_line1']);
	$ad_line2 = mysqli_real_escape_string($db, $_POST['ad_line2']);
	$city = mysqli_real_escape_string($db, $_POST['city']);
	$state = mysqli_real_escape_string($db, $_POST['state']);
	$postal_code = mysqli_real_escape_string($db, $_POST['postal_code']);
	$ans1 = mysqli_real_escape_string($db, $_POST['ans1']);
	$ans2 = mysqli_real_escape_string($db, $_POST['ans2']);
	$ans3 = mysqli_real_escape_string($db, $_POST['ans3']);

	//form validation
	if (empty($email)) {array_push($errors, "Email is mandatory");}
	if (empty($username)) {array_push($errors, "Username is mandatory");}
	if (empty($password_1)) {array_push($errors, "Password is mandatory");}
	if (empty($password_2)) {array_push($errors, "Password is mandatory");}
	if ($password_1 != $password_2) {array_push($errors, "Both passwords do not match");}
	if (empty($ad_line1)) {array_push($errors, "Address is mandatory");}
	if (empty($city)) {array_push($errors, "Please enter your city");}
	if (empty($state)) {array_push($errors, "Please choose your state");}
	if (empty($postal_code)) {array_push($errors, "Postal code is mandatory");}
	if (empty($ans1)) {array_push($errors, "answer1 is mandatory");}
	if (empty($ans2)) {array_push($errors, "answer2 is mandatory");}
	if (empty($ans3)) {array_push($errors, "answer3 is mandatory");}

	//checking database to ensure user does not exist 
	$user_check_query = "SELECT * FROM user WHERE username = '$username'LIMIT 1";
	$result = mysqli_query($db, $user_check_query);
  	$user = mysqli_fetch_assoc($result);

  	//if user exists 
  	if ($user)
  	{
  		if ($user['username'] == $username)
  		{
  			array_push($errors, "Username already exists");
  		}
  	}

  	//registering user if no errors in the form
  	if (count($errors) == 0)
  	{
  		//password encryption before inserting into database
  		$password = md5($password_1);

  		if (isset($_POST['user_type']))
  		{
  			$user_type = e($_POST['user_type']);
  			$query = "INSERT INTO user (email, username, password, user_type, ad_line1, 
			  ad_line2, city, state, postal_code,ans1, ans2, ans3) VALUES ('$email', 
			  '$username', '$password', '$user_type', '$ad_line1', '$ad_line2', '$city', 
			  '$state', '$postal_code','$ans1','$ans2','$ans3')";

  			mysqli_query($db, $query);
  			$_SESSION['success'] = "New user successfully created";
  			header('location: login.php');	
  		}

  		else
  		{
  			$query = "INSERT INTO user (email, username, password, user_type, ad_line1,
			   ad_line2, city, state, postal_code,ans1, ans2, ans3) VALUES ('$email',
			   '$username', '$password', 'admin', '$ad_line1', '$ad_line2', '$city',
			    '$state', '$postal_code','$ans1','$ans2','$ans3')"; 

  			mysqli_query($db, $query);

  			//getting ID for the created user
  			$logged_in_user_id = mysqli_insert_id($db);

  			$_SESSION['user'] = getUserById($logged_in_user_id);
  			$_SESSION['success'] = "You are now logged in";
  			header('location: login.php');
  		}
  	}
}
//returning user array from their ID
function getUserById($user_id)
{
	global $db;
	$query = "SELECT * FROM user WHERE user_id = " .$user_id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

//escape string 
function e($val)
{
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}


//logging user out 
if (isset($_GET['logout']))
{
	session_destroy();
	unset($_SESSION['user']);
	header('location: login.php');
}

if (isset($_POST['login_btn']))
{
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password']);

	if (empty($username))
	{
		array_push($errors, "Username is mandatory");
	}

	if (empty($password))
	{
		array_push($errors, "Password is required");
	}

	if (count($errors) == 0)
	{
		$password = md5($password);

		$query = "SELECT * FROM user where username = '$username' and password = '$password'";

		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1)
		{
			echo("success");

			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin')
			{
				$_SESSION['userType'] = 1;
				$_SESSION['userID'] = $logged_in_user['user_id'];
				header('location: HomePage.php');
			}

			else
			{
				$_SESSION['userType'] = 2;
				$_SESSION['userID'] = $logged_in_user['user_id'];
				header('location: HomePage.php');
			}
		}

		else
		{
			array_push($errors, "Wrong username/password combination");
		}
	}
}