<?php  

//connect to database
$conn=mysqli_connect('localhost','shreya','test1234','ninja_pizza');

//chedck connection
if(!$conn)
{
	echo 'Connection error: '.mysqli_connect_error();
}

?>