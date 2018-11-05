<?php
extract($_POST);
include "../class/users.php"; // include the user class
$quiz = new users;
$qus = htmlentities($questions); // htmlentities function is used so that database has not saved @#or space character
$op1 = htmlentities($op1);
$op2 = htmlentities($op2);
$op3 = htmlentities($op3);
$op4 = htmlentities($op4);
$array = [$op1,$op2,$op3,$op4];
$answer = array_search($ans,$array);// array_search give the key  of the matched value
$qry = "INSERT INTO `questions`(`question`, `ans1`, `ans2`, `ans3`, `ans4`, `ans`, `cat_id`) VALUES ('$qus','$op1','$op2','$op3','$op4','$answer','$cat')";
if($quiz->add_quiz($qry))
{
	$quiz->url("dashboard.php?msg=run");
	echo "Data is Inserted Successfullly";
}
?>
