<style type="text/css">

ul {
  font-family:"Segoe UI",Arial,sans-serif;
  border: 1px solid black;
  list-style-type: none;
  padding: 0;
  background-color: #0db1de;
  position: fixed;
  top: 0;
  width: 99%;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 18px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #566ffc;
}

div {
  font-family:"Segoe UI",Arial,sans-serif;
}

footer {
  font-family:"Segoe UI",Arial,sans-serif;
}

#igback {
  background-color: lightblue;
}

body {
    background-image: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ),url('dna.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;

}

</style>

<script>
function myConfirm1() {
  var answer1 = confirm("Are you sure to logout?");

  if (answer1)
  {
    window.location="logout.php";
  }
  else
  {
    window.location="HomePage.php";
  }
}
</script>

<ul>
  <li><a href="HomePage.php">Home Page</a></li>
  <li><a href="infograf.php">Covid-19 Infographic</a></li>
  <li><a href="contact.php">Contact Us</a></li>
  <li><a href="profile.php">Profile</a></li>
  <li><a onclick="myConfirm1()">Log out</a></li>
</ul>
