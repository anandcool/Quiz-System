<?php
session_start();
include("class/users.php");
$qus = new users;
$cat = $_POST['cat'];
$qus->qus_show($cat); // call the qus_show() from the users class
$_SESSION['cat'] = $cat; // using in answer.php page
 //echo "<pre>";
//print_r($qus->qus);
?>
<!DOCTYPE html>
<html>
<head>
   <title>Question Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">
function timeOut(){
	// Add logic how to show hour
	var hour = Math.floor(timeLeft/3600); // gi
	var minute=Math.floor(timeLeft/60);
	var second = timeLeft%60;
	if(timeLeft<=0)
	{
	clearTimeout(time);
	document.getElementById("form1").submit(); // form submit
	}
	else
	{
		if(minute<10)
		{
			minute = "0"+minute;
		}
		if(second<10)
		{
			second = "0"+second;
		}
		document.getElementById("time").innerHTML=minute+":"+second;
	}
	timeLeft--;
	var time = setTimeout(function (){timeOut()},1000);
} 
 </script>
</head>
<body onLoad="timeOut()"> <!--call timeout function on load of the body tag because time has been running if time is zero then automatically form submit--> 

<div class="container">
<div class="col-sm-2"></div>
<div class="col-sm-8">
  <h2>Online Quiz in php
  <script type="text/javascript">
  var timeLeft=1200;
  </script>
  <div id="time" style="float:right">Time</div></h2>
  <form action="answer.php" method="post" id="form1">
  <?php
	$i=1;
  foreach($qus->qus as $qust)//value of $qus array is given $qust in each iteration
  {;
  ?>
  <table class="table table-bordered">
    <thead>
      <tr class="danger">
        <th><?php echo $i; ?> <?php echo $qust['question'];?> </th>
      </tr>
    </thead>
    <tbody>
      <tr class="primary">
        <td>&nbsp;1&emsp;<input type="radio" value="0" name="<?php echo $qust['id'];?>"/>&nbsp; <?php echo $qust['ans1'];?> </td>
      </tr>
	  <tr class="success">
        <td>&nbsp;2&emsp;<input type="radio" value="1" name="<?php echo $qust['id'];?>"/>&nbsp;  <?php echo $qust['ans2'];?> </td>
      </tr>
	  <tr class="warning">
        <td>&nbsp;3&emsp;<input type="radio" value="2" name="<?php echo $qust['id'];?>"/>&nbsp;  <?php echo $qust['ans3'];?> </td>
      </tr>
	  <tr class="info">
        <td>&nbsp;4&emsp;<input type="radio"  value="3"name="<?php echo $qust['id'];?>"/>&nbsp;  <?php echo $qust['ans4'];?> </td>
      </tr>
	 <tr class="info"> <!--if a user does not choose any option then this value is automatically go to next page-->
        <td><input type="radio" value="no_attempt" style="display:none" checked="checked" name="<?php echo $qust['id'];?>"/> </td>
      </tr>
    </tbody>
  </table>
  <?php
	$i++;}
  ?>
  <center><input type="submit" class="btn btn-success" value="Submit Quiz"/></center>
  </form>
</div>
</div>
<div class="col-sm-2"></div>
</body>
</html>