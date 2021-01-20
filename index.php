<?php  

include('config/interview_connect.php');

//write query for all user_info
$sql= 'SELECT name, company, position, title, id FROM user_info ORDER BY created_at';

//make query and get result
$result=mysqli_query($conn, $sql);

//fetch the resulting rows as an array
$infom=mysqli_fetch_all($result, MYSQLI_ASSOC);

//free result from memory
mysqli_free_result($result);

//close connection
mysqli_close($conn);

//explode(',',$pizzas[0]['ingredients']);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body class="changecolor">
<?php include('templates/header.php'); ?>
<h4 class="center" style="color: #023C40;">CONTRIBUTORS</h4>
<hr>
<br>
<div class="container">
	<div class="row">
		
		<?php foreach($infom as $info) { ?>
				<div class="col s12 m6" >
					<div class="card z-depth-0" style="border: 5px solid #3D5A80">
						<img src="img/user8.png" class="user">
						<div class="card-content center">
							<h5><?php echo htmlspecialchars($info['company']) ?></h5>
							<p> By <?php echo htmlspecialchars($info['name']).' , '.htmlspecialchars($info['position']); ?> 
							<h6 style="color:#3D5A80;">Title: <?php echo htmlspecialchars($info['title']) ?></h6>
						</div>
						<div class="card-action right-align"> 
							<a class="brand-text" href="details.php?id=<?php echo $info['id'] ?>">view experience</a>
						</div>
					</div>
				</div>
		<?php } ?>

	</div>
</div>
<?php include('templates/footer.php'); ?>
</body>
</html>