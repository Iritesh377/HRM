<?php
$title="Employees";
include "../inc/db_conn.php";
include_once("../inc/header.php");


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
<body>
<div class="body-box" style="padding-top:150px;">
<div class="container px-4">
    
  <div class="row row-cols-2">
    <div class="col">
    <div class="py-2 border rounded-top bg-primary">
        <div class="ps-3 text-white">Personal Details</div>
    </div>
     <div class="p-3 border bg-light">
     <div class="mb-2 py-2">
     <label for="Image" class="form-label">Photo</label>
     <center>
     <div class="bg-light" style="height:200px;width:200px">
            <img id="frame" src="" class="img-fluid" height=200px width=200px></div></center><br>
                
                <input class="form-control" type="file" id="formFile" onchange="preview()">
            </div>
     <div class="mb-2">
  <label for="fullname" class="form-label">Full Name:</label>
  <input type="text" class="form-control" id="fullname" placeholder="Ram Lal">
</div>
<div class="mb-2">
  <label for="fathername" class="form-label">Father's Name:</label>
  <input type="text" class="form-control" id="fathername" placeholder="Shyam Lal">
</div>
<div class="mb-2">
  <label for="dob" class="form-label">Date Of Birth:</label>
  <input type="date" class="form-control" id="dob">
</div>
<div class="input-group mb-2 py-1">
  <label class="input-group-text" for="gender">Gender:</label>
  <select class="form-select" id="gender">
    <option selected>Select...</option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
  </select>
</div>
<div class="mb-2">
  <label for="phone" class="form-label">Phone:</label>
  <input type="number" class="form-control" id="phone">
</div>
<div class="mb-2">
  <label for="address" class="form-label">Full Address:</label>
  <textarea class="form-control" id="address" rows="3"></textarea>
</div>
<div class="mb-2">
  <label for="empemail" class="form-label">Email address:</label>
  <input type="email" class="form-control" id="empemail" placeholder="name@example.com">
</div>
<div class="mb-2 pb-2">
        <label for="password" id="password" class="form-label">Password:</label>
              <input type="password" name="password" class="form-control" id="password" placeholder="password" required="true">
            </div>

<!-- NEXT -->

     </div>
    </div>
    <div class="col">
    <div class="py-2 border rounded-top bg-success">
        <div class="ps-3 text-white">Company Details</div>
    </div>
      <div class="p-3 border bg-light">
      <div class="mb-2">
  <label for="empid" class="form-label">Employee Id:</label>
  <input type="number" class="form-control" id="empid">
</div>
<div class="mb-2">
  <label for="department" class="form-label">Department:</label>
  <input type="text" class="form-control" id="department">
</div>
<div class="mb-2">
  <label for="designation" class="form-label">Designation:</label>
  <input type="text" class="form-control" id="designation">
</div>
<div class="mb-2">
  <label for="dobjoin" class="form-label">Date Of Joining:</label>
  <input type="date" class="form-control" id="dobjoin">
</div>
<div class="mb-2 pb-3">
  <label for="joiningsalary" class="form-label">Joining Salary:</label>
  <input type="number" class="form-control" id="joiningsalary">
</div>
      </div>

<!-- NEXT -->

      <div class="col pt-5">
    <div class="py-2 border rounded-top bg-danger">
        <div class="ps-3 text-white">Bank Account Details</div>
    </div>
      <div class="p-3 border bg-light">
      <div class="mb-2">
  <label for="acn" class="form-label">Account Holder Name:</label>
  <input type="text" class="form-control" id="acn">
</div>
<div class="mb-2">
  <label for="acnum" class="form-label">Account Number:</label>
  <input type="number" class="form-control" id="acnum">
</div>
<div class="mb-2">
  <label for="bname" class="form-label">Bank Name:</label>
  <input type="text" class="form-control" id="bname">
</div>
<!-- <div class="mb-2">
  <label for="ifsc" class="form-label">IFSC Code</label>
  <input type="number" class="form-control" id="ifsc">
</div> -->
<div class="mb-2">
  <label for="pannum" class="form-label">PAN Number:</label>
  <input type="number" class="form-control" id="pannum">
</div>
<div class="mb-2 pb-5">
  <label for="bbranch" class="form-label">Branch:</label>
  <input type="text" class="form-control" id="bbranch">
</div>
      </div>
    </div>
</div> 
    </div>
  </div>

<!-- NEXT -->

<div class="col mx-5 px-5 pt-5">
    <div class="py-2 border rounded-top bg-secondary">
        <div class="ps-3 text-white">Documents</div>
    </div>
      <div class="p-3 border bg-light">
      <div class="mb-2">
      <div class="mb-2">
      <div class="mb-2">
      <div class="mb-2">
      <div class="mb-2">
  <label for="formresume" class="form-label">Resume</label>
  <input class="form-control" type="file" id="formresume">
</div>
<label for="formol" class="form-label">Offer Letter</label>
  <input class="form-control" type="file" id="formol">
</div>
<label for="formjl" class="form-label">Joining Letter</label>
  <input class="form-control" type="file" id="formjl">
</div>
<label for="formcna" class="form-label">Contract and Agreement</label>
  <input class="form-control" type="file" id="formcna">
</div>
<label for="formidp" class="form-label">ID Proof</label>
  <input class="form-control" type="file" id="formidp">
</div>
    </div>
    <div class="col mx-5 pt-3 pb-5">
<button type="submit" name="addemp" class="btn btn-primary">Submit</button>
  </div>
</div> 

  </div>

</div>








        <script src="../js/script.js"></script>