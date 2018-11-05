<?php
@session_start();
class users{
	public $host = "localhost";
	public $username = "root";
	public $pass = "12345";
	public $db ="quiz_in_php";
	public $conn;
	public $data = array();
	public $cat = array();
	public $qus;
	
	public function __construct() // magic function which is called automatically when object of users class is created in any page
	{
		$this->conn = new mysqli($this->host,$this->username,$this->pass,$this->db); // connection established through this function
		if($this->conn->connect_errno)
		{
			die("database connection failed".$this->conn->connect_errno);
		}
	}
	
	public function signup($data)
	{
			$this->conn->query($data); // fire the sql query and insert data in a table.
			
			return true;
			
	}
	
	public function signin($email,$pass)
	{
			$query = $this->conn->query("select * from signup where email = '$email' and pass ='$pass'"); // match the email and password field from the database value
			$query->fetch_array(MYSQLI_ASSOC); // gives the array as an associative array[array with named index]
			if($query->num_rows>0) // check it the result from the select query is greater than 0
			{
				$_SESSION['email'] = $email; // insert the value in a session
				return true;
			}
			else
			{
				return false;
			}
	}
	public function users_profile($email) // show the user profile function
	{
		$query = $this->conn->query("select * from signup where email = '$email'"); // match the email field from the database value
		$row = $query->fetch_array(MYSQLI_ASSOC); // gives the array as an associative array[array with named index]
		if($query->num_rows>0)// check it the result from the select query is greater than 0
		{
			$this->data[] = $row;// insert the array of $row in a $data variable
		}
		return $this->data; // return $data array
	}
	
	public function cat_shows() // show the category function
	{
		$query = $this->conn->query("select * from category"); // select all the field from the category table
		while($row = $query->fetch_array(MYSQLI_ASSOC)) // gives the array as an associative array[array with named index]
		{
			$this->cat[] = $row; // insert the value of all $row array varible to $cat array variable
		}
		return $this->cat;	// return the $cat array variable
		
	}
	public function qus_show($qus) // show the question 
	{	
		$query = $this->conn->query("select * from questions where 	cat_id = '$qus'");// match the cat_id field from the database value and after that select all field from the database
		while($row = $query->fetch_array(MYSQLI_ASSOC))// gives the array as an associative array[array with named index]
		{
			$this->qus[] = $row;//insert the value of all $row array varible to $qus array variable
		}
		return $this->qus; // return the $qus variable
		
	}
	public function answer($data)
	{
		//session_start();
		//echo $_SESSION['cat'];
		$ans = implode("",$data);
		$right =0;
		$wrong =0;
		$noanswer=0;
		$query = $this->conn->query("select id,ans from questions where cat_id= '".$_SESSION['cat']."'");
		while($qust = $query->fetch_array(MYSQLI_ASSOC))
		{
			if($qust['ans']==$_POST[$qust['id']])
			{
				$right++;
			}
			elseif($_POST[$qust['id']] == "no_attempt")
			{
				$noanswer++;
			}
			else
				$wrong++;
		}
		$array = array();
		$array['right']=$right;
		$array['wrong']=$wrong;
		$array['noanswer']=$noanswer;
		return $array;
		
	}
	public function add_quiz($rec)
	{
		$a = $this->conn->query($rec);
		return true;
	}
	public function url($url) 
	{
		header("location:".$url); // header the redirect from the current page to a given named page value of the named page  in the $url variable
	}

}
?>