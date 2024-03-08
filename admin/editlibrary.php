<?php 
if(!isset($_SESSION)){ 
  session_start(); 
}
define('TITLE', 'Edit Library');
define('PAGE', 'library');
include('./adminInclude/header.php'); 
include('../dbConnection.php');

if(isset($_SESSION['is_admin_login'])){
  $adminEmail = $_SESSION['adminLogEmail'];
} else {
  echo "<script> location.href='../index.php'; </script>";
}

if(isset($_POST['requpdate'])){
  // Checking for Empty Fields
  if(empty($_POST['file_id']) || empty($_POST['file_type']) || empty($_POST['file_name'])){
    // msg displayed if required field missing
    $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fields </div>';
  } else {
    // Assigning User Values to Variables
    $file_id = $_POST['file_id'];
    $file_type = $_POST['file_type'];
    $file_name = $_POST['file_name'];
    $file_desc = $_POST['file_desc'];

    // File link and image handling
   
    $file_link = '';
    $file_image = '';

    if(!empty($_FILES['file_link']['name'])) {
        $flink ='../librarybook./'. $_FILES['file_link']['name'];
      $file_link = 'librarybook/' . $_FILES['file_link']['name'];
      move_uploaded_file($_FILES['file_link']['tmp_name'], $flink);
    }

    if(!empty($_FILES['file_image']['name'])) {
      $file_image = '../image/fileimg/' . $_FILES['file_image']['name'];
      move_uploaded_file($_FILES['file_image']['tmp_name'], $file_image);
    }

    // Update SQL query
    $sql = "UPDATE library SET file_type='$file_type', file_name='$file_name', description='$file_desc'";

    if(!empty($file_link)) {
      $sql .= ", file_link='$file_link'";
    }

    if(!empty($file_image)) {
      $sql .= ", file_image='$file_image'";
    }

    $sql .= " WHERE file_id='$file_id'";

    if($conn->query($sql) === TRUE){
      $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> File Updated Successfully </div>';
    } else {
      $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update File </div>';
    }
  }
}
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
  <h3 class="text-center">Update File Details</h3>
  <?php
  if(isset($_REQUEST['view'])){
    $file_id = $_REQUEST['id'];
    $sql = "SELECT * FROM library WHERE file_id = '$file_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
  }
  ?>
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="file_id">File ID</label>
      <input type="text" class="form-control" id="file_id" name="file_id" value="<?php echo isset($row['file_id']) ? $row['file_id'] : ''; ?>" readonly>
    </div>
    <div class="form-group">
      <label for="file_name">File Name</label>
      <input type="text" class="form-control" id="file_name" name="file_name" value="<?php echo isset($row['file_name']) ? $row['file_name'] : ''; ?>">
    </div>
    <div class="form-group">
      <label for="file_desc">File Description</label>
      <textarea class="form-control" id="file_desc" name="file_desc" rows="2"><?php echo isset($row['description']) ? $row['description'] : ''; ?></textarea>
    </div>
    <div class="form-group">
      <label for="file_type">File Type</label>
      <select class="form-control" id="file_type" name="file_type">
        <option value="book" <?php if(isset($row['file_type']) && $row['file_type'] == 'book') echo 'selected'; ?>>Book</option>
        <option value="note" <?php if(isset($row['file_type']) && $row['file_type'] == 'note') echo 'selected'; ?>>Note</option>
      </select>
    </div>
    <div class="form-group">
      <label for="file_link">File link</label>
      <input type="file" class="form-control-file" id="file_link" name="file_link">
    </div>
    <div class="form-group">
      <label for="file_image">File Image</label>
      <input type="file" class="form-control-file" id="file_image" name="file_image">
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">Update</button>
      <a href="library.php" class="btn btn-secondary">Close</a>
    </div>
    <?php if(isset($msg)) { echo $msg; } ?>
  </form>
</div>

<?php include('./adminInclude/footer.php'); ?>
