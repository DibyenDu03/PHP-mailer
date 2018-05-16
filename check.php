<?php
    session_start();
    $email=$_SESSION['email'];
    $subject=$_SESSION['subject'];
    $message=$_SESSION['message'];
    $_SESSION['ch']=1;
  //  echo $error." ".$email." ".$subject." ".$message;
    
               // $headers="From: dibyendu830711@geu.ac.in";
                //mail($email,$subject,$message,$headers);
             //   require 'phpmailer\PHPMailerAutoload.php';

                require 'PHPMailer.php';
                require 'Exception.php';

                require_once 'vendor/autoload.php';
              //  $mail=new PHPMailer;
                $mail = new PHPMailer\PHPMailer\PHPMailer;
           //    $mail->SMTPDebug=3;
               $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
                $mail->isSMTP();
                $mail->Host='tls://smtp.gmail.com';
                $mail->SMTPAuth=true;
                $mail->Username='xxxxx@gmail.com';
                $mail->Password='xxxx';
                $mail->SMTPSecure='tls';
                $mail->Port=587;
                $mail->setFrom('xxxxxx@gmail.com','Dibyendu');
                $mail->addAddress($email);
                $mail->isHTML(true);
                $mail->Subject=$subject;
                $mail->Body=$message;
                if($mail->send())
                    {
                        $error=" Your message is successfully send";
                        $val=0;
                    }
                    /*
                    <?php

require_once "vendor/autoload.php";

//PHPMailer Object
$mail = new PHPMailer;

//From email address and name
$mail->From = "from@yourdomain.com";
$mail->FromName = "Full Name";

//To address and name
$mail->addAddress("recepient1@example.com", "Recepient Name");
$mail->addAddress("recepient1@example.com"); //Recipient name is optional

//Address to which recipient will reply
$mail->addReplyTo("reply@yourdomain.com", "Reply");

//CC and BCC
$mail->addCC("cc@example.com");
$mail->addBCC("bcc@example.com");

//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = "Subject Text";
$mail->Body = "<i>Mail body in HTML</i>";
$mail->AltBody = "This is the plain text version of the email content";

if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
    echo "Message has been sent successfully";
}
                    */
             
                else
                {
                 $error=" something went wrong  ";
                 $val=1;
                }
    $_SESSION['error']=$error;
    $_SESSION['val']=$val;
    header("Location:message.php");
?>
