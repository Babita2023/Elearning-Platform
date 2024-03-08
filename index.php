<?php
  include('./dbConnection.php');
  // Header Include from mainInclude 
  include('./mainInclude/header.php'); 
?>  
    <!-- Start Video Background-->
    <div class="container-fluid remove-vid-marg">
      <div class="vid-parent">
        <video playsinline autoplay muted loop>
          <source src="video/learns.mp4" />
        </video>
        <div class="vid-overlay"></div>
      </div>
      <div class="vid-content" >
        <h1 class="my-content">Welcome to skillXhub</h1>
        <small class="my-content">Learn from anywhere without ceasing from free and premium videos.</small><br />
        <?php    
              if(!isset($_SESSION['is_login'])){
                echo '<a class="btn btn-danger mt-3" href="#" data-toggle="modal" data-target="#stuRegModalCenter">Get Started</a>';
              } else {
                echo '<a class="btn btn-primary mt-3" href="student/studentProfile.php">My Profile</a>';
              }
          ?> 
       
      </div>
    </div> <!-- End Video Background -->
   
    <div class="container-fluid bg-danger txt-banner"> <!-- Start Text Banner -->
        <div class="row bottom-banner">
          <div class="col-sm">
            <h5> <i class="fas fa-book-open mr-3"></i> 100+ Online Courses</h5>
          </div>
          <div class="col-sm">
            <h5><i class="fas fa-users mr-3"></i> Expert Instructors</h5>
          </div>
          <div class="col-sm">
            <h5><i class="fas fa-keyboard mr-3"></i> Lifetime Access</h5>
          </div>
          <div class="col-sm">
            <h5><i class="fas fa-dollar-sign mr-3"></i> Money Back Guarantee*</h5>
          </div>
        </div>
    </div> <!-- End Text Banner -->
    
    <div class="container mt-5"> <!-- Start Most Popular Course -->
      <h1 class="text-center">Popular Course</h1>
      <div class="card-deck mt-4"> <!-- Start Most Popular Course 1st Card Deck -->
        <?php
        $sql = "SELECT * FROM course LIMIT 3";
        $result = $conn->query($sql);
        if($result->num_rows > 0){ 
          while($row = $result->fetch_assoc()){
            $course_id = $row['course_id'];
            echo '
            <a href="coursedetails.php?course_id='.$course_id.'" class="btn" style="text-align: left; padding:0px; margin:0px;">
              <div class="card">
                <img src="'.str_replace('..', '.', $row['course_img']).'" class="card-img-top" alt="Guitar" />
                <div class="card-body">
                  <h5 class="card-title">'.$row['course_name'].'</h5>
                  <p class="card-text">'.$row['course_desc'].'</p>
                </div>
                <div class="card-footer">
                  <p class="card-text d-inline">Price: <small><del> &#8360 '.$row['course_original_price'].'</del></small> <span class="font-weight-bolder">&#8360 '.$row['course_price'].'<span></p> <a class="btn btn-primary text-white font-weight-bolder float-right" href="coursedetails.php?course_id='.$course_id.'">Enroll</a>
                </div>
              </div>
            </a>  ';
          }
        }
        ?>   
      </div>  <!-- End Most Popular Course 1st Card Deck -->   
      <div class="card-deck mt-4"> <!-- Start Most Popular Course 2nd Card Deck -->
        <?php
          $sql = "SELECT * FROM course LIMIT 3,3";
          $result = $conn->query($sql);
          if($result->num_rows > 0){ 
            while($row = $result->fetch_assoc()){
              $course_id = $row['course_id'];
              echo '
                <a href="coursedetails.php?course_id='.$course_id.'"  class="btn" style="text-align: left; padding:0px;">
                  <div class="card">
                    <img src="'.str_replace('..', '.', $row['course_img']).'" class="card-img-top" alt="Guitar" />
                    <div class="card-body">
                      <h5 class="card-title">'.$row['course_name'].'</h5>
                      <p class="card-text">'.$row['course_desc'].'</p>
                    </div>
                    <div class="card-footer">
                      <p class="card-text d-inline">Price: <small><del> &#8360 '.$row['course_original_price'].'</del></small> <span class="font-weight-bolder">&#8360 '.$row['course_price'].'<span></p> <a class="btn btn-primary text-white font-weight-bolder float-right" href="#">Enroll</a>
                    </div>
                  </div>
                </a>  ';
            }
          }
        ?>
      </div>   <!-- End Most Popular Course 2nd Card Deck --> 
      <div class="text-center m-2">
        <a class="btn btn-danger btn-sm" href="courses.php">View All Course</a> 
      </div>
    </div>  <!-- End Most Popular Course -->

    <?php 
    // Contact Us
    include('./contact.php'); 
    ?>  
     <!-- Start Students Testimonial -->
<!-- Start Students Testimonial-->
<div class="container-fluid mt-5" style="background-color: #4B7289" id="Feedback">
    <h1 class="text-center testyheading p-4"> Student's Feedback </h1>
    <div class="row">
        <div class="col-md-12">
            <div class="feedback-slider">
                <?php
                $sql = "SELECT s.stu_id, s.stu_name, s.stu_occ, s.stu_img, f.f_content FROM student AS s JOIN feedback AS f ON s.stu_id = f.stu_id";
                $result = $conn->query($sql);
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()){
                        $s_img = $row['stu_img'];
                        $n_img = str_replace('../','',$s_img);
                        ?>
                        <div class="feedback-item">
                            <div class="pic">
                                <img src="<?php echo $n_img; ?>" alt=""/>
                            </div>
                            <div class="feedback-content">
                                <p class="description">
                                    <?php echo $row['f_content'];?>
                                </p>
                                <div class="testimonial-prof">
                                    <h4><?php echo $row['stu_name']; ?></h4>
                                    <small><?php echo $row['stu_occ']; ?></small>
                                </div>
                            </div>
                        </div>
                    <?php }} ?>
            </div>
            <div class="navigation-buttons">
                <button id="prevButton"> << </button>
                <button id="nextButton"> >> </button>
            </div>
        </div>
    </div>
</div> <!--End Students Testimonial -->

        
     <!-- Start Students Testimonial-->



      

 
    <!-- Start About Section -->
    <div class="container-fluid p-4 bg-dark" id="About">
      <div class="container" style="background-color:#E9ECEF">
        <div class="row text-center">
          <div class="col-sm bg-dark text-white">
            <h5>About Us</h5>
              <p>SkillXhub provides  access to the best education, partnering with top colleges and organizations to offer courses online.</p>
          </div>
          <div class="col-sm bg-dark text-white">
            <h5>Category</h5>
            <a class="text-light" href="#">Web Development</a><br />
            <a class="text-light" href="#">Design and analysis of Algorithms</a><br />
            <a class="text-light" href="#">Android App Dev</a><br />
            <a class="text-light" href="#">  Networking</a><br />
            <a class="text-light" href="#">java development</a><br />
          </div>
          <div class="col-sm bg-dark text-white">
            <h5>Contact Us</h5>
            <p>SkillXhub Pvt Ltd <br> Damak, Jhapa<br> <br> Ph. 9804030202 </p>
          </div>
          <div class=" col-sm social-icons bg-dark text-white ">
          <p > Social Links : </p>
        <a href="#" target="_blank"><i class="fab fa-facebook"></i></a>
        <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
        <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
        <a href="#" target="_blank"><i class="fab fa-linkedin"></i></a>
        <!-- Add more social icons as needed -->
    </div>
        </div>
      </div>
    </div> <!-- End About Section -->
   


  <?php 
    // Footer Include from mainInclude 
    include('./mainInclude/footer.php'); 
    
  ?>  
