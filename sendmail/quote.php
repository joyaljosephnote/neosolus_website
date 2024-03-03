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
  // Server settings
  $mail->isSMTP();
  $mail->Host       = 'smtppro.zoho.in'; // Your SMTP server
  $mail->SMTPAuth   = true;
  $mail->Username   = 'accounts@neosolus.com'; // Your SMTP username
  $mail->Password   = 'aDmkPWzsWg6m';   // Your SMTP password
  $mail->Port       = '587'; // TCP port to connect to
  $mail->SMTPSecure = 'TLS'; // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
  
  // Recipients
  $mail->setFrom('accounts@neosolus.com', 'Mail From NS Quotation Request');
  
  $recipientName = filter_var($_POST['w3lName'], FILTER_SANITIZE_STRING);
  $mail->addAddress('accounts@neosolus.com', $recipientName);
  
  // Content
  $mail->isHTML(true);
  $mail->Subject = 'Subject : Quotation Request';
  
  $body = '<h2>Quotation Request</h2>';
  
  if(trim(!empty($_POST['w3lCompanyName']))){
    $body .="<p>Company Name: <strong>".$_POST['w3lCompanyName']."</strong></p>";
  }
  if(trim(!empty($_POST['w3lContactPersonName']))){
    $body .="<p>Contact Person Name: <strong>".$_POST['w3lContactPersonName']."</strong></p>";
  }
  if(trim(!empty($_POST['w3lSender']))){
    $body .="<p>Email ID: <strong>".$_POST['w3lSender']."</strong></p>";
  }
  if(trim(!empty($_POST['w3lPhoneNumber']))){
    $body .="<p>Phone Number: <strong>".$_POST['w3lPhoneNumber']."</strong></p>";
  }
  if(trim(!empty($_POST['w3lPhoneNumber2']))){
    $body .="<p>Alternate Contact No: <strong>".$_POST['w3lPhoneNumber2']."</strong></p>";
  }
  if(trim(!empty($_POST['w3lLocation']))){
    $body .="<p>Location: <strong>".$_POST['w3lLocation']."</strong></p>";
  }
  if(trim(!empty($_POST['w3lEquipmentType']))){
    $body .="<p>Equipment Type: <strong>".$_POST['w3lEquipmentType']."</strong></p>";
  }
  if(trim(!empty($_POST['w3lProcessor']))){
    $body .="<p>Processor: <strong>".$_POST['w3lProcessor']."</strong></p>";
  }
  if(trim(!empty($_POST['w3lRAM']))){
    $body .="<p>RAM: <strong>".$_POST['w3lRAM']."</strong></p>";
  }
  if(trim(!empty($_POST['w3lStorage']))){
    $body .="<p>Storage: <strong>".$_POST['w3lStorage']."</strong></p>";
  }
  if(trim(!empty($_POST['w3lQuantity']))){
    $body .="<p>Quantity: <strong>".$_POST['w3lQuantity']."</strong></p>";
  }
  if(trim(!empty($_POST['w3lDuration']))){
    $body .="<p>Duration: <strong>".$_POST['w3lDuration']."</strong></p>";
  }
  if(trim(!empty($_POST['w3lMessage']))){
    $body .="<p>Tell us more about your requirement: <strong>".$_POST['w3lMessage']."</strong></p>";
  }
  
  $mail->Body = $body;
  
  // Send the email
  if ($mail->send()) {
    // Redirect to success page
    echo '<script>
              alert("Your quotation has been registered successfully. Our team will contact you within 24 hours on business days.");
              window.location.href = "../quotation/index.html";
          </script>';
  } else {
    echo '<script>
              alert("Submission Error");
              window.location.href = "../quotation/index.html";
          </script>';
  }
?>
