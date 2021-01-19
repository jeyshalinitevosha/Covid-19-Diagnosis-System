<!DOCTYPE html>
<html>

<head>  
<title>Edit User</title>
<link rel="stylesheet"href="layouts.css"type="text/css">
</head>

<?php 
	include 'server.php';
	$userID = $_SESSION['userID'];
	$passNotMatch = "";
	
		$row = mysqli_query($db,"SELECT * FROM user WHERE
		user_id = '$userID'") or die(mysqli_error($db));
		 		
		if (mysqli_num_rows($row) > 0) {
			$out = mysqli_fetch_assoc($row); 
			$username = $out['username'];
			$ad_line1 = $out['ad_line1'];
			$ad_line2 = $out['ad_line2'];
			$city = $out['city'];
			$state = $out['state'];
			$postal_code = $out['postal_code'];
		}


//-----------------------------EDIT PROFILE----------------------------------//
if (isset($_POST['updateProfile']))
{
	$passNotMatch = "Test";
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
	$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
	$ad_line1 = mysqli_real_escape_string($db, $_POST['ad_line1']);
	$ad_line2 = mysqli_real_escape_string($db, $_POST['ad_line2']);
	$city = mysqli_real_escape_string($db, $_POST['city']);
	$state = mysqli_real_escape_string($db, $_POST['state']);
	$postal_code = mysqli_real_escape_string($db, $_POST['postal_code']);

	if ($password_1 != $password_2) {

		$passNotMatch = "Confirm Password does not match";

	}
	else {
		$newPassword = md5($password_1);
		$queryprofile = mysqli_query($db,"UPDATE user SET 
		username='$username',
		password='$newPassword', 
		ad_line1='$ad_line1', 
		ad_line2='$ad_line2', 
		city='$city', 
		state='$state',
		postal_code = '$postal_code'
		WHERE user_id ='$userID'")or die (mysqli_error($db));
		header("Location: HomePage.php");
	}

}	
		
?>

<div class="header">
  	  <h2>Edit Profile</h2>
    </div>
	
    <form method="post" class="form" action="editProfile.php">
	<table class="input-group">

      <?php include('errors.php'); ?>
      
  	  	<tr>
  	  	<h1><?php echo $passNotMatch;?></h1>
  	    <th><label>Username</label></th>
  	    <td><input type="text" name="username" value="<?php echo $username; ?>" required></td>
		</tr>
	  
		<tr>
  	  	<h1><?php echo $passNotMatch;?></h1>
  	    <th><label>Username</label></th>
  	    <td><input type="email" name="email" value="<?php echo $email; ?>" required></td>
		</tr>
      
  		<tr>
  	    <th><label>Password</label></th>
  	    <td><input type="password" name="password_1" required></td>
		</tr>
      
  	  	<tr>
  	    <th><label>Confirm Password</label></th>
  	    <td><input type="password" name="password_2" required></td>
		</tr>
  	
      	<tr>
        <th><label>Address Line 1</label></th>
        <td><input type="text" name="ad_line1" value="<?php echo $ad_line1; ?>" required></td>
		</tr>

      	<tr>
        <th><label>Address Line 2 (Optional)</label></th>
        <td><input type="text" name="ad_line2" value="<?php echo $ad_line2; ?>"></td>
		</tr>

      	<tr>
        <th><label>City</label></th>
        <td><input type="text" name="city" value="<?php echo $city; ?>" required></td>
		</tr>

      	<tr>
        <th><label>State</label></th>
        <td><select name="state" value ="<?php echo $state; ?>">
        <option value="perlis">Perlis</option>
        <option value="kedah">Kedah</option>
        <option value="pulaupinang">Pulau Pinang</option> 
        <option value="perak">Perak</option>
        <option value="selangor">Selangor</option>
        <option value="kl">Federal Territory of Kuala Lumpur</option>
        <option value="putrajaya">Federal Territory of Putrajaya</option>
        <option value="pahang">Pahang</option> 
        <option value="kelantan">Kelantan</option>
        <option value="terengganu">Terengganu</option>
        <option value="n9">Negeri Sembilan</option>
        <option value="malacca">Malacca</option>
        <option value="johor">Johor</option>
        <option value="sabah">Sabah</option>
        <option value="labuan">Federal Territory of Labuan</option>
        <option value="sarawak">Sarawak</option>
        </select></td>
		</tr>

      	<tr>
        <th><label>Postal Code</label></th>
		<td><input type="text" pattern="[0-9]{5}" name="postal_code" value="<?php echo $postal_code; ?>" required></td>
		</tr>
	</table>
      <div class="input-group">
        <button type="submit" class="btn" name="updateProfile">Update Profile</button>
      </div>

  	  <p>
  		  <a href="profile.php">Go back</a>
      </p>
      
    </form>
</body>


</html>