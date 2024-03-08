<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
define('TITLE', 'Add Book');
define('PAGE', 'library');
include('./adminInclude/header.php'); 
include('../dbConnection.php');

 if(isset($_SESSION['is_admin_login'])){
  $adminEmail = $_SESSION['adminLogEmail'];
 } else {
  echo "<script> location.href='../index.php'; </script>";
 }
 if(isset($_REQUEST['fileSubmitBtn'])){
  // Checking for Empty Fields
  if(($_REQUEST['file_name'] == "") || ($_REQUEST['file_type'] == "") || ($_REQUEST['file_id'] == "") || ($_REQUEST['file_name'] == "")){
   // msg displayed if required field missing
   $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
   // Assigning User Values to Variable
   $file_type = $_REQUEST['file_type'];
   if ($file_type == "book") {
    $file1_type = $file_type ;
  }
 
    elseif ($file_type == "note") {
     $file1_type =$file_type;
  }

   $file_name = $_REQUEST['file_name'];
   $file_desc = $_REQUEST['file_desc'];
   $file_id = $_REQUEST['file_id'];
 
   $file_link = $_FILES['file_link']['name']; 
   $pdf_type =$_FILES['file_link']['type'];
   $pdf_size =$_FILES['file_link']['size'];
   $file_link_temp = $_FILES['file_link']['tmp_name'];
   $link_path = 'librarybook/'. $file_link; 
   $link_folder = '../librarybook/'. $file_link; 
   
   move_uploaded_file($file_link_temp, $link_folder);

   $file_image = $_FILES['file_image']['name'];
   $file_image_temp = $_FILES['file_image']['tmp_name'];
   $img_folder = '../image/fileimg/'. $file_image;
   move_uploaded_file($file_image_temp, $img_folder);

    $sql = "INSERT INTO library (file_id, file_name, file_type, description, file_link, file_image) VALUES ('$file_id', '$file_name','$file1_type', '$file_desc', '$link_path','$img_folder')";
   
    if($conn->query($sql) == TRUE){
     // below msg display on form submit success
     $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> file Added Successfully </div>';
    }  
 else {
     // below msg display on form submit failed
     $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Add file </div>';
    }
  }
  }
 ?>
<div class="col-sm-6 mt-5  mx-3 jumbotron">
  <h3 class="text-center">Add New File</h3>
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="file_id">File ID</label>
      <input type="text" class="form-control" id="file_id" name="file_id" >
    </div>
    <div class="form-group">
      <label for="file_name">File Name</label>
      <input type="text" class="form-control" id="file_name" name="file_name" >
    </div>
    <div class="form-group">
    <label for="file_type">File Type</label>
    <select class="form-control" id="file_type" name="file_type">
        <option value="book">Book</option>
        <option value="note">Note</option>
    </select>
     </div>

    <div class="form-group">
      <label for="file_desc">File Description</label>
      <textarea class="form-control" id="file_desc" name="file_desc" row=2></textarea>
    </div>
    <div class="form-group">
      <label for="file_link">file Link</label>
      <input type="file" class="form-control-file" id="file_link" name="file_link" accept="pdf" required>
    </div>
     <div class="form-group">
      <label for="file_img">File Image</label>
      <input type="file" class="form-control-file" id="file_image" name="file_image">
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-danger" id="fileSubmitBtn" name="fileSubmitBtn">Submit</button>
      <a href="library.php" class="btn btn-secondary">Close</a>
    </div>
    <?php if(isset($msg)) {echo $msg; } ?>
  </form>
</div>
<!-- Only Number for input fields -->
<script>
  function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }

</script>
</div>  <!-- div Row close from header -->
</div>  <!-- div Conatiner-fluid close from header -->

<?php
include('./adminInclude/footer.php'); 
?>
