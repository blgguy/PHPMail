<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Base files 
//require 'PHPMailer/src/Exception.php';
//require 'PHPMailer/src/PHPMailer.php';
//require 'PHPMailer/src/SMTP.php';

// create object of PHPMailer class with boolean parameter which sets/unsets exception.

$mail = new PHPMailer(true);                              

try {

    //server settings...
    $mail->isSMTP(); // using SMTP protocol     
                                
    $mail->Host = 'smtp.gmail.com'; // SMTP host as gmail 
    $mail->SMTPAuth = true;  // enable smtp authentication                             
    $mail->Username = 'your@email.com';  // sender email             
    $mail->Password = '**********'; // sender email  password                          
    $mail->SMTPSecure = 'tls';  // for encrypted connection                           
    $mail->Port = 587;   // port for SMTP     
    $mail->SMTPOptions = array(
                'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
                )
    );

    //recipients..
    $mail->setFrom("your@email.com", "sender name optional"); // sender's email and name
    $mail->addAddress($Email, $FirstName);  // receiver's email and name
    $mail->addReplyTo('replyyour@email.com');
    //$mail->addCC('your@email.com');
    $mail->addBCC('bbcyour@email.com'); // if add email recipeints will not no that a copy is send

    //contents..
    $mail->isHTML(true);
    $mail->Subject = 'Mail Subject e.g account verification';
    $mail->Body    = 'Hi Sir <br><br><br> below is your activation key <br><button>ggiygvih6</button><br> 
        <footer>your footer</footer>';
    //convert HTML into a basic plain-text alternative body..
    //$mail->msgHTML(file_get_contents('contents.html'), __DIR__);
    //$mail->AltBody    = "Every thing is possible in this world"; // for non-html mail clients.
    
    // Attachments
   // $mail->addAttachment("img.jpg);
    // $mail->addAttachment("img2.jpg, kkk.jpg);
    $mail->send();
}catch (Exception $e)
 {
  // handle error.
    echo 'having some issues sending mail'; 
}
?>
