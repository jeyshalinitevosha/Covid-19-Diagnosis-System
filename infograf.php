<?php include 'Navigation_Bar.php';

session_start();

if (!($_SESSION['userType'] == 1 OR $_SESSION['userType'] == 2)) {
    header('location: login.php');
}

?>

<!DOCTYPE html>

<html>
<head>
<title>Infografic</title>
<style>
h2{
    color: white;
}

footer{
    color: white;
}
</style>
</head>
<body align=center id="igback">

    <br/><br/><br/><br/><br/>

    <div>
        <img src="cd19.png" alt="" style="height:fit-content;width:250mm;">
        <img src="generalWA.jpg" alt="" style="height:fit-content;width:250mm;">
        <img src="todo.png" alt="" style="height:auto;width:250mm;">
        <img src="dons.png" alt="" style="height:auto;width:250mm;">
        <img src="treatnpreven.jpg" alt="" style="height:fit-content;width:250mm;">
    </div>

</body>
<footer>
    Covid Prediagnosis System(c)2020-2020
</footer>

<script SameSite="None; Secure" src="https://static.landbot.io/landbot-3/landbot-3.0.0.js"></script>
<script>
  var myLandbot = new Landbot.Livechat({
    configUrl: 'https://chats.landbot.io/v3/H-794847-QIJP6MA1TEWPJOTS/index.json',
  });
</script>

</html>