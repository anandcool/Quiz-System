<?php
include("class/users.php");
$ans = new users; // make the object of user class for using functions.
//print_r($_POST);
$answer = $ans->answer($_POST);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Answer</title>
		  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
<div class="container">
  <h2 align="center">Your Performance</h2>
<div class="col-sm-2"></div>
<div class="col-sm-8">     
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Total Number of Questions</th>
        <th><?php echo $answer['right'] + $answer['wrong']+ $answer['noanswer'];?></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Attempted Questions</td>
        <td><?php echo $answer['right'] + $answer['wrong'];?></td>
      </tr>
      <tr>
        <td>Right Answer</td>
        <td><?php echo $answer['right'];?></td>
      </tr>
	   <tr>
        <td>Wrong Answer</td>
        <td><?php echo $answer['wrong'];?></td>
      </tr>
	  	<tr>
        <td>No Answer</td>
        <td><?php echo $answer['noanswer'];?></td>
      </tr>
	  	<tr>
        <td>Your Result</td>
        <td><?php echo ($answer['right']*100)/($answer['right'] + $answer['wrong']+ $answer['noanswer']);?>%</td>
      </tr>
    </tbody>
  </table>
</div>
</div>
<div class="col-sm-2"></div>
	</body>
</html>