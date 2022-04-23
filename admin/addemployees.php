<?php
$title = "Employees";
include "../inc/db_conn.php";
include_once("../inc/header.php");


if (isset($_POST['addemp'])) {
  $file = $_FILES['photo']['tmp_name'];
  $type = mime_content_type($_FILES['photo']['tmp_name']);
  $size = $_FILES['photo']['size'];
  $image = [
    'photo/png',
    'photo/jpeg',
    'photo/gif',

  ];
  if ($type != "photo/png" || $type != "photo/jpeg" || $type != "photo/gif") {
    header("Location: addemployees.php?error=Please Upload Only Png/Jpeg/Gif File");
    exit();
  }
  $mb_size = $size / 1024 / 1024;
  if ($mb_size > 15) {
    header("Location: addemployees.php?error=Please Upload less than 5MB");
    exit();
  }
  $ext = match ($type) {
    "photo/png" => ".png",
    "photo/jpeg" => ".jpeg",
    "photo/gif" => ".gif",
  };
  $file_name = uniqid() . $ext;
  move_uploaded_file($file, "../uploads/$file_name");
  $photo = $file_name;





  $fullname = $_POST['fullname'];
  $fathername = $_POST['fathername'];
  $dob = $_POST['dob'];
  $gender = $_POST['gender'];
  $phone = $_POST['phone'];
  $fulladdress = $_POST['fulladdress'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $empid = $_POST['empid'];
  $department = $_POST['department'];
  $designation = $_POST['designation'];
  $doj = $_POST['doj'];
  $joiningsalary = $_POST['joiningsalary'];
  $accholdername = $_POST['accholdername'];
  $accnumber = $_POST['accnumber'];
  $bankname = $_POST['bankname'];
  $pannumber = $_POST['pannumber'];
  $branch = $_POST['branch'];
  mysqli_begin_transaction($conn);
  try {
    $sql = "INSERT INTO `employeesdetails`(`id`, `photo`, `fullname`, `fathername`, `dob`, `gender`, `phone`, `fulladdress`, `email`, `password`) VALUES ('$empid','$photo','$fullname','$fathername','$dob','$gender','$phone','$fulladdress','$email','$password');";
    $sql1 = "INSERT INTO `empcompanydetails`(`id`,`department`,`designation`,`doj`,`joiningsalary`) VALUES('$empid','$department','$designation','$doj','$joiningsalary');";
    $sql2 = "INSERT INTO `empbankaccdetails`(`id`,`accholdername`,`accnumber`,`bankname`,`pannumber`,`branch`) VALUES($empid,'$accholdername','$accnumber','$bankname','$pannumber','$branch');";
    // $sql3="INSERT INTO `empdoc`(``) VALUES('')";
    $result = mysqli_query($conn, $sql);
    $result1 = mysqli_query($conn, $sql1);
    $result2 = mysqli_query($conn, $sql2);
    //  $result3 = mysqli_query($conn,$sql3);

    mysqli_commit($conn);
    header("Location: addemployees.php?error=Data Added Succesfully");
    exit();
  } catch (mysqli_sql_exception $exception) {
    mysqli_rollback($conn);
    throw $exception;
    echo "Error";
  }
}

if (empty($_SESSION['id'])) {
  header("Location: ../index.php");
  die;
}
$id = $_SESSION['id'];
$sql = "SELECT * FROM users WHERE id='$id'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) === 1) {
  $row = mysqli_fetch_assoc($result);
  if ($row['role'] != "Admin") {
    die("Need Admin Permission to view this page");
  }
}
?>

<body>
  <div class="body-box" style="padding-top:150px;">
    <form action="addemployees.php" method="POST" enctype="multipart/form-data">
      <div class="container px-4">

        <div class="row row-cols-2">
          <div class="col">
            <div class="py-2 border rounded-top bg-primary">
              <div class="ps-3 text-white">Personal Details</div>
            </div>
            <div class="p-3 border bg-light">
              <div class="mb-2 py-2">
                <?php if (isset($_GET['error'])) { ?>
                  <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <label for="formFile" class="form-label">Photo</label>
                <center>
                  <div class="bg-light" style="height:200px;width:200px">
                    <img id="frame" src="" class="img-fluid" height=200px width=200px>
                  </div>
                </center><br>

                <input class="form-control" name="photo" type="file" id="formFile" onchange="preview()">
              </div>
              <div class="mb-2">
                <label for="fullname" class="form-label">Full Name:</label>
                <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Ram Lal">
              </div>
              <div class="mb-2">
                <label for="fathername" class="form-label">Father's Name:</label>
                <input type="text" name="fathername" class="form-control" id="fathername" placeholder="Shyam Lal">
              </div>
              <div class="mb-2">
                <label for="dob" class="form-label">Date Of Birth:</label>
                <input type="date" name="dob" class="form-control" id="dob">
              </div>
              <div class="input-group mb-2 py-1">
                <label class="input-group-text" for="gender">Gender:</label>
                <select class="form-select" name="gender" id="gender">
                  <option selected>Select...</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
              <div class="mb-2">
                <label for="phone" class="form-label">Phone:</label>
                <input type="number" name="phone" class="form-control" id="phone">
              </div>
              <div class="mb-2">
                <label for="address" class="form-label">Full Address:</label>
                <textarea class="form-control" name="address" id="address" rows="3"></textarea>
              </div>
              <div class="mb-2">
                <label for="empemail" class="form-label">Email address:</label>
                <input type="email" class="form-control" name="email" id="empemail" placeholder="name@example.com">
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
                <input type="number" name="empid" class="form-control" id="empid">
              </div>
              <div class="mb-2">
                <label for="department" class="form-label">Department:</label>
                <input type="text" name="department" class="form-control" id="department">
              </div>
              <div class="mb-2">
                <label for="designation" class="form-label">Designation:</label>
                <input type="text" name="designation" class="form-control" id="designation">
              </div>
              <div class="mb-2">
                <label for="dobjoin" class="form-label">Date Of Joining:</label>
                <input type="date" name="doj" class="form-control" id="dobjoin">
              </div>
              <div class="mb-2 pb-3">
                <label for="joiningsalary" class="form-label">Joining Salary:</label>
                <input type="number" name="joiningsalary" class="form-control" id="joiningsalary">
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
                  <input type="text" name="accholdername" class="form-control" id="acn">
                </div>
                <div class="mb-2">
                  <label for="acnum" class="form-label">Account Number:</label>
                  <input type="number" name="accnumber" class="form-control" id="acnum">
                </div>
                <div class="mb-2">
                  <label for="bname" class="form-label">Bank Name:</label>
                  <input type="text" name="bankname" class="form-control" id="bname">
                </div>
                <!-- <div class="mb-2">
  <label for="ifsc" class="form-label">IFSC Code</label>
  <input type="number" class="form-control" id="ifsc">
</div> -->
                <div class="mb-2">
                  <label for="pannum" class="form-label">PAN Number:</label>
                  <input type="number" name="pannumber" class="form-control" id="pannum">
                </div>
                <div class="mb-2 pb-5">
                  <label for="bbranch" class="form-label">Branch:</label>
                  <input type="text" name="branch" class="form-control" id="bbranch">
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
    </form>
    <div class="col mx-5 pt-3 pb-5">
      <button type="submit" name="addemp" class="btn btn-primary">Submit</button>
    </div>
  </div>

  </div>

  </div>








  <script src="../js/script.js"></script>