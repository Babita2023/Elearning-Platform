<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>
  <?php echo TITLE ?>
 </title>
 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="../css/bootstrap.min.css">

 <!-- Font Awesome CSS -->
 <link rel="stylesheet" href="../css/all.min.css">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

 <!-- Custom CSS -->
 <link rel="stylesheet" href="../css/adminstyle.css">

 <style>
  .nav-link:hover,
  .nav-item:hover a {
    background-color: white !important;
    color: black !important;
    font-weight: bold;
  }
 
</style>

</head>

<body>
 

<!-- Side Bar -->
 <div class="container-fluid mb-0" >
 <div class="row">
   <nav class="col-sm-3 col-md-2  sidebar py-5 d-print-none"  style="width:25%; background-color:#225470;" >
   <h4 style="padding-left:30px;margin-top:0px; color:white; font-weight:bold;"> SkillxHub </h4>
   <h6 style="padding-left:40px; color:white; font-weight:bold;"> Admin Area</h6>
   <hr style="background-color:white;">
    <div class="sidebar-sticky" id="sidenav">
     <ul class="nav flex-column">

      <li class="nav-item" style="margin-top:60px;" >
       <a class="nav-link <?php if(PAGE == 'dashboard') {echo 'active';} ?>" href="adminDashboard.php" style="color: white;">
        <i class="fas fa-tachometer-alt"></i>
        Dashboard
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link <?php if(PAGE == 'courses') {echo 'active';} ?>" href="courses.php" style="color: white;">
        <i class="fab fa-accessible-icon"></i>
        Courses
       </a>
      </li>
      <li class="nav-item" >
       <a class="nav-link <?php if(PAGE == 'lessons') {echo 'active';} ?>" href="lessons.php" style="color: white;">
        <i class="fab fa-accessible-icon"></i>
        Lessons
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link <?php if(PAGE == 'students') {echo 'active';} ?>" href="students.php" style="color: white;">
        <i class="fas fa-users"></i>
        Students
       </a>
      </li>

      <li class="nav-item">
       <a class="nav-link <?php if(PAGE == 'library') {echo 'active';} ?>" href="library.php" style="color: white;">
        <i class="fas fa-book"></i>
        Library
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link <?php if(PAGE == 'sellreport') {echo 'active';} ?>" href="sellReport.php" style="color: white;">
        <i class="fas fa-table"></i>
        Sell Report
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link <?php if(PAGE == 'paymentstatus') {echo 'active';} ?>" href="adminPaymentStatus.php" style="color: white;">
        <i class="fas fa-table"></i>
        Payment Status
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link <?php if(PAGE == 'feedback') {echo 'active';} ?>" href="feedback.php" style="color: white;">
        <i class="fab fa-accessible-icon"></i>
        Feedback
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link <?php if(PAGE == 'changepass') {echo 'active';} ?>" href="adminChangePass.php" style="color: white;">
        <i class="fas fa-key"></i>
        Change Password
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="../logout.php" style="color: white;">
        <i class="fas fa-sign-out-alt"></i>
        Logout
       </a>
      </li>
     </ul>
    </div>
   </nav>