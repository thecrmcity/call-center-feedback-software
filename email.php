<?php
include('PHPMailer/PHPMailerAutoload.php');

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = '10.20.10.18';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'admin.support@silaris.in';                 // SMTP username
$mail->Password = 'google@555';                           // SMTP password
#$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                                    // TCP port to connect to

$mail->addCC('emailer@silaris.in','Emailer');

    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML


//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
$mail->setFrom('admin.support@silaris.in', 'Admin Support');
$mail->addAddress('dilip.kumar@silaris.in', 'Dilip Kumar');


?>