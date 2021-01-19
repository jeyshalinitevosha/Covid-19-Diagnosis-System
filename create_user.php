<?php include('server.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Create New User</title>
</head>
<body>
	<div class="header">
		<h2>ADMIN - Create User</h2>
	</div>

	<form method="post" action="create_user.php">
		<?php include('errors.php'); ?>

	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>" required>
  	</div>
  	<div class="input-group">
  		<label>User Type</label>
  		<select name="user_type" id="user_type">
  			<option value=""></option>
  			<option value="admin">Admin</option>
  			<option value="user">User</option>
  		</select>
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1" required>
  	</div>
  	<div class="input-group">
  	  <label>Confirm Password</label>
  	  <input type="password" name="password_2" required>
  	</div>
  	
    <div class="input-group">
      <label>Address Line 1</label>
      <input type="text" name="ad_line1" value="<?php echo $ad_line1; ?>" required>
    </div>
    <div class="input-group">
      <label>Address Line 2 (Optional)</label>
      <input type="text" name="ad_line2" value="<?php echo $ad_line2; ?>">
    </div>    
    <div class="input-group">
      <label>City</label>
      <input type="text" name="city" value="<?php echo $city; ?>" required>
    </div>  
    <div class="input-group">
      <label>State</label>
      <select name="state" value ="<?php echo $state; ?>">
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
      </select>
    </div> 
    <div class="input-group">
      <label>Postal Code</label>
      <input type="text" pattern="[0-9]{5}" name="postal_code" value="<?php echo $postal_code; ?>" required>
    <div class="input-group">
      <button type="submit" class="btn" name="reg_user">Create User</button>
    </div> 
	</form>
</body>
</html>