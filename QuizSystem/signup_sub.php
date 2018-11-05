<?php
include("class/users.php");
$register = new users;
extract($_POST);// it return the value of a form field with same variable which is used to name the element of form
$img_name = $_FILES['photo']['name']; // give the name of the image and insert into the $img_name variable
$tmp_name = $_FILES['photo']['tmp_name']; // give the temporary name of the image and insert into the $tmp_name variable
move_uploaded_file($tmp_name,"img/".$img_name);// move the image from the img folder with $img_name variable name
$query = "insert into signup(`name`, `email`, `pass`, `img`) values('$name','$email','$pwd','$img_name')"; // insert query
if($register->signup($query)) // call signup() function
{	$register->url("index.php?run=success");// call url funciton
}
else
	echo "Something Wrong is Happening.";
?>