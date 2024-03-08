<?php
  include('./dbConnection.php');
  // Header Include from mainInclude 
?>  
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    
     <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

    <!-- Student Testimonial Owl Slider CSS -->
    <link rel="stylesheet" type="text/css" href="css/owl.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.min.css">
    <link rel="stylesheet" type="text/css" href="css/testyslider.css">

    <!-- Custom Style CSS -->
    <link rel="stylesheet" type="text/css" href="./css/style.css" />
    <style> 
 .navigation a{
    position:relative;
    font-size:1.1rem;
    color:#fff;
    text-decoration:none;
    font-weight:500;

    margin-left:40px;
}
 .navigation a:after{
     content:"";
     position:absolute;
     left:0;
     bottom:-6px;
     width:100%;
     height:3px;
     background: #fff;
     border-radius:5px;
     transform-origin:right;
     transform:scaleX(0);
     transition:transform .5s;

 }
 .navigation a:hover::after{

transform-origin:left;
 transform:scaleX(1);
}

  
     </style>
     </head>
     <body>
     <!-- Start Navigation -->
    <nav class="navbar navbar-expand-sm navbar-dark pl-5 fixed-top">
      <a href="index.php" class="navbar-brand">SkillXHub</a>

      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="myMenu">
        <ul class="navbar-nav pl-5 custom-nav">
          <li class="nav-item custom-nav-item"><a href="index.php" class="nav-link">Home</a></li>
          <li class="nav-item custom-nav-item"><a href="courses.php" class="nav-link">Courses</a></li>
         
          <li class="navigation">  <a href="freecourse.php"> Free Courses</a></li>
           <li class="navigation"> <a href="premiumcourse.php"> Premium Courses</a></li>

          </ul>
          <ul class="navbar-nav pl-5 custom-nav ml-auto">
            
          <form class="d-flex" role="search" action="search.php" method="post">
             <input class="form-control me-2" type="search"  name="course_name" placeholder="Search for courses" aria-label="Search" style="width:250px;">
             <button class="btn" type="submit" name="submit" value="Search"style="background-color:#dc3545; color:white; margin-right:40px; border-radius:12px;">Search</button>
             </form>
          
          
           <?php 
              session_start();   
              if (isset($_SESSION['is_login'])){
                echo '<li class="nav-item custom-nav-item"><a href="student/studentProfile.php" class="nav-link">My Profile</a></li> <li class="nav-item custom-nav-item"><a href="logout.php" class="nav-link">Logout</a></li>';
              } else {
                echo '<li class="nav-item custom-nav-item"><a href="#login" class="nav-link" data-toggle="modal" data-target="#stuLoginModalCenter">Login</a></li> <li class="nav-item custom-nav-item"><a href="#signup" class="nav-link" data-toggle="modal" data-target="#stuRegModalCenter">Signup</a></li>';
              }
          ?> 
          </ul>
           <!--<li class="nav-item custom-nav-item"><a href="paymentstatus.php" class="nav-link">Payment Status</a></li>
          <li class="nav-item custom-nav-item"><a href="#Feedback" class="nav-link">Feedback</a></li>-->
          
      
      </div>
    </nav> <!-- End Navigation -->



    <div class="container-fluid bg-dark"> <!-- Start Course Page Banner -->
      <div class="row">
        <img src="./image/coursebanner.jpg" alt="courses" style="height:500px; width:100%; object-fit:cover; box-shadow:10px;"/>
      </div> 
    </div> <!-- End Course Page Banner -->

    <div class="container mt-5"> <!-- Start All Course -->
    <h1 class="text-center"> Free Courses</h1>
      

      <div class="row mt-4"> <!-- Start All Course Row -->
       <?php
          $sql = "SELECT * FROM course";
          $result = $conn->query($sql);
          if($result->num_rows > 0){ 
            while($row = $result->fetch_assoc()){
              $course_id = $row['course_id'];
              echo ' 
                <div class="col-sm-4 mb-4">
                  <a href="coursedetailsfree.php?course_id='.$course_id.'" class="btn" style="text-align: left; padding:0px;"><div class="card">
                    <img src="'.str_replace('..', '.', $row['course_img']).'" class="card-img-top" alt="Guitar" />
                    <div class="card-body">
                      <h5 class="card-title">'.$row['course_name'].'</h5>
                      <p class="card-text">'.$row['course_desc'].'</p>
                    </div>
                    <div class="card-footer">
                      <p class="card-text d-inline">Price: <small><del>&#8360 '.$row['course_original_price'].'</del></small> </p>
                       <a class="btn btn-primary text-white font-weight-bolder float-right" href="coursedetailsfree.php?course_id='.$course_id.'">Free</a>
                    </div>
                  </div> </a>
                </div>
              ';
            }
          }
        ?> 
        </div><!-- End All Course Row -->   
      </div><!-- End All Course -->   
     
<?php 
  // Contact Us
  include('./contact.php'); 
?> 

<?php 
  // Footer Include from mainInclude 
  include('./mainInclude/footer.php'); 
?>  
