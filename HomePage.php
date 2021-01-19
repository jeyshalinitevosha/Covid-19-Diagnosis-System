<?php include 'Navigation_Bar.php';?>


<!--Kick people if they haven't login yet-->
<?php
session_start();

if (!($_SESSION['userType'] == 1 OR $_SESSION['userType'] == 2)) {
    header('location: login.php');
}

?>
<!--------------------END--------------------->

<!DOCTYPE html>
<html lang="en">
<title>Home Page</title>
<link rel="stylesheet" href="CSS_Styling.css">


<header id="HomePage_Header">
  <h1>COVID-19 PRE-DIAGNOSIS</h1>
  <p>Feeling nervous that you may have covid?</p>
  <p>Try answering our question to find out!</p>
  <form action="diagnosis.php" method="get">
  <button>Start Answering</button>
  </form>
</header>

<body id="HomePage_Body">
  <div class="HomePage_Class1">
    <img src="Covid-19.png" style="width: 100%; height: 100%;">
  </div>
  <div class="HomePage_Class2" style="background-color: #45abff;">
    <h1>What is Covid-19?</h1>
    <p>Coronavirus disease 2019 (COVID-19) is a contagious disease caused by severe acute respiratory syndrome coronavirus 2 (SARS-CoV-2). The first case was identified in Wuhan, China, in December 2019. It has since spread worldwide, leading to an ongoing pandemic.</p>
  </div>
</body>

<script SameSite="None; Secure" src="https://static.landbot.io/landbot-3/landbot-3.0.0.js"></script>
<script>
  var myLandbot = new Landbot.Livechat({
    configUrl: 'https://chats.landbot.io/v3/H-794847-QIJP6MA1TEWPJOTS/index.json',
  });
</script>
</html>