<!DOCTYPE html>
<html lang="en">
<link rel="icon" type="image/x-icon" href="../img/logo.png">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title><?php echo $title ?></title>
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
                    <a href="index.php" class="<?php if($title=='Admin Dashboard'){
                        echo 'active';}?>"><span class="las la-globe"></span> <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="employees.php" class="<?php if($title=='Employees'){
                        echo 'active';}?>"><span class="las la-users"></span> <span>Employees</span></a>
                </li>
                <li>
                    <a href="" class="<?php if($title==''){
                        echo 'active';}?>"><span class="las la-users-cog"></span> <span>Admins</span></a>
                </li>
                <li>
                    <a href="" class="<?php if($title==''){
                        echo 'active';}?>"><span class="las la-building"></span> <span>Department</span></a>
                </li>
                <li>
                    <a href="" class="<?php if($title==''){
                        echo 'active';}?>"><span class="las la-award"></span> <span>Award</span></a>
                </li>
                <li>
                    <a href="" class="<?php if($title==''){
                        echo 'active';}?>"><span class="las la-rupee-sign"></span> <span>Expences</span></a>
                </li>
                <li>
                    <a href="" class="<?php if($title==''){
                        echo 'active';}?>"><span class="las la-calendar-day"></span> <span>Holidays</span></a>
                </li>
                <li>
                    <a href="" class="<?php if($title==''){
                        echo 'active';}?>"><span class="las la-fingerprint"></span> <span>Attendance</span></a>
                </li>
                <li>
                    <a href="" class="<?php if($title==''){
                        echo 'active';}?>"><span class="las la-mail-bulk"></span> <span>Leave Applications</span></a>
                </li>
                <li>
                    <a href="" class="<?php if($title==''){
                        echo 'active';}?>"><span class="las la-bullhorn"></span> <span>Notice Board</span></a>
                </li>
                <li>
                    <a href="" class="<?php if($title==''){
                        echo 'active';}?>"><span class="las la-tools"></span> <span>Settings</span></a>
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

                <h2><?php echo $title?></h2>
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
</body>
        </html>