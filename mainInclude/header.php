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



    <!-- Custom Style CSS -->
    <link rel="stylesheet" type="text/css" href="./css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Add your custom styles here */
        .social-icons a {
           
          display: inline-block;
            margin-right: 10px;
            margin-bottom:30px; /* Adjust spacing between icons */
            padding: 10px;
            background-color: #3498db; /* Adjust background color */
            color: #fff; /* Adjust icon color */
            border-radius: 50%; /* Make it rounded */
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .social-icons a:hover {
            background-color:orange; /* Adjust hover background color */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5); /* Add a shining effect */
        }
        .feedback-slider {
    display: flex;
    overflow-x: hidden;
}

.feedback-item {
    flex: 0 0 33.333%;
    max-width: 33.333%;
    padding: 20px;
    box-sizing: border-box;
}

.pic {
    text-align: center;
}

.pic img {
    width: 100px; /* Adjust image size as needed */
    height: 100px;
    border-radius: 50%;
}

.feedback-content {
    text-align: center;
}

.testimonial-prof {
    margin-top: auto;
    text-align: center;
    color:#fff;
}
 .navigation-buttons {
        text-align: center;
        margin-top: 10px;
    }

    .navigation-buttons button {
        padding: 10px 20px;
        margin: 0 1px;
        background-color:blue;
        color: #fff;
        border: none;
        border-radius: 10px;
        cursor: pointer;
    }

    /* Centering buttons */
    #prevButton,
    #nextButton {
        display: inline-block;
        vertical-align: middle;
    }

    </style>

    <title>skillXhub</title>
  
  </head>
  <body>
     <!-- Start Navigation -->
    <nav class="navbar navbar-expand-sm navbar-dark pl-5 fixed-top" style="background-color:#225470">
      <a href="index.php" class="navbar-brand">SkillXhub</a>
      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="myMenu">
        <ul class="navbar-nav pl-5 custom-nav">
          <li class="nav-item custom-nav-item"><a href="index.php" class="nav-link">Home</a></li>
          <li class="nav-item custom-nav-item"><a href="courses.php" class="nav-link">Courses</a></li>
          <li class="nav-item custom-nav-item"><a href="library.php" class="nav-link">Library</a></li>

          <li class="nav-item custom-nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
          <li class="nav-item custom-nav-item"><a href="#About" class="nav-link">About</a></li>
          </ul>
          <ul class="navbar-nav pl-5 custom-nav ml-auto">
          <form class="d-flex" role="search" action="search.php" method="post">
             <input class="form-control me-2" type="search"  name="course_name" placeholder="Search for courses" aria-label="Search" style="width:250px;">
             <button class="btn" type="submit" name="submit" value="Search"style ="background-color:#dc3545; color:white; height:40px; margin-right:40px; border-radius:12px;">Search</button>
             </form>
             
           <?php 
              session_start();   
              if (isset($_SESSION['is_login'])){
                echo '<li class="nav-item custom-nav-item"><a href="student/studentProfile.php" class="nav-link"> <i class="fa-solid fa-circle-user" style="font-size: 1.7em"></i></a></li>  <li class="nav-item custom-nav-item"><a href="logout.php" class="nav-link">Logout</a></li>';
              } else {
                echo '<li class="nav-item custom-nav-item"><a href="#login" class="nav-link" data-toggle="modal" data-target="#stuLoginModalCenter">Login</a></li> <li class="nav-item custom-nav-item"><a href="#signup" class="nav-link" data-toggle="modal" data-target="#stuRegModalCenter">Signup</a></li>';
              }
          ?> 
          </ul>
           <!--<li class="nav-item custom-nav-item"><a href="paymentstatus.php" class="nav-link">Payment Status</a></li>
          <li class="nav-item custom-nav-item"><a href="#Feedback" class="nav-link">Feedback</a></li>-->
          
      
      </div>
    </nav> <!-- End Navigation -->
  
          
