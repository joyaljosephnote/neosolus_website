<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $name = $_POST['w3lName'];
  $mobileNumber = $_POST['w3lMobileNumber'];
  $senderEmail = $_POST['w3lSender'];
  $assetId = $_POST['w3lassetId'];
  $message = $_POST['w3lMessage'];
  $recipient = "neosolus2023@gmail.com";
  $mailheader = "From: $name";
  $combinedMessage = "Asset ID: $assetId\n\nSender Email: $senderEmail\n\nMessage: $message";


  if(mail($recipient,$name,$combinedMessage,$mailheader)){
    header("Location: success.html");
        exit();
  }else{
    header("Location: page-error.html");
        exit();
  } 
}
?>