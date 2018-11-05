<?php
include("class/users.php");
$email = $_SESSION['email']; // in $email variable retrive the value through $_SESSION['email'] variable
$profile = new users; // make the object of users class for using the function
$profile->users_profile($email);// call the users_profile() function
//print_r($profile->data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Online Quiz in php</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
    <li><a data-toggle="tab" href="#menu1">Profile</a></li>
    <li class="pull-right"><a  href="logout.php">Logout</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>HOME</h3>
	<center><button class="btn btn-primary" type="button" data-toggle="tab" href="#sel1">Start Quiz</button></center>
	<br><br>
	<div class="col-sm-4"></div>
	<div class="col-sm-4" id="sel1">
	<form method="post" action="qus_show.php"> 
	<select class="form-control" name="cat">
	<option>Select Cateogry</option>
	<?php

	$profile->cat_shows(); // call the category function

	foreach($profile->cat as $category) // value of $cat array is given $category in each iteration
	{?>
    <option value="<?php echo $category['id'];?>"><?php echo $category['cat_name'];?></option>
	<?php
	}
	?>
   </select>
   <br><br>
   <center><input type="submit" value="Submit" class="btn btn-primary"></center>
   </form>
	</div>
	<div class="col-sm-4"></div>
	<div id="sel1" class="tab-pane fade">
  </div>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Showing Your Profile</h3>
	  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
		<th>Image</th>
      </tr>
    </thead>
    <tbody>
	<?php
	foreach($profile->data as $prof) // value of $data array is given to $prof variable in each iteration
	{
	?>
      <tr>
        <td><?php echo $prof['id']?></td>
        <td><?php echo $prof['name']?></td>
        <td><?php echo $prof['email']?></td>
        <td><img src="img/<?php echo $prof['img']?>" style="width:300px;height:100px"/></td>		
      </tr>
	  <?php
	}
	  ?>
    </tbody>
  </table>

    </div>
    <div id="menu2" class="tab-pane fade">
    </div>
  </div>
</div>

</body>
</html>
