<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
     $subject = $_POST["subject"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Set up email parameters
    $to = "atibabsharma123@gmail.com"; // Owner's email address
    $subject = "Subject: $subject\n";
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n$message";
    $headers = "From: $email";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "Your message has been sent. We'll get back to you soon.";
    } else {
        echo "Failed to send your message. Please try again later.";
    }
} else {
    // Redirect back to contact page if accessed directly
    header("Location: contact.php");
    exit;
}
?>
