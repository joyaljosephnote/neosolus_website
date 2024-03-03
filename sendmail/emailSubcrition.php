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
  $mail->Host       = 'smtppro.zoho.in'; // Your SMTP server
  $mail->SMTPAuth   = true;
  $mail->Username   = 'accounts@neosolus.com'; // Your SMTP username
  $mail->Password   = 'aDmkPWzsWg6m';   // Your SMTP password
  $mail->Port       = '587'; // TCP port to connect to
  $mail->SMTPSecure = 'TLS'; // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
  
  // Recipients
  $mail->setFrom('accounts@neosolus.com', 'Email Subscription');
  
  $recipientName = filter_var($_POST['w3lName'], FILTER_SANITIZE_STRING);
  $mail->addAddress('accounts@neosolus.com', $recipientName);
  
  // Content
  $mail->isHTML(true);
  $mail->Subject = 'Subject : Email Subscription';
  
  $body = '<h2>Email Subscription</h2>';
  
  if(trim(!empty($_POST['subEmail']))){
    $body .="<p>Subscription Mail ID: <strong>".$_POST['subEmail']."</strong></p>";
  }
  
  $mail->Body = $body;
  
  // Send the email
  if ($mail->send()) {
    // Redirect to success page
    echo '<script>
              alert("Subscribed");
              window.location.href = "../index.html";
          </script>';
  } else {
    echo '<script>
              alert("Subscription Error");
              window.location.href = "../index.html";
          </script>';
  }
?>
