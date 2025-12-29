<?php
if ($_POST) {
    // ←←← CHANGE THIS TO YOUR REAL EMAIL
    $to_email = "northcarolinapirateparty@gmail.com";

    $first_name = trim($_POST['first_name']);
    $last_name  = trim($_POST['last_name']);
    $email      = trim($_POST['email']);
    $message    = trim($_POST['message']);

    // Basic anti-spam check – if bot filled the honeypot field, ignore
    if (!empty($_POST['website'])) {
        die("Spam detected");
    }

    $subject = "New message from $first_name $last_name";
    $body    = "You have a new contact form submission:\n\n";
    $body   .= "Name: $first_name $last_name\n";
    $body   .= "Email: $email\n\n";
    $body   .= "Message:\n$message\n";

    $headers  = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to_email, $subject, $body, $headers)) {
        header("Location: index.html?sent=1");
    } else {
        header("Location: index.html?error=1");
    }
    exit;
}
?>
