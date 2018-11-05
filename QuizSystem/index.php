<!DOCTYPE html>
<html lang="en">
<head>
   <title>Index Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
		<div class="row">
		<div class="col-sm-12">
		<div class="panel panel-danger">
		<div class="panel-heading">Online Quiz In Php</div>
		<div class="panel-body">Quiz System</div>
		</div>
		</div>
		</div>
</div>
<div class="container">
<div class="row">
 <div class="col-sm-6">
		<div class="panel panel-danger">
		<div class="panel-heading"><h2>Login Form</h2></div>
		<div class="panel-body">
		<?php
		if(isset($_GET['run']) && $_GET['run']=="failed")
		{
			echo "Invalid UserName or Password";
		}
		?>
		<form role="form" method="post" action="signin_sub.php">
		<div class="form-group">
		<label for="email">Email:</label>
		<input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
		</div>
		<div class="form-group">
		<label for="pwd">Password:</label>
		<input type="password" class="form-control" name="pwd" id="pwd" placeholder="Enter password">
		</div>
		<button type="submit" class="btn btn-default">Submit</button>
		</form>
		</div>
	</div>
</div>
<div class="col-sm-6">
		<div class="panel panel-danger">
		<div class="panel-heading"><h2>SignUp Form</h2></div>
		<div class="panel-body">
		<?php
		if(isset($_GET['run']) && $_GET['run']=="success")
		{
			echo "Your are Successfully Login";
		}
		?>
		<form role="form" method="post" action="signup_sub.php" enctype="multipart/form-data">
		<div class="form-group">
		<label for="name">Name:</label>
		<input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
		</div>
		<div class="form-group">
		<label for="email">Email:</label>
		<input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
		</div>
		<div class="form-group">
		<label for="pwd">Password:</label>
		<input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password">
		</div>
		<div class="form-group">
		<label for="image">Upload Your Image:</label>
		<input type="file" class="form-control" id="photo" name="photo">
		</div>
		<button type="submit" class="btn btn-default">Submit</button>
		</form>
		</div>
	</div>
</div>
</div>
</div>
</body>
</html>
