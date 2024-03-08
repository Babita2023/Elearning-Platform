<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lms1_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$file_id = $_GET['file_id'];

// Get the file information from the 'library' table
$sql = "SELECT file_name, file_link, upload_timestamp FROM library WHERE file_id = '$file_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $fileName = $row['file_name'];
      $filePath = $row['file_link'];
     
 

    if(!empty($fileName) && file_exists($filePath)){
        // Define headers
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$fileName");
        header("Content-Type: application/pdf");
        header("Content-Transfer-Encoding: binary");

        // Read the file
        readfile($filePath);
        exit;
    }else{
        echo 'The file does not exist.';
    }
}

?>
