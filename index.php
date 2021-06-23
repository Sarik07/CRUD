<?php
// mysql connection
require_once 'includes/db.php';
$sql = "SELECT * FROM `employee_info`";
$result = mysqli_query($conn, $sql) or die("Error: ".mysqli_error($conn));
$records = mysqli_num_rows($result);
$msg = "";
if (!empty($_GET['msg'])) {
    $msg = $_GET['msg'];
    $alert_msg = ($msg == "add") ? "New Record has been added successfully!" : (($msg == "del") ? "Record has been deleted successfully!" : "Record has been updated successfully!");
} else {
    $alert_msg = "";
}

?>
<!DOCTYPE html>
<html lang="en">
<?php include 'partial/head.php';?>
<body>
   <?php include 'partial/nav.php';?>
    <div class="container">
<?php if (!empty($alert_msg)) {?>
        <div class="alert alert-success"><?php echo $alert_msg; ?></div>
<?php }?>
    <div class="info"></div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Designation</th>
                <th scope="col">Salary</th>
                <th scope="col">hobby</th>
                <th scope="col">gender</th>
                <th scope="col">about</th>
                <th scope="col">birthday</th>
                <th scope="col">picture</th>

                </tr>
            </thead>
            <tbody>
                <?php
if (!empty($records)) {
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
                                <tr>
                                
                                    <th scope="row"><?php echo $row['emp_id']; ?></th>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['password']; ?></td>
                                    <td><?php echo $row['designation']; ?></td>
                                    <td><?php echo $row['salary']; ?></td>
                                    <td><?php echo $row['hobby']; ?></td>
                                    <td><?php echo $row['gender']; ?></td> 
                                    <td><?php echo $row['about']; ?></td>
                                    <td><?php echo $row['birthday']; ?></td>
                                    <td><?php echo '<img src="data:image;base64,'.base64_encode($row['picture']).'"alt="picture"syle="width:20px;height:20px;" >';?></td>
    <td> 
                                        <a href="update.php?id=<?php echo $row['emp_id']; ?>" class="btn btn-primary">EDIT</a>
                                        <a href="delete.php?id=<?php echo $row['emp_id']; ?>" class="btn btn-danger" onClick="javascript:return confirm('Do you really want to delete?');" >DELETE</a>
                                    <td>
                                        
                                    </td>
                                </tr>

                            <?php
}
}
?>



            </tbody>
        </table>
    </div>
</body>
</html>