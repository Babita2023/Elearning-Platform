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
    $pdf = $row['file_name'];
   
    $path = $row['file_link'];


   echo "<iframe src='{$path}' width='100%' height='100%'></iframe>";


    echo '<br/><br/>';
    // Use the <embed> tag to display the PDF directly in the browser
}
 else {
    echo "0 results";
}
$conn->close();
?>

