<?php include 'server.php';?>
<!DOCTYPE html>
<html lang="en">
<title>Covid-19 Pre-Diagnosis</title>
<link rel="stylesheet" href="CSS_Styling.css">


<?php

$err = "";
$high = "";
$moderate = "";
$low = "";
$feedback = "";

    if(isset($_POST['submitDiagnosis']))
    {
        if(!empty($_POST['Q1'])&&!empty($_POST['Q2'])&&!empty($_POST['Q3'])&&!empty($_POST['Q4'])&&!empty($_POST['Q5'])&&!empty($_POST['Q6'])&&!empty($_POST['Q7'])&&!empty($_POST['Q8'])&&!empty($_POST['Q9'])&&!empty($_POST['Q10'])) 
        {
          $weight = 0;
          $risk = "";
          $userID = $_SESSION['userID'];
          $Q1 = $_POST['Q1'];
          $Q2 = $_POST['Q2'];
          $Q3 = $_POST['Q3'];
          $Q4 = $_POST['Q4'];
          $Q5 = $_POST['Q5'];
          $Q6 = $_POST['Q6'];
          $Q7 = $_POST['Q7'];
          $Q8 = $_POST['Q8'];
          $Q9 = $_POST['Q9'];
          $Q10 = $_POST['Q10'];

            if($Q1 == 'Yes'){
              $weight = $weight + 2;
            }
            else {
              $weight = $weight + 0;
            }
            if($Q2 == 'Yes'){
              $weight = $weight + 2;
            }
            else {
              $weight = $weight + 0;
            }
            if($Q3 == 'Yes'){
              $weight = $weight + 2;
            }
            else {
              $weight = $weight + 0;
            }
            if($Q4 == 'Yes'){
              $weight = $weight + 2;
            }
            else {
              $weight = $weight + 0;
            }
            if($Q5 == 'Yes'){
              $weight = $weight + 1;
            }
            else {
              $weight = $weight + 0;
            }
            if($Q6 == 'Yes'){
              $weight = $weight + 1;
            }
            else {
              $weight = $weight + 0;
            }
            if($Q7 == 'Yes'){
              $weight = $weight + 1;
            }
            else {
              $weight = $weight + 0;
            }
            if($Q8 == 'Yes'){
              $weight = $weight + 1;
            }
            else {
              $weight = $weight + 0;
            }
            if($Q9 == 'Yes'){
              $weight = $weight + 1;
            }
            else {
              $weight = $weight + 0;
            }
            if($Q10 == 'Yes'){
              $weight = $weight + 3;
            }
            else {
              $weight = $weight + 0;
            }

            if($weight >= 10){
              $risk = "High";
              $high = "You have a High Chance of having Covid-19";
            }
            else if($weight >= 6 && $weight < 10){
              $risk = "Moderate";
              $moderate = "You have a Moderate Chance of having Covid-19";
            }
            else{
              $risk = "Low";
              $low = "You have a Low Chance of having Covid-19";
            }

          $queryDiagnosis = "INSERT INTO result (user_id, Q1, Q2, Q3, Q4, Q5, Q6, Q7, Q8, Q9, Q10, overall) VALUES ('$userID', '$Q1', '$Q2', '$Q3', '$Q4', '$Q5', '$Q6', '$Q7', '$Q8', '$Q9', '$Q10', '$risk')"; 
          mysqli_query($db, $queryDiagnosis);

          $feedback = "Please give us your feedback";

        }
        else {
        $err = "Please answer all question";
        }
    }
?>

<body id = "diagbody">

  <div class="centerdiag">
    <form action="HomePage.php" method="get">
    <button>Return to HomePage</button>
    </form>
  </div>

  <div id="diagnosis">
    <form action="" method="post" >
    <h1 style="text-align: center;">Covid-19 Prediagnosis</h1>
    <h2 style="text-align: center; color: red;"><?php echo $err;?></h2>
    <h2 style="text-align: center; color: red;"><?php echo $high;?></h2>
    <h2 style="text-align: center; color: yellow;"><?php echo $moderate;?></h2>
    <h2 style="text-align: center; color: lightgreen;"><?php echo $low;?></h2>
    <h2 style="text-align: center;"><a href="feedback.php"><?php echo $feedback ?></a></h2>
    <p>Do you have breathing difficulty?</p>  
    <label>
        <input type="radio" name="Q1" value="Yes">Yes
    </label>
    <label>
        <input type="radio" name="Q1" value="No">No
    </label>
    <br>

    <p>Do you have a cough that gets more severe over time?</p> 
    <label>
        <input type="radio" name="Q2" value="Yes">Yes
    </label>
    <label>
        <input type="radio" name="Q2" value="No">No
    </label>
    <br>

    <p>Do you have a fever?</p>
    <label>
        <input type="radio" name="Q3" value="Yes">Yes
    </label>
    <label>
        <input type="radio" name="Q3" value="No">No
    </label>
    <br>

    <p>Do you feel fatigue?</p>
    <label>
        <input type="radio" name="Q4" value="Yes">Yes
    </label>
    <label>
        <input type="radio" name="Q4" value="No">No
    </label>
    <br>

    <p>Do you have a sore throat?</p>
    <label>
        <input type="radio" name="Q5" value="Yes">Yes
    </label>
    <label>
        <input type="radio" name="Q5" value="No">No
    </label>
    <br>

    <p>Do you have a headache?</p>
    <label>
        <input type="radio" name="Q6" value="Yes">Yes
    </label>
    <label>
        <input type="radio" name="Q6" value="No">No
    </label>
    <br>

    <p>Do you have bodyache like muscle pain?</p>
    <label>
        <input type="radio" name="Q7" value="Yes">Yes
    </label>
    <label>
        <input type="radio" name="Q7" value="No">No
    </label>
    <br>

    <p>Do you have a congestion?</p>
    <label>
        <input type="radio" name="Q8" value="Yes">Yes
    </label>
    <label>
        <input type="radio" name="Q8" value="No">No
    </label>
    <br>

    <p>Have you loss your sense of taste/smell?</p>
    <label>
        <input type="radio" name="Q9" value="Yes">Yes
    </label>
    <label>
        <input type="radio" name="Q9" value="No">No
    </label>
    <br>

    <p>Have you gone outside or interact with other people for the past 14 days?</p>
    <label>
        <input type="radio" name="Q10" value="Yes">Yes
    </label>
    <label>
        <input type="radio" name="Q10" value="No">No
    </label>
    <br>
    <br>
    <input type="submit" name="submitDiagnosis" value ="Submit Answers">
    <br>
    <br>
    </form>
  </div>

</body>

</html>