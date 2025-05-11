<?php
$to = 'remon.stha22@gmail.com';
$subject = 'Test Email from Core PHP';
$message = "This is a test email sent using core PHP's mail() function.\n\nIt's important to configure headers correctly for better deliverability with Gmail.";
$from = 'https://ramanstha.com.np/'; // Replace with your actual sending email address
$replyTo = 'https://ramanstha.com.np/'; // Recommended to be the same as $from

// Constructing the email headers - VERY IMPORTANT for Gmail
$headers = "From: " . strip_tags($from) . "\r\n";
$headers .= "Reply-To: " . strip_tags($replyTo) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// Sending the email
$mailSuccess = mail($to, $subject, $message, $headers);

if ($mailSuccess) {
    echo 'Email sent successfully!';
} else {
    echo 'Failed to send email.';
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = strip_tags(trim($_POST["message"]));

    // Recipient email address (your Gmail address)
    $to = 'remon.stha22@gmail.com'; // Replace with your actual Gmail address

    // Subject of the email
    $subject = 'New Contact Form Submission';

    // Construct the email message
    $email_message = "Name: $name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Message:\n$message\n";

    // Set the "From" address - VERY IMPORTANT for Gmail
    $from = ' https://ramanstha.com.np'; // Replace with a valid email on your domain

    // Construct email headers
    $headers = "From: " . strip_tags($from) . "\r\n";
    $headers .= "Reply-To: " . strip_tags($email) . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Send the email
    $mailSuccess = mail($to, $subject, $email_message, $headers);

    if ($mailSuccess) {
        echo "Thank you for your message. We will get back to you shortly!";
        // You might want to redirect the user to a thank you page here
        // header('Location: thank_you.html');
    } else {
        echo "Oops! Something went wrong and we couldn't send your message.";
    }
} else {
    // If someone tries to access process_form.php directly
    header("Location: index.html");
    exit();
}
?>
