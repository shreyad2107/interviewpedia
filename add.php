<?php  

	include('config/interview_connect.php');

	$errors = array('name'=>'','email'=>'','company'=>'','position'=>'','title'=>'','experience'=>'');
	$name=''; $email=''; $company=''; $position=''; $title=''; $experience=''; 

	if(isset($_POST['submit'])){
		

		// check name
		if(empty($_POST['name'])){
			$errors['name'] = 'A name is required';
		} 
		else{
			$name = $_POST['name'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
				$errors['name'] = 'Name must be letters and spaces only';
			}
		}


		// check email
		if(empty($_POST['email'])){
			$errors['email'] = 'An email is required';
		} else{
			$email = $_POST['email'];
			if(!filter_var($email,FILTER_VALIDATE_EMAIL))
				$errors['email'] = 'Enter a valid email';
		}

		//check company
		if(empty($_POST['company'])){
			$errors['company'] = 'A company name is required';
		}
		else{
			$company = $_POST['company'];
		}

		//check position
		if(empty($_POST['position'])){
			$errors['position'] = 'A position is required';
		}
		else{
			$position = $_POST['position'];
		}

		//check title
		if(empty($_POST['title'])){
			$errors['title'] = 'A title is required';
		}
		else{
			$title = $_POST['title'];
		}

		//check experience
		if(empty($_POST['experience'])){
			$errors['experience'] = 'An experience is required';
		}
		else{
			$experience = $_POST['experience'];
		}


	
	if(array_filter($errors))
	{
		
	}
	else
	{
		$name = mysqli_real_escape_string($conn , $_POST['name']);
		$email = mysqli_real_escape_string($conn , $_POST['email']);
		$company = mysqli_real_escape_string($conn , $_POST['company']);
		$positon = mysqli_real_escape_string($conn , $_POST['position']);
		$title = mysqli_real_escape_string($conn , $_POST['title']);
		$experience = mysqli_real_escape_string($conn , $_POST['experience']);
	
		//create query
		$sql = "INSERT INTO user_info(name,email,company,position,title,experience) VALUES('$name','$email','$company','$position','$title','$experience') ";

		//save to database and check
		if(mysqli_query($conn, $sql))
		{
			//success
		} else{
			//error
			echo " Query error: ".mysqli_error($conn);
		}



		header('Location: index.php');
	}

} // end POST check

?>

<!DOCTYPE html>
<html>

<body class="changecolor">

<?php include('templates/header.php') ; ?>
<section class="container grey-text">
<h4 class="center" style="color: white;">Add your experience</h4>
<form class="white" action="<?php echo $_SERVER['PHP_SELF'] ; ?>" method="POST">
	<label>Your name:
	<input type="text" name="name" value="<?php echo htmlspecialchars($name) ?>">  </label>
	<div class="red-text"><?php echo $errors['name']; ?></div>
	
	<label>Your Email:
	<input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>"> </label>
	<div class="red-text"><?php echo $errors['email']; ?></div>
	
	<label>Company name:
	<input type="text" name="company" value="<?php echo htmlspecialchars($company) ?>"> </label>
	<div class="red-text"><?php echo $errors['company']; ?></div>

	<label>Current position: 
	<input type="text" name="position" placeholder="Positon , Institute" value="<?php echo htmlspecialchars($position) ?>"> </label>
	<div class="red-text"><?php echo $errors['position']; ?></div>

	<label>A short title to sum up your experience:
	<input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>"> </label>
	<div class="red-text"><?php echo $errors['title']; ?></div>

	<label>Your experience:
	<input type="text" name="experience" value="<?php echo htmlspecialchars($experience) ?>"> </label>
	<div class="red-text"><?php echo $errors['experience']; ?></div>

	<div class="center">
		<input type="submit" name="submit" value="submit" class="btn brand z-depth-0" style="background:#3D5A80;">
	</div>
</form>
</section>

<?php include('templates/footer.php') ; ?>
</body>
</html>


