<?php
include 'server.php';
include 'Navigation_Bar.php';

if (!($_SESSION['userType'] == 1 OR $_SESSION['userType'] == 2)) {
    header('location: login.php');
}

?>

<!DOCTYPE html>

<html>

    <head>
        <title>Feedback</title>

        <link rel="stylesheet"href="fbackcss.css"type="text/css">

        <script type="text/javascript">

            function myConfirm() {
            var answer = confirm("All of the information you filled will be empty. Are you sure you want to reset the form?");
                if (answer)
                    { window.location="feedback.php";}
                else
                    { document.write ("The form is not emptied.");}
            }

        </script>

    </head>

    <body align=center>

        <br/><br/><br/><br/><br/>

        <div id="fbbox">

        <h2 id="fbheader">Your feedback matters!</h2>

        <form method="post" class="form"  action="feedback.php">

            <p>Please tell us your experience on using our website!</p>
            
            <p>Rate your experience from 1 to 10</p>

            <input type="range" min="1" max="10" step="1" value="5" name="fb" />

            <p>And tell us what can we do to improve your experience!</p>

            <input type="text" name="contn" style="width: 520px; height: 200px;"><br/>

            <input type="submit" class="btn" value="Submit" name="feedbtn" onClick="window.alert('Thank you for your feedback!');"/>
            <input type="button" class="btn" value="Reset" onClick="myConfirm();" />

        </form>

        </div>

    </body>
    <?php

    if (isset($_POST['feedbtn'])) {
        if(!empty($_POST['fb'])&&!empty($_POST['contn']))
        {
          $userID = $_SESSION['userID'];
          $rating = $_POST['fb'];
          $context = $_POST['contn'];
          $queryfeed = "INSERT INTO feedback (user_id, rating, content) VALUES ('$userID', '$rating', '$context')"; 
          mysqli_query($db, $queryfeed);
          header('location: HomePage.php');
        }
        else 
        {
            echo 'Please do not leave it empty';
        }
    }
    ?>
</html>