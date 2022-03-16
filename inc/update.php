<?php 
include "db_conn.php";
$id=$_GET['updateid'];

$sql="Select * from `employees` where id=$id";

$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$fname=$row['fname'];
$pic=$row['pic'];
$department=$row['department'];
$tel=$row['tel'];

if(isset($_POST['submit'])){
    $fname=$_POST['fname'];
    $pic=$_POST['pic'];
    $department=$_POST['department'];
    $tel=$_POST['tel'];

    $sql="update `employees` set id='$id',fname='$fname',pic='$pic',department='$department',tel='$tel' where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
       // echo "Data updated sucessfully";
       header("Location: ../admin/employees.php");
    }
    else{
        die(mysqli_error($conn));
    }
}

if(empty($_SESSION['id'])){
  header("Location: ../index.php");
  die;
}
$id=$_SESSION['id'];
$sql = "SELECT * FROM users WHERE id='$id'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
      if($row['role']!="Admin"){
        die("Need Admin Permission to view this page");
      }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/add.css">

    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
<!--     <link rel="stylesheet" href="../css/admin.css">
 -->    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
<div id="overlay"></div>
<div id="popup">
    <div class="popupcontent">
       
     <form class="addemployees" method="post">
     <h1>Update Employees</h1>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Full Name</label>
     	<input type="text" name="fname" autocomplete="on" placeholder="Sam Kumar" value=<?php echo $fname;?>><br>

     	<label>Image</label>
     	<input type="file" name="pic" autocomplete="on" placeholder=".png .jpg" value=<?php echo $pic;?>><br>

         <label>Department/Designation</label>
     	<input type="text" name="department" autocomplete="on" placeholder="Eg: Disciplinary Incharge" value=<?php echo $department;?>><br>

         <label>Contact</label>
     	<input type="tel" name="tel" autocomplete="on" placeholder="+977-9845000000" value=<?php echo $tel;?>><br>


     	<button class="addbutton" name="submit" type="submit">Update</button>

     </form>
<!--      <script src="../js/script.js"></script>
 --></body>
</html>

