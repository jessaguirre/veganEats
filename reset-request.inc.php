<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';


if (isset($_POST['reset-request-submit'])) {


  $selector = bin2hex(random_bytes(8));
  $token = random_bytes(32);


  $url = "localhost/php/Vegan-Eats/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);


  $expires = date("U") + 1800;

  require 'dbh.inc.php';

  $userEmail = $_POST["email"];

  $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "There was an error!";
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "s", $userEmail);
    mysqli_stmt_execute($stmt);
  }


  $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?)";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "There was an error!";
    exit();
  } else {
    
    $hashedToken = password_hash($token, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
    mysqli_stmt_execute($stmt);
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);

  


  $to = $userEmail;

  $subject = 'Reset your password for veganeats';

  $message = '<p>We recieved a password reset request. The link to reset your password is below. ';
  $message .= 'If you did not make this request, you can ignore this email</p>';
  $message .= '<p>Here is your password reset link: </br>';
  $message .= '<a href="' . $url . '">' . $url . '</a></p>';

  // $headers = "From: veganeats <veganeats@gmail.com>\r\n";
  // $headers .= "Reply-To: veganeats@gmail.com\r\n";
  // $headers .= "Content-type: text/html\r\n";


   // mail Part Start
     $mail = new PHPMailer(true);

      try {
          
          $mail->SMTPDebug = 2;                                   
          $mail->isSMTP();                                          
          $mail->Host       = 'smtp.gmail.com';
          $mail->SMTPAuth   = true;                                 
          $mail->Username   = 'asadashfaq20@gmail.com';                  
          $mail->Password   = 'qbxuxzueqhccjtmm';                            
          $mail->SMTPSecure = 'tls';                               
          $mail->Port       = 587;                                 

          //Recipients
          $mail->setFrom('asadashfaq20@gmail.com', 'veganeats');
          $mail->addAddress($to, 'User');  

          // Content
          $mail->isHTML(true);
          $mail->Subject = $subject;
          $mail->Body    = $message;

          $mail->send();
        header("Location: ../reset-password.php?reset=success");
      } catch (Exception $e) {
        header("Location: ../reset-password.php?reset=false");
      }


  // mail Part end   







  // mail($to, $subject, $message, $headers);

  // header("Location: ../reset-password.php?reset=success");
} else {
  header("Location: ../signup.php");
  exit();
}
