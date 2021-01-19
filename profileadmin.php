<?php include 'Navigation_Bar.php';
include 'server.php';

if (!($_SESSION['userType'] == 1 OR $_SESSION['userType'] == 2)) {
    header('location: login.php');
}

?>

<?php 

$profile = $_SESSION['userID'];

// --------------------USER PROFILE----------------------------                 

$row1 = mysqli_query($db, "SELECT * FROM user WHERE user_id = '$profile' ") or die (mysqli_error($db));

$out1 = mysqli_fetch_assoc($row1)

?>
<!--------------------END--------------------->

<!DOCTYPE html>
<html>
<title>Profile</title>

<style type="text/css">
	h1 {
    margin-left: 800px;
    margin-right: 800px;
    background-color: #566ffc;
    opacity: 80%;
		color: white;
		font-family: "Segoe UI",Arial,sans-serif;
	}
	table, th, td {
		color: white;
		font-family: "Segoe UI",Arial,sans-serif;
		border : 2px solid white;
		border-collapse: collapse;
		padding: 20px;
	}
	th {
    background-color: #0db1de;
    opacity: 80%;
		text-align: left;
	}
  td {
    background-color: black;
    opacity: 80%;
  }
	.btn {
		border: 1px solid white;
  		background-color: #0db1de;
  		font-size: 12px;
  		cursor: pointer;
  		display: inline-block;
      color: white;
	}
	.btn:hover {
		background: #566ffc;
    	color: white;
	}
</style>

<body>
<br><br><br><br><br>
<h1 align="center">My Profile</h1>
<!---------------------------------PROFILE------------------------------->
<div align="center">
	<table class="table">
		<tr>
			<th>Username :</th>
			<td><?php echo $out1['username']; ?></td>
		</tr>
		<tr>
			<th>Address :</th>
			<td><?php echo $out1['ad_line1']; ?></td>
		</tr>
		<tr>
			<th>City :</th>
			<td><?php echo $out1['city']; ?></td>
		</tr>
		<tr>
			<th>State :</th>
			<td><?php echo $out1['state']; ?></td>
		</tr>
		<tr>
			<th>Postal code :</th>
			<td><?php echo $out1['postal_code']; ?></td>
		</tr>
	</table>

	<br>
	<button class="btn edit" onclick="window.location.href='editProfile.php';"><h2>Edit Profile</h2></button>
  <button class="btn add" onclick="window.location.href='regAdmin.php';"><h2>Add Admin</h2></button>

<!---------------------------------USER'S FEEDBACK------------------------------->
<h1 align="center">User's Feedback</h1>
<table>
            <thead>

                <tr>
                  <th>No.</th>
                  <th>User ID</th>
                  <th>Feedbacks</th>
                  <th>User's Rating</th>

                </tr>
            </thead>

            <tbody>

                <?php 
                    $i = 1;

                    $row3 = mysqli_query($db, "SELECT * FROM feedback") or die (mysqli_error($db));

                    while ($outresult = mysqli_fetch_assoc($row3)) {

                    {
                    ?>

                    <tr>
                      <th scope="row"><?php echo $i++; ?></th>
                      <td><?php echo $outresult['user_id']; ?></td>
                      <td><?php echo $outresult['content']; ?></td>
                      <td><?php echo $outresult['rating']; ?></td>
                    </tr>

                    <?php }
                 }?>

            </tbody>
</table>
</div>
</body>
</html>