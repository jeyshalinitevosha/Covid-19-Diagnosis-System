<?php

    include 'server.php';

    if(isset($_POST['submit']))
    {
        $email = $_POST['email'];
        $query = "SELECT * FROM user WHERE email = '$email'";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);
        
        $email1 = $row['email'];
        $password = $row['password'];
        $password = md5($password);
        if (!empty($email))
            if ($email==$email1) {
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: fpwd1.php');
                echo "Email valid";
            }
            else {
                echo "Invalid Email";
            }
    }

?>

<!DOCTYPE html>

<html>

    <head>

        <title>Forgot Password</title>
        <link rel="stylesheet"href="layouts.css"type="text/css">

    </head>

    <body>

        <div class="header">
			<h2>Forgot Password</h2>
		</div>

        <form action="" method="post" class="form">

            <?php include('errors.php'); ?>

            <div class="input-group">
            <label>Enter your email</label>
            <input type="text" name="email" /><br>
            <input type="submit" class="btn" value="Submit" name="submit" />
            </div>

        </form>

    </body>

</html>