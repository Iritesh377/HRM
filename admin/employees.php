<?php 
$title="Employees";
include "../inc/db_conn.php";
include_once("../inc/header.php");

if(isset($_POST['submit'])){
    $fname=$_POST['fname'];
    $pic=$_POST['pic'];
    $department=$_POST['department'];
    $tel=$_POST['tel'];

    if (empty($fname)) {
		header("Location: employees.php?error=Full Name is required");
	    exit();
    }elseif (!preg_match ("/^[a-zA-z]*$/", $fname) ) { 
            header("Location: employees.php?error=Only alphabets and whitespace are allowed.");   
	}else if(empty($pic)){
        header("Location: employees.php?error=Picture is required");
	    exit();
    }else if(empty($department)){
        header("Location: employees.php?error=Department is required");
	    exit();
    }else if(empty($tel)){
        header("Location: employees.php?error=Telephone Number is required");
	    exit();
    }else{
    $sql="insert into `employees` (fname,pic,department,tel)
    values('$fname','$pic','$department','$tel')";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "Data inserted sucessfully";
    }
    else{
        die(mysqli_error($conn));
    }
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

<body>
        <main>

            <div class="cards">
                <div class="card-single">
                    <div>
                    <?php

$sql="SELECT id FROM employees ORDER BY id";
$result= mysqli_query($conn,$sql);
$totalemp =mysqli_num_rows($result);


                       echo '<h1>'.$totalemp.'</h1>';        
                       ?>             
                        <span>Total Employees</span>
                        
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                    <?php

$sql="SELECT COUNT( DISTINCT department) FROM employees ORDER BY id";
$result= mysqli_query($conn,$sql);
$totaldep =mysqli_num_rows($result);

echo '<h1>'.$totaldep.'</h1>';        
?>     
                        <span>Department</span>
                    </div>
                    <div>
                        <span class="las la-building"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>124</h1>
                        <span>Active Employees</span>
                    </div>
                    <div>
                        <span class="las la-user-tie"></span>
                    </div>
                </div>
                <button id="button">
                <a href="addemployees.php">
                    <div class="card-single">
                        <div>
                            <h1>Add</h1>
                            <span>Employees</span>
                        </div>
                        <div>
                            <span class="la la-user-plus"></span>
                        </div>
                    </div></a>
                </button>
            </div>

            <div class="grid" style="padding-top:50px;">
                <div class="projects">
                    <div class="box">
                        <div class="box-header">
                            <h3>Employees List</h3>

                            <button>See all <span class="las la-arrow-right"></span></button>
                        </div>

                        <div class="box-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>ID</td>
                                            <td>Name</td>
                                            <td>Image</td>
                                            <td>Department/Designation</td>
                                            <td>Contact</td>
                                            <td>Action</td>

                                        </tr>
                                    </thead>
                                    <tbody>


                                    <?php
                                    
                                    $sql="Select * from `employees`";
                                    $result= mysqli_query($conn,$sql);
                                    if($result){
                
                                        while($row=mysqli_fetch_assoc($result)){
                                            $id=$row['id'];
                                            $fname=$row['fname'];
                                            $pic=$row['pic'];
                                            $department=$row['department'];
                                            $tel=$row['tel'];
                                            echo '<tr>
                                            <td>'.$id.'</td>
                                            <td>'.$fname.'</td>
                                            <td>'.$pic.'</td>
                                            <td>'.$department.'</td>
                                            <td>'.$tel.'</td>
                                            <td>
                                        <button class="btn btn-primary m-2"><a href="../admin/update.php?updateid='.$id.'" class="text-light">Update</a></button>
                                        <button class="btn btn-danger"><a href="../inc/delete.php?deleteid='.$id.'"  class="text-light">Delete</a></button> 
                                        </td>   
                                        </tr>';
                                        }
                                    }
                                    ?>
                                                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </main>
    </div>
    <div id="maincontent">
 
</div>
<!-- <div id="overlay"></div>
<div id="popup">
    <div class="popupcontrols">
        <span id="popupclose"><i class="las la-times"></i></span>
    </div>
    <div class="popupcontent">
       
<body>
     <form class="addemployees" method="post">
     <h1>Add Employees</h1>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Full Name</label>
     	<input type="text" name="fname" autocomplete="on" placeholder="Sam Kumar"><br>

     	<label>Image</label>
     	<input type="file" name="pic" autocomplete="on" placeholder=".png .jpg"><br>

         <label>Department/Designation</label>
     	<input type="text" name="department" autocomplete="on" placeholder="Eg: Disciplinary Incharge"><br>

         <label>Contact</label>
     	<input type="tel" name="tel" autocomplete="on" placeholder="+977-9845000000"><br>


     	<button class="addbutton" name="submit" type="submit">Add</button>

     </form>
	</body> -->
</html>
    </div>
</div>
    <script src="../js/script.js"></script>
</body>

</html>