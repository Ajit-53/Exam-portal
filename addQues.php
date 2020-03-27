<?php
	require("connection.php");
	if(isset($_POST['submit'])){
		$ques = $_POST['t'];
		$op1 = $_POST['o1'];
		$op2 = $_POST['o2'];
		$op3 = $_POST['o3'];
		$op4 = $_POST['o4'];
		$ans = $_POST['a'];
		$result = mysqli_query($con, "SELECT * FROM questions");
		$n = mysqli_num_rows($result);
		$n = $n + 1;
		$query = 'INSERT INTO questions values("'.$ques.'", "'.$op1.'", "'.$op2.'", "'.$op3.'", "'.$op4.'", "'.$ans.'")';
		mysqli_query($con, $query);
		mysqli_query($con, "ALTER TABLE answers ADD a".$n." int(2)");
		header('location: admin.php');
	}
?>

<html style="overflow-y: auto;">
	<head>
		<title>Examination Portal</title>
		<meta charset="utf-8">
		<link href="home.css" type="text/css" rel="stylesheet"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
		
	</head>
	
	<body>
		<nav class="navbar navbar-expand-sm bg-dark header d-flex justify-content-between">
			<h1 class = "title">Examination Portal</h1>
			<?php echo '<span id="rollno" style="text-align: right;">Administration Login <a href="logout.php"><button class="btn btn-primary" style="margin: 5px;">Log out</button></a></span>'; ?>
		</nav>
		
		<div class="container">
			<div class="col-lg-12 bg-light shadow-lg" id="d1" style="margin: 10px; padding: 10px;">
				<form action="addQues.php" method="post">
					<?php
						echo '<h3 style="text-align:left;">Enter Question </h3>';
						echo '<div class="row d-flex justify-content-center">
								<textarea name="t" row="3" style="width: 90%;"></textarea>
							</div><br>';					
						for($j = 1; $j <= 4; $j++){
							echo '<div class="row">
									<div class="col-3" style="text-align:right;">';
										echo 'Option '.$j.': ';
								echo '</div>
									<div class="col-9">';
										echo '<input type="text" name="o'.$j.'" style="width: 90%;">';
								echo '</div>
								</div>';
						}
						echo '<br><div class="row">
									<div class="col-3" style="text-align:right;">
										Correct Answer: 
									</div>
									<div class="col-9">
										<input type="number" name="a" width="50%" style="width: 90%;">
									</div>
								</div><br><br>';
					?>
					<input type="submit" value="Add Questions" class="btn btn-primary" name="submit">
				</form>
			</div>
		</div>
	</body>
</html>