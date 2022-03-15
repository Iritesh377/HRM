<?php 
include "../inc/db_conn.php";


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
<link rel="icon" type="image/x-icon" href="../img/logo.png">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../css/add.css">

    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>



    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="la la-atom"></span> <span></span></h2>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="index.php"><span class="las la-globe"></span> <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="employees.php" class="active"><span class="las la-users"></span> <span>Employees</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-users-cog"></span> <span>Admins</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-building"></span> <span>Department</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-award"></span> <span>Award</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-rupee-sign"></span> <span>Expences</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-calendar-day"></span> <span>Holidays</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-fingerprint"></span> <span>Attendance</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-mail-bulk"></span> <span>Leave Applications</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-bullhorn"></span> <span>Notice Board</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-tools"></span> <span>Settings</span></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <div style="display:flex; align-items:center">
                <label class="nav-toggle" for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>

                <h2>Dashboard</h2>
            </div>

            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search here" />
            </div>

            <div class="user-wrapper">
                <!-- <img src="img/2.jpg" width="40px" height="40px" alt=""> -->
                <div>
                    <h4><?php echo $_SESSION['name']; ?> </h4>
                    <small><a href="../inc/logout.php" class="text-danger btn">Logout</a></small>
                </div>
            </div>
        </header>

        <main>

            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>54</h1>
                        <span>Total Employees</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>79</h1>
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
                    <div class="card-single">
                        <div>
                            <h1>Add</h1>
                            <span>Employees</span>
                        </div>
                        <div>
                            <span class="la la-user-plus"></span>
                        </div>
                    </div>
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
                                            <td>Name</td>
                                            <td>Image</td>
                                            <td>Department/Designation</td>
                                            <td>Contact</td>
                                            <td>Status</td>
                                            <td>Action</td>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>UI/UX Design</td>
                                            <td>UI Team</td>
                                            <td>
                                                <span class="status purple"></span>
                                                review
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Web development</td>
                                            <td>Frontend</td>
                                            <td>
                                                <span class="status pink"></span>
                                                in progress
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Ushop app</td>
                                            <td>Mobile Team</td>
                                            <td>
                                                <span class="status orange"></span>
                                                pending
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>UI/UX Design</td>
                                            <td>UI Team</td>
                                            <td>
                                                <span class="status purple"></span>
                                                review
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Web development</td>
                                            <td>Frontend</td>
                                            <td>
                                                <span class="status pink"></span>
                                                in progress
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Ushop app</td>
                                            <td>Mobile Team</td>
                                            <td>
                                                <span class="status orange"></span>
                                                pending
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>UI/UX Design</td>
                                            <td>UI Team</td>
                                            <td>
                                                <span class="status purple"></span>
                                                review
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Web development</td>
                                            <td>Frontend</td>
                                            <td>
                                                <span class="status pink"></span>
                                                in progress
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Ushop app</td>
                                            <td>Mobile Team</td>
                                            <td>
                                                <span class="status orange"></span>
                                                pending
                                            </td>
                                        </tr>
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
    <h1>Page Content<h2>
 
</div>
<div id="overlay"></div>
<div id="popup">
    <div class="popupcontrols">
        <span id="popupclose"><i class="las la-times"></i></span>
    </div>
    <div class="popupcontent">
       
<body>
     <form class="addemployees" action="../inc/addemployees.php" method="post">
     <h1>Add Employees</h1>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Full Name</label>
     	<input type="text" name="fname" placeholder="Sam Kumar"><br>

     	<label>Image</label>
     	<input type="file" name="pic" placeholder=".png .jpg"><br>

         <label>Department/Designation</label>
     	<input type="text" name="department" placeholder="Eg: Disciplinary Incharge"><br>

         <label>Contact</label>
     	<input type="tel" name="tel" placeholder="+977-9845000000"><br>


     	<button class="addbutton" type="submit">Add</button>

     </form>
	</body>
</html>
    </div>
</div>
    <script src="../js/script.js"></script>
</body>

</html>