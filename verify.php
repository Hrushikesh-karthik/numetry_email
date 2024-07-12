<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Generate a unique token
$token = bin2hex(random_bytes(16));

// Store the token (for simplicity, we're storing it in a file)
$email = 'user_email@example.com'; // Replace with the user's email
$storedTokens = json_decode(file_get_contents('tokens.json'), true);
$storedTokens[$email] = $token;
file_put_contents('tokens.json', json_encode($storedTokens));

// Send the verification email
$mail = new PHPMailer(true);
try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;         // Enable SMTP authentication
    $mail->Username = 'karthiku1904@gmail.com';  // SMTP username (your Gmail email address)
    $mail->Password = 'orvg lawx wwhz ccyn';         // SMTP password (your Gmail password or App Password)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587; 

    // Recipients
    $mail->setFrom('karthiku1904@gmail.com', 'Your Name');
    $mail->addAddress($email);

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Email Verification';
    $mail->Body    = "Click the link to verify your email: <a href='http://yourwebsite.com/verify.php?email=$email&token=$token'>Verify Email</a>";

    $mail->send();
    echo 'Verification email sent.';
} catch (Exception $e) {
    echo "Verification email could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
