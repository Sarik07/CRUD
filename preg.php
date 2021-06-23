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

    <title>REGISTRATION</title>
    
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
                    <label for="firstname"><b>Name</b></label>
                    <input onfocus="this.value=''" class="form-control" id="name" type="text" name="name" required>

                    <label for="email"><b>Email</b></label>
                    <input onfocus="this.value=''"class="form-control" id="email"  type="email" name="email" required>

                    <script> var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}  </script> 
<label for="password"><b>password :</b></label>
<p>                  <level><input type="from-comtrol" name="password" id="password" type="password" onkeyup='check();' required></level></p>
<p>
<label for="password"><b>Confirm Password :</b></label>
                    <level><input type="from-comtrol" name="confirm_password" id="confirm_password" type="password" onkeyup='check();' required>
  <span id='message'></span>
</label></p>
                    <label for="designation"><b>Designation:</b></label>
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

                    <label for="salary"><b> Salary</b></label>
                    <input onfocus="this.value=''" class="form-control" id="salary"  type="salary" name="salary" required>

                    <p><label for="hobby[]"><b> Hobby  :  </b></p>
                    <input type="checkbox" id="football" name="hobby[]" value="football">Football<input type="checkbox" id="Reading" name="hobby[]" value="reading">Reading
                    <input type="checkbox" id="music" name="hobby[]" value="music">Music</label>
<p><label for="gender"><b> Gender</b>
<input type="radio" id="male" name="gender" value="male"for="male">Male<input type= "radio" id="female" name="gender" value="female"for="female">Female</label><br></p>
                <p><label for="about"><b>About Yourself</b></label>
                    <input onfocus="this.value=''" class="form-control" id="about"  type="text" name="about" required>
</p>
                    <label for="Date"><b>Date Of Birth</b></label>
                    <input  type= "Date"class="form-control" id="birthday"  type="date" name="birthday" required>
                    
                    
                    
                    <form method="post" enctype="multipart/form-data">  
                     <input type="file" name="picture" id="picture" />   <br />  
                    <hr class="mb-3">
                    <input class="btn btn-primary" type="submit" id="register" name="create" value="Submit">
                    <a class="btn btn-primary" type="submit" href="index.php ?" name="home"id=" home ">Home</a>
                </div>
            </div>
        </div>
    </form>
</div>            </section>
<?php

if(isset($_POST['create'])){
    $check=implode(',',$_POST['hobby']); 
    $designation=$_POST['designation'];   
    $sql = "INSERT into employee_info(name,email,password,designation,salary,hobby,gender,about,birthday,picture)
             values(
                 '".$_POST['name']."',
                 '".$_POST['email']."',
                 '".$_POST['password']."',
                 '$designation',
                 '".$_POST['salary']."',
                 '$check',
                 '".$_POST['gender']."',
                 '".$_POST['about']."',
                 '".$_POST['birthday']."',
                 '".$_POST['picture']."'
                                     
             )";  
                         if(mysqli_query($conn, $sql) or die("Error: ".mysqli_error($conn)))
 

         {
         
        }
     else
         {
         echo ("Error Occured".mysqli_errno($conn)); 
         }
?>
<div class="alert alert-success col-lg-12 col-lg-push-0">
        Registration successfully, You will get email when your account is approved
    </div>

<?php
}
?>
    </div>

    </form>

</body>
</html>
