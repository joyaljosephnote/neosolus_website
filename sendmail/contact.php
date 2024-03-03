<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  
  // Include PHPMailer classes
  require 'phpmailer/src/Exception.php';
  require 'phpmailer/src/PHPMailer.php';
  require 'phpmailer/src/SMTP.php';
  
  // Create a new PHPMailer instance
  $mail = new PHPMailer(true);
  $mail->CharSet ='UTF-8';
  $mail->setLanguage('en', 'phpmailer/language/');
  $mail->isHTML(true);
  
  
  // Server settings
  $mail->isSMTP();
  $mail->Host       = 'smtp.gmail.com'; // Your SMTP server
  $mail->SMTPAuth   = true;
  $mail->Username   = 'neosolus2023@gmail.com'; // Your SMTP username
  $mail->Password   = 'lfrh xyew zizj ueyu';   // Your SMTP password
  $mail->Port       = '587'; // TCP port to connect to
  $mail->SMTPSecure = 'TLS'; // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
  
  // Recipients
  $mail->setFrom('neosolus2023@gmail.com', 'Contact Form');
  
  $recipientName = filter_var($_POST['w3lName'], FILTER_SANITIZE_STRING);
  $mail->addAddress('neosolus2023@gmail.com', $recipientName);
  
  // Content
  $mail->isHTML(true);
  $mail->Subject = 'Subject : Contact Form';
  
  $body = '<h2>Contact Form</h2>';
  
  if(trim(!empty($_POST['w3lName']))){
    $body .="<p>Name: <strong>".$_POST['w3lName']."</strong></p>";
  }
  if(trim(!empty($_POST['w3lSender']))){
    $body .="<p>Sender Mail: <strong>".$_POST['w3lSender']."</strong></p>";
  }
  if(trim(!empty($_POST['w3lMessage']))){
    $body .="<p>Message: <strong>".$_POST['w3lMessage']."</strong></p>";
  }
  
  $mail->Body = $body;
  
  // Send the email
  if ($mail->send()) {
    // Redirect to success page
    echo '<script>
              alert("Message sent successfully. Our team will contact you within 24 hours on business days.");
              window.location.href = "../contact/index.html";
          </script>';
  } else {
    echo '<script>
              alert("Message could not be sent");
              window.location.href = "../contact/index.html";
          </script>';
  }
?>
