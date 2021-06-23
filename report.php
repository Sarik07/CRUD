<?php
require_once 'includes/db.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>REPORT</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<br>

<div class="col-lg-12 text-center ">
    <h1 style="font-family:Lucida Console">REPORT</h1>
</div>


<body class="login" style="margin-top: -20px;">



    <div class="login_wrapper">

            <section class="login_content" style="margin-top: -40px;">
                <form name="form1" action="" method="post">
                    <br>

                    <div>
    <form action="registration.php" method="post">
        <div class="container">
        <div class="row">
                <div class="col-sm-3">
                    <hr class="mb-3">
                    <label for="name"><b>Name</b></label>
                    <input class="form-control" id="name"  type="text" name="name" required>
                    <label for="designation">Designation:</label>
  <select class="form-control"type= "designation" name="designation" id="designation"requiered>
    <option value="CGA">CGA</option>
    <option value="CGB">CGB</option>
    <option value="GMB">GMB</option>
    <option value="CGP">CGP</option>
    <option value="Master CGP">Master CGP</option>
    <option value="CGR">CGR</option>
    <option value="GMR">GMR</option>
    <option value="CAPS">CAPS</option>
  </select>
  <p><label for="gender"><b> Gender</b>
<input type="radio" id="male" name="gender" value="male"for="male">Male <p>&emsp; &emsp; &emsp; <input type= "radio" id="female" name="gender" value="female"for="female">Female</label><br></p>
                    <input class="btn btn-primary" type="submit" id="report" name="report" value="Report">
            <div class="row">
                <div class="col-sm-3">
                    <hr class="mb-3">
                    <table border="1" cellspacing="5" cellpadding="5" width="100% height=20%">
	<!-- <thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Designation</th>
			 <th>Salary</th>
			<th>Hobby</th>
			<th>Gender</th>
			<th>Date Of Birth</th>
            <th>Picture</th>
			
		</tr>
	</thead> -->
	<tbody>
    


    
    <?php
 if(isset($_POST['report'])) {
    $sql = "SELECT emp_id,name,email,designation,salary,hobby,gender,about,picture FROM `employee_info` WHERE `name` = '$_POST[name]' 
        AND `designation` = '$_POST[designation]' AND `gender` = '$_POST[gender]'";
         $result = mysqli_query($conn, $sql) or die("Error: ".mysqli_error($conn));
// mysql_query($sql) or trigger_error(mysql_error()." in ".$sql);
if(mysqli_query($conn, $sql) or die("Error: ".mysqli_error($conn)))
echo "<table class='table table-bordered'>";
 echo "<tr>";
 echo "<th>"; echo "ID";  echo "</th>";
 echo "<th>"; echo "Name";  echo "</th>";
 echo "<th>"; echo "Email";  echo "</th>";
 echo "<th>"; echo "Designation";  echo "</th>";
 echo "<th>"; echo "Salary";  echo "</th>";
 echo "<th>"; echo "Hobby";  echo "</th>";
 echo"<th>"; echo "Gender";  echo "</th>";
 echo"<th>"; echo"Date Of Birth";  echo"</th>";
 echo"<th>"; echo "Picture";  echo "</th>";
 
echo"</tr>";

   if(mysqli_num_rows($result) > 0)
        {
        while($row = mysqli_fetch_assoc($result))   
            {
 
  
  
  ?>
  
  <tr>
    <td><?php echo $row['emp_id'] ?></td>
    <td><?php echo $row['name'] ?></td>
    <td><?php echo $row['email'] ?></td>
    <td><?php echo $row['designation'] ?></td>
    <td><?php echo $row['salary'] ?></td>
    <td><?php echo $row['hobby'] ?></td>
    <td><?php echo $row['gender'] ?></td>
    <td><?php echo $row['about'] ?></td>
    <td><?php echo '<img src="data:image;base64,'.base64_encode($row['picture']).'"alt="picture"syle="width:20px;height:20px;" >';?></td>
    <td> 
        <a action="edit.php" href="report.php">Edit</a>
        <a action="delete.php"href="delete.php">Delete</a>
    </td>

    
    
                
  </tr>
  <?php

            
            }
        }
    }
?>
