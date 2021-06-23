<?php 
require_once 'includes/db.php';

// if the form's update button is clicked, we need to process the form
	if (isset($_POST['update'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$designation = $_POST['designation'];
		$salary = $_POST['salary'];
		$hobby = $_POST['hobby'];
		$gender = $_POST['gender'];
		$about = $_POST['about'];
		$birthday = $_POST['birthday'];
		$pitcure = $_POST['pitcure'];

		// write the update query
		$$sql = "UPDATE `employee_info`
		SET `name`='$name',`email`='$email',`password`='$password',`designation`='$designation',`salary`='$salary'
		`hobby`='$hobby',`gender`='$gender',`about`='$about',`birthday`='$birthday',`picture`='$picture' WHERE `emp_idid`='$emp_id'";

		// execute the query
		$result = $conn->query($sql);
		if ($result == TRUE) {
			echo "Record updated successfully.";
		}else{
			echo "Error:" . $sql . "<br>" . $conn->error;
		}
	}
	


// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['emp_id'])) {
		$emp_id = $_GET['emp_id'];
	// write SQL to get user data
	$sql = "SELECT * FROM `employee_info` WHERE `emp_id`='$emp_id'";

	//Execute the sql
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		
		while ($row = $result->fetch_assoc()) {
			$name = $row['name'];
			$email = $row['email'];
			$password = $row['password'];
			$designation = $row['designation'];
			$salary = $row['salary'];
			$hobby = $row['hobby'];
			$gender = $row['gender'];
			$about = $row['about'];
			$birthday = $row['birthday'];
			$picture = $row['picture'];
		}
		?>
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<!-- Meta, title, CSS, favicons, etc. -->
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
		
			<title>UPDATE</title>
			
			<script src="http://jsfiddle.net/aelor/F6sEv/325/"></script>
			<link href="css/bootstrap.min.css" rel="stylesheet">
			<link href="css/animate.min.css" rel="stylesheet">
			<link href="css/custom.min.css" rel="stylesheet">
			<link href="http://jsfiddle.net/aelor/F6sEv/324/" rel="stylesheet">
		</head>
		
		<div class="col-lg-12 text-center ">
			
		</div>
		<br>
		<h1 align = "center"style="font-family:Lucida Console">CRUD</h1>
		
		<body class="login" style="margin-top: -20px;">
		
		
		
			<div class="login_wrapper">
		
					<section class="login_content" style="margin-top: -40px;">
						<form name="form1" action="" method="post">
						   
		
							<div>
			<form action="registration.php" method="post">
				<div class="container">
					
					<div class="row">
						<div class="col-sm-3">
							<hr class="mb-3">
				<form action="" method="post">
				  <fieldset>
					<legend>Personal information:</legend>
					First name:<br>
					
					<input type="hidden" name="emp_id" value="<?php echo $id; ?>">
					<input type="text" name="name" value="<?php echo $name; ?>">
					<br>
					Email:<br>
					<input type="email" name="email" value="<?php echo $email; ?>">
					<br>
					Password:<br>
					<input type="password" name="password" value="<?php echo $password; ?>">
					<br>
					<br>
					designation:<br>
					<input type="text" name="designation" value="<?php echo $designation; ?>">
					
				   
					salary:<br>
					<input type="text" name="salary" value="<?php echo $salary; ?>">
					<br> <br>
					hobby:<br>
					<input type="text" name="hobby" value="<?php echo $hobby; ?>">
					<br> <br>
					 Gender:<br>
					<input type="radio" name="gender" value="Male" <?php if($gender == 'Male'){ echo "checked";} ?> >Male
					<input type="radio" name="gender" value="Female" <?php if($gender == 'Female'){ echo "checked";} ?>>Female
					<br><br>
					<br>
					about:<br>
					<input type="text" name="about" value="<?php echo $about; ?>">
					<br> <br>
					birthday<br>
					<input type="text" name="lastname" value="<?php echo $birthday; ?>">
					<br><br>
					picture<br>
					<input type="text" name="picture" value="<?php echo $picture; ?>">
					<br>
					<hr class="mb-3">
							<input class="btn btn-primary" type="submit" id="update" name="update" value="Update">
						</div>
					</div>
				</div>
			</form>
		</div>            </section>
		<div class="alert alert-success col-lg-12 col-lg-push-0">
				Update successfully, You will get email when your account is approved
			</div>
		
			<?php
			} else{
				// If the 'id' value is not valid, redirect the user back to view.php page
				header('Location: view.php');
			}
		
		}
		?>