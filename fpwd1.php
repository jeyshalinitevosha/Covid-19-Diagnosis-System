<?php

    include 'server.php';

    if (!empty(($_SESSION['email']))) {

        if(isset($_POST['submit']))
        {
            $food = $_POST['favfood'];
            $color = $_POST['favcolor'];
            $animal = $_POST['favanimal'];

            $email = $_SESSION['email'];
            $query = "SELECT * FROM user WHERE email = '$email'";
            $result = mysqli_query($db, $query);
            $row = mysqli_fetch_assoc($result);
        
            $ans1 = $row['ans1'];
            $ans2 = $row['ans2'];
            $ans3 = $row['ans3'];

            if (!empty(($ans1)) && !empty(($ans2)) && !empty(($ans3))) {
                
                if ($ans1 == $food && $ans2 == $color && $ans3 == $animal) {
                    header ('location: fpwd2.php');
                }
                else {
                    echo "Wrong answer";
                }
            }
            else {
                echo "Please enter all the answers";
            }
        }
    }
    else {
        header('location: fpwd.php');
    }

?>

<!DOCTYPE html>

<html>

    <head>

        <title>Security Questions</title>
        <link rel="stylesheet"href="layouts.css"type="text/css">

    </head>

    <body>

        <div class="header">
			<h2>Security Questions</h2>
		</div>

        <form action="" method="post" class="form">

            <?php include('errors.php'); ?>
            <div class="input-group"><label>What is your favourite food?</label>
            <input type="text" name="favfood" /></div>
            <div class="input-group"><label>What is your favourite color?</label>
            <input type="text" name="favcolor" /></div>
            <div class="input-group"><label>What is your favourite animal?</label>
            <input type="text" name="favanimal" /></div>
            <div class="input-group"><input type="submit" class="btn" value="Submit" name="submit" /></div>
        </form>

    </body>

</html>