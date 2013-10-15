<html>
<head>

<title>CAADI</title>
</head>
<body>


<?php

require_once('class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch

$mail->IsSMTP(); // telling the class to use SMTP

try {
  $mail->Host       = "smtpout.secureserver.net"; // SMTP server
  $mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
  $mail->SMTPAuth   = true;                  // enable SMTP authentication
  $mail->Host       = "smtpout.secureserver.net"; // sets the SMTP server
  $mail->Port       = 25;                    // set the SMTP port for the GMAIL server
  $mail->Username   = "smtp@holboxdesign.com"; // SMTP account username
  $mail->Password   = "h0lb0x";        // SMTP account password
  $mail->AddReplyTo('info@caadi.co', 'CAADI INFO'); //a quien se le deve responder ( de quien viene)
  $mail->AddAddress('info@caadi.co', 'DESTINATARIO');
  $mail->SetFrom('info@caadi.co', 'CAADI INFO');// SENDER
  $mail->Subject = 'Contacto CAADI Cursos';
  $mail->AltBody = 'Este mensaje esta en Html!!'; // optional - MsgHTML will create an alternate automatically
  $msgCont = "Nuevo mensaje de contacto. www.caadi.co"."\r\n\r\n".$_POST['name']."\r\n".$_POST['email']."\r\n\r\n".$_POST['asunto']."\r\n".$_POST['mensaje'];
  //$mail->MsgHTML(file_get_contents('mailer/contents.html'), $_POST["mensaje"]);
  $mail->MsgHTML(file_get_contents('mailer/contents.html'), $msgCont);
  //$mail->AddAttachment('images/phpmailer.gif');      // attachment
  //$mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
  $mail->AddStringAttachment($msgCont, "contacto-CAADI_-_".date('Y/m/d').".txt");
  


  $mail->Send();
echo "tu mensaje se envio con exito,\r\n muy pronto nos pondremos en contacto con usted.</p>\r\n\r\n";
echo "<a href='javascript:history.back(1);'>Regresar</a>";



//Form Validation
  


?>


</body>
</html>
