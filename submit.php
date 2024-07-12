<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $branch = $_POST['branch'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];

    // Validate data
    if (empty($name) || empty($email) || empty($phone) || empty($branch) || empty($dob) || empty($address)) {
        die("Please fill in all required fields.");
    }

    // Prepare the email content
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;         // Enable SMTP authentication
        $mail->Username = 'karthiku1904@gmail.com';  // SMTP username (your Gmail email address)
        $mail->Password = 'orvg lawx wwhz ccyn';         // SMTP password (your Gmail password or App Password)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587; // TCP port to connect to

        //Recipients
        $mail->setFrom('karthiku1904@gmail.com', 'Mailer');
        $mail->addAddress('karthiku1904@gmail.com', 'Joe User'); // Add a recipient

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'New Student Registration';
        $mail->Body    = "Name: $name<br>Email: $email<br>Phone: $phone<br>Branch: $branch<br>DOB: $dob<br>Address: $address";

        $mail->send();
        echo 'Registration successful. Email has been sent.';
    } catch (Exception $e) {
        echo "Registration successful, but email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    header("Location: registration_form.html");
    exit();
}
?>