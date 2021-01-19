<?php include 'Navigation_Bar.php';

session_start();

if (!($_SESSION['userType'] == 1 OR $_SESSION['userType'] == 2)) {
    header('location: login.php');
}

?>

<!DOCTYPE html>
<html>
<title>Contact Us</title>
<meta charset="utf-8">
<link rel="stylesheet" href="contactstyles.css">

<body id="contactPage">

<!-- Header Photo -->
<div align="center"><br><br><br><br><br>
  <img src="covid.jpg" alt="virus" style="width:fill; min-height:350px; max-height:600px;">
</div>

<!-- Contact Team -->
<div class="container" id="team" align="center">
	<h2>CONTACT OUR TEAM</h2>
	<p id="instruction">*You can click the team members name to see their biography.</p>

	<div class="row"><br>

		<div class="column">
  			<button class="btn nur"><h3><a href="Profilenur.html" target="_blank" rel="noopener noreferrer">Muhd Nur</a></h3></button>
  			<p>email : matnur1999@gmail.com</p>
  			<p>phone no : 018-4634375</p>
		</div>

		<div class="column">
  			<button class="btn haziq"><h3><a href="ProfileHzq.html" target="_blank" rel="noopener noreferrer">Abdul Haziq</a></h3></button>
  			<p>email : B031810256@student.utem.edu.my</p>
  			<p>phone no : 013-9728549</p>
		</div>

		<div class="column">
  			<button class="btn jeysha"><h3><a href="Profilejeysha.html" target="_blank" rel="noopener noreferrer">Jeyshalini</a></h3></button>
  			<p>email : shatevo@yahoo.com</p>
  			<p>phone no : 013-2451402</p>
		</div>

		<div class="column">
  			<button class="btn nabil"><h3><a href="Profilenabil.html" target="_blank" rel="noopener noreferrer">Muhammad Nabil</a></h3></button>
  			<p>email : nabilimran212@gmail.com</p>
  			<p>phone no : 011-10157505</p>
		</div>

		<div class="column">
  			<button class="btn pal"><h3><a href="Profilenaufal.html" target="_blank" rel="noopener noreferrer">Ahmad Naufal</a></h3></button>
  			<p>email : nnnaufal12@gmail.com</p>
  			<p>phone no : 013-3159707</p>
		</div>

	</div>
</div>

</body>
</html>