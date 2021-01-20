<?php 

	include('config/interview_connect.php');

	if(isset($_POST['delete']))
	{
		$id_to_delete = mysqli_real_escape_string($conn,$_POST['id_to_delete']);

		$sql = "DELETE FROM pizzas WHERE id= $id_to_delete";

		if(mysqli_query($conn,$sql))
		{
			//success
			header('Location: index.php');
		}
		else
		{
			echo 'query error : '.mysql_error($conn);
		}
	}
	// check GET request id param
	if(isset($_GET['id'])){
		
		// escape sql chars
		$id = mysqli_real_escape_string($conn, $_GET['id']);

		// make sql
		$sql = "SELECT * FROM user_info WHERE id = $id";

		// get the query result
		$result = mysqli_query($conn, $sql);

		// fetch result in array format
		$info = mysqli_fetch_assoc($result);

		mysqli_free_result($result);
		mysqli_close($conn);

	}

?>

 <!DOCTYPE html>
 <html>
 <body class="changecolor">
<?php include('templates/header.php'); ?>

<div class="box">
	<?php if($info): ?>
		<h4><?php echo htmlspecialchars($info['company']); ?></h4>
		<p>By : <?php echo htmlspecialchars($info['name']).' , '.htmlspecialchars($info['position']); ?> </p>
		<hr> <br>
		<h6 style="color:#3D5A80;">Title: <?php echo htmlspecialchars($info['title']) ?></h6> <br>
		<hr>
		<h5 style="text-align:left;">Experience:</h5>
		<p style="text-align:left;">
		<?php echo htmlspecialchars($info['experience']) ?>
		</p>
		<!--<p><?php //echo date($info['created_at']); ?></p>-->
		<!--DELETE FORM-->
		<!--<form action="details.php" method="post">
			<input type="hidden" name="id_to_delete" value="<?php //echo $info['id'] ?>" >
			<input type="submit" name="delete" value="Delete" class="btn brand z-depth-0" style="background:#3D5A80;">
		</form>-->

	<?php else: ?>
		<h5>No such user exists.</h5>
	<?php endif ?>
</div>

<?php include('templates/footer.php'); ?>
</body>
 </html>