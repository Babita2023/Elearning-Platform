
<?php
include('./dbConnection.php');
include('./mainInclude/header.php');
// Header Include from mainInclude 

    // Fetch all courses from the database
$sql = "SELECT * FROM course";
$result = $conn->query($sql);

// Create an array to store the courses
$courses = array();

if ($result->num_rows > 0)
 {
      // Store each course in the courses array
       while($row = $result->fetch_assoc()) {
        $courses[] = strtolower($row["course_name"]);
        }

         // Apply algorithm to sort the courses alphabetically
        

         quickSort($courses, 0, count($courses) - 1);
 
    


    // Check if a course name was submitted in the search form
        if (isset($_POST["course_name"])) {
          $course_name = strtolower($_POST["course_name"]);

       // Implement binary search algorithm to search for the course in the sorted courses array
     $index = binary_search($courses, $course_name);

      if ($index !== false) {
    // If a match is found, display the course details
    $course_name_found = $courses[$index];

    // Fetch the corresponding course_id from the database
   $sql1 = "SELECT course_id FROM course WHERE LOWER(course_name) = LOWER('$course_name_found')";    $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0)
         {
        $row1 = $result1->fetch_assoc();
        $course_id_found = $row1['course_id'];

        // Display the link with the correct course_id
       // echo "Course Found: ";
       

       // echo "<a href='coursedetails.php?course_id=" . $course_id_found . "'>" . $course_name_found . "</a>";

       
        $sql2 = "SELECT * FROM course WHERE course_id ='$course_id_found'";
        $result2 =$conn->query($sql2);

        if($result2->num_rows > 0){ 
            while($row = $result2->fetch_assoc()){
              $course_id = $row['course_id'];
              
            
              echo '
              <div class="container" style="margin-top: 100px;"> 
              <h2>Search Result for <em>"' . $_POST['course_name'] . '"</em></h2>
              </div>';


              echo ' <div class="container mt-5"> 

              <h1 class="text-center"> Found Course</h1>
              <div class="card-deck mt-4">
              <a href="coursedetails.php?course_id='.$course_id.'" class="btn" style="text-align: left; padding:0px; margin:0px;">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">'.$row['course_name'].'</h5>
                    <p class="card-text">'.$row['course_desc'].'</p>
                  </div>
                  <div class="card-footer">
                    <p class="card-text d-inline">Price: <small><del> &#8360 '.$row['course_original_price'].'</del></small> <span class="font-weight-bolder">&#8360 '.$row['course_price'].'<span></p> <a class="btn btn-primary text-white font-weight-bolder float-right" href="coursedetails.php?course_id='.$course_id.'">Enroll</a>
                  </div>
                </div>
              </a> 
              </div>
              </div> ';
            }
          }
        }
        
    } 
         else {
     
            echo '
            <div class="container" style="margin-top: 100px;"> 
            <h2>Search Result for <em>"' . $_POST['course_name'] . '"</em></h2>
            </div>';
        echo'<div class="container mt-5"> 
              <h1 class="text-center">  Course not found</h1>
              </div>';
         }
    

      }
      
     // Close the database connection 
      $conn->close();
    }
       // Function to implement binary search algorithm
      function binary_search($arr, $x) {
        $low = 0;
       $high = count($arr) - 1;

        while ($low <= $high) {
        $mid = floor(($low + $high) / 2);

        if ($arr[$mid] == $x) {
            return $mid;
        }

        if ($arr[$mid] < $x) {
            $low = $mid + 1;
        } else {
            $high = $mid - 1;
        }
    }

    return false;
}
function quickSort(&$array, $left, $right)
{
  

    if ($left < $right) {
        $pivotIndex = partition($array, $left, $right);
        quickSort($array, $left, $pivotIndex - 1);
        quickSort($array, $pivotIndex + 1, $right);
    }
}

function partition(&$array, $left, $right)
{
   

    $pivot = $array[$right];
    $i = $left - 1;

    for ($j = $left; $j < $right; $j++) {
        if (strcasecmp($array[$j], $pivot) < 0) {
            $i++;
            swap($array, $i, $j);
        }
    }

    swap($array, $i + 1, $right);
   
    return $i + 1;
}
function swap(&$array, $i, $j)
{


    $temp = $array[$i];
    $array[$i] = $array[$j];
    $array[$j] = $temp;
}

?>