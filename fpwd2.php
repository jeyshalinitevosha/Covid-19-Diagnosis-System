<?php

    include 'server.php';

    if (!empty(($_SESSION['email']))) {

        if(isset($_POST['submit']))
        {
            $password = $_POST['password'];
            $password1 = $_POST['password1'];

            $email = $_SESSION['email'];
            $query = "SELECT * FROM user WHERE email = '$email'";
            $result = mysqli_query($db, $query);
            $row = mysqli_fetch_assoc($result);

            if (!empty(($password)) && !empty(($password1))) {
                
                if ($password == $password1) {
                    $password = md5($password);
                    $reset = "UPDATE user SET password = '$password' WHERE email = '$email'";
                    $respwd = mysqli_query($db, $reset);
                    session_destroy();
                    header('location: login.php');
                }
                else {
                    echo "Both password not same";
                }
            }
            else {
                echo "Please enter the password";
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

        <title>Reset Password</title>
        <link rel="stylesheet"href="layouts.css"type="text/css">

    </head>

    <body>

        <div class="header">
			<h2>Reset Password</h2>
		</div>

        <form action="" method="post" class="form">
            <div class="input-group"><label>New Password</label>
            <input type="password" name="password" /></div>
            <div class="input-group"><label>Confirm Password</label>
            <input type="password" name="password1" /></div>
            <div class="input-group"><input type="submit" class="btn" value="Submit" name="submit" /></div>
        </form>

    </body>

</html>