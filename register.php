<?php include('server.php') ?>

<!DOCTYPE html>

<html>

  <head>

    <title>Register</title>
    <link rel="stylesheet"href="layouts.css"type="text/css">

  </head>

  <body>

    <div class="header">
  	  <h2>Register</h2>
    </div>
	
    <form method="post" class="form" action="register.php">
    <table class="input-group">

      <?php include('errors.php'); ?>
      <tr>
        <th>
        <label >Email</label>
        </th>
        <td>
        <input  type="email" name="email" value="<?php echo $email; ?>" required>
        </td>
      </tr>
      <tr>
        <th>
        <label >Username</label>
        </th>
        <td>
        <input  type="text" name="username" value="<?php echo $username; ?>" required>
        </td>
      </tr>
      <tr>
        <th>
        <label>Password</label>
        </th>
        <td>
        <input type="password" name="password_1" required>
        </td>
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
        <td>
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
        </td>
      </tr>
      <tr>
        <th><label>Postal Code</label></th>
        <td><input type="text" pattern="[0-9]{5}" name="postal_code" value="<?php echo $postal_code; ?>" required></td>
      </tr>
      <tr>
        <th>
        <label >What is your favourite food?</label>
        </th>
        <td>
        <input  type="text" name="ans1" value="<?php echo $ans1; ?>" required>
        </td>
      </tr>
      <tr>
        <th>
        <label >What is your favourite color?</label>
        </th>
        <td>
        <input  type="text" name="ans2" value="<?php echo $ans2; ?>" required>
        </td>
      </tr>
      <tr>
        <th>
        <label >What is your favourite animal?</label>
        </th>
        <td>
        <input  type="text" name="ans3" value="<?php echo $ans3; ?>" required>
        </td>
      </tr>

        </table>
      <div class="input-group">
        <button type="submit" class="btn" name="reg_user">Register</button>
      </div>

  	  <p>
  		  Already have an account? <a href="login.php">Sign in</a>
      </p>
      
    </form>

  </body>

</html>