<?php
	
    require_once 'includes/db.php';
    $id=$_GET['id'];
    mysqli_query($conn,"DELETE from `employee_info` where emp_id='$id'");
	header('location:index.php');
// mysql_query($sql) or trigger_error(mysql_error()." in ".$sql);
if(mysqli_query($conn, $sql) or die("Error: ".mysqli_error($conn)))
            {
            // header ('Location:index.php');  
            }
        else
            {
                
            echo ("Error Occured".mysqli_errno($conn)); 
            }
    
        
        ?>
