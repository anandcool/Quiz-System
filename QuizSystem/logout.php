<?php
include("class/users.php");
$profile = new users; // make the object of users class for using the function
session_destroy();
$profile->url("index.php");

?>