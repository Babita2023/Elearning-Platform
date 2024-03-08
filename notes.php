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
 
  </head>
  <body>
     <!-- Start Nagigation -->
    <nav class="navbar navbar-expand-sm navbar-dark pl-5 fixed-top">
      <a href="index.php" class="navbar-brand">SkillXHub</a>

      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="myMenu">
        <ul class="navbar-nav pl-5 custom-nav">
          <li class="nav-item custom-nav-item"><a href="index.php" class="nav-link">Home</a></li>
          <li class="nav-item custom-nav-item"><a href="books.php" class="nav-link">Books</a></li>
          <li class="nav-item custom-nav-item"><a href="notes.php" class="nav-link">Notes</a></li>
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
        <img src="./image/library2.webp" alt="courses" style="height:500px; width:100%; object-fit:cover; box-shadow:10px;"/>
      </div> 
    </div> <!-- End Course Page Banner -->

    <div class="container mt-5"> 
      <h1 class="text-center">Popular Notes</h1>

     
      <div class="row mt-4"> <!-- Start All Course Row -->
      <?php
$sql = "SELECT * FROM library WHERE file_type = 'note'";
$result = $conn->query($sql);
   if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $file_id = $row['file_id'];
       
        echo ' 
            <div class="col-sm-4 mb-4">

                    <div class="card">
                        <img src="' . str_replace('..', '.', $row['file_image']) . '" class="card-img-top" alt="Guitar" />
                        <div class="card-body">
                            <h5 class="card-title">' . $row['file_name'] . '</h5>
                            <p class="card-text">' . $row['description'] . '</p>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-primary text-white font-weight-bolder" style="float: left;" href="display_pdf.php?file_id=' . $file_id . '">Read</a>
                            <a class="btn btn-success text-white font-weight-bolder" style="float: right;" href="downloadpdf.php?file_id=' . $file_id . '">Download</a>
                        </div>
                    </div>
                </a>
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
