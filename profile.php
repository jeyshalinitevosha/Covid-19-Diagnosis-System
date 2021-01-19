<?php 

include 'Navigation_Bar.php';
include 'server.php';

if (!($_SESSION['userType'] == 1 OR $_SESSION['userType'] == 2)) {
	header('location: login.php');
}
else {
	if (!($_SESSION['userType'] == 2)) {
		header('location: profileadmin.php');
	}
}

?>

<?php


$profile = $_SESSION['userID'];

// --------------------USER PROFILE----------------------------                 

$row2 = mysqli_query($db, "SELECT * FROM user WHERE user_id = '$profile' ") or die (mysqli_error($db));

$out = mysqli_fetch_assoc($row2) 

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
		color: white;
		border: 1px solid white;
  		background-color: #0db1de;
  		font-size: 12px;
  		cursor: pointer;
  		display: inline-block;
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
			<td><?php echo $out['username']; ?></td>
		</tr>
		<tr>
			<th>Address :</th>
			<td><?php echo $out['ad_line1']; ?></td>
		</tr>
		<tr>
			<th>City :</th>
			<td><?php echo $out['city']; ?></td>
		</tr>
		<tr>
			<th>State :</th>
			<td><?php echo $out['state']; ?></td>
		</tr>
		<tr>
			<th>Postal code :</th>
			<td><?php echo $out['postal_code']; ?></td>
		</tr>
	</table>

	<br>
	<button class="btn edit" onclick="window.location.href='editProfile.php';"><h2>Edit Profile</h2></button>

<!---------------------------------RESULT------------------------------->
<h1 align="center">Your Results</h1>
<table>
            <thead>

                <tr>
                  <th>No.</th>
                  <th>Breathing Difficulty</th>
                  <th>Cough</th>
                  <th>Fever</th>
                  <th>Fatigue</th>
                  <th>Sore Throat</th>
                  <th>Headache</th>
                  <th>Bodyache</th>
                  <th>Congestion</th>
                  <th>Loss sense of smell/taste</th>
                  <th>Outside Interaction</th>
                  <th>Chances of having Covid-19</th>

                </tr>
            </thead>

            <tbody>

                <?php 
                    $i = 1;

                    $row3 = mysqli_query($db, "SELECT * FROM result WHERE user_id = '$profile' ") or die (mysqli_error($db));

                    while ($outresult = mysqli_fetch_assoc($row3)) {

                    {
                    ?>

                    <tr>
                      <th scope="row"><?php echo $i++; ?></th>
                      <td><?php echo $outresult['Q1']; ?></td>
                      <td><?php echo $outresult['Q2']; ?></td>
                      <td><?php echo $outresult['Q3']; ?></td>
                      <td><?php echo $outresult['Q4']; ?></td>
                      <td><?php echo $outresult['Q5']; ?></td>
                      <td><?php echo $outresult['Q6']; ?></td>
                      <td><?php echo $outresult['Q7']; ?></td>
                      <td><?php echo $outresult['Q8']; ?></td>
                      <td><?php echo $outresult['Q9']; ?></td>
                      <td><?php echo $outresult['Q10']; ?></td>
                      <td><?php echo $outresult['overall']; ?></td>
                    </tr>

                    <?php }
                 }?>

            </tbody>
</table>
</div>
</body>
</html>