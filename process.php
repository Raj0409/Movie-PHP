<?php

$Uname = $_POST['Uname'];
$email = $_POST['email'];
$message=$_POST['msg'];

$email2 = "020sharvigabani@gmail.com";
$subject = "Website Contact Mail";

if(empty($Uname) || empty($email) || empty($message)) 
{
    header("Location:contact.php?error");
} 
else {
	
	 //MAILER

    require 'phpmailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;
	
	//$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = '020sharvigabani@gmail.com';                 // SMTP username
    $mail->Password = 'sharvi9102000';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

	$mail->AddReplyTo($email);
    $mail->From = $email;
    $mail->FromName = $email;
    $mail->addAddress('020sharvigabani@gmail.com', 'Admin');     // Add a recipient

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        header("Location:contact.php?success");
    }
}
?>