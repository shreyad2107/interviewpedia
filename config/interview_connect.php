<?php  

//connect to database
$conn=mysqli_connect('localhost','shreya','test1234','interview_project');

//chedck connection
if(!$conn)
{
	echo 'Connection error: '.mysqli_connect_error();
}

?>