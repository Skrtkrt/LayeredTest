<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

$message = "";

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $cpassword = $_POST['c-pass'];

    $sql = "SELECT * FROM data WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    $code = mysqli_real_escape_string($conn, md5(rand()));

    if ($count > 0) {
        $message = "<div class='alert alert-danger'>Email already exists</div>";
    } else {
        if ($password === $cpassword) {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $ins = "INSERT INTO data(email, password, code) VALUES('$email', '$hashedPassword', '$code')";
            $rsl = mysqli_query($conn, $ins);
                if($rsl){
                    //Create an instance; passing `true` enables exceptions
                    $mail = new PHPMailer(true);

                    try {
                        //Server settings
                        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = 'layeredbyingrid2021@gmail.com';                     //SMTP username
                        $mail->Password   = 'iubyypguwmibejvu';                               //SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                        //Recipients
                        $mail->setFrom('layeredbyingrid2021@gmail.com');    
                        $mail->addAddress($email);     

                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'No reply';    
                        $mail->Body    = 'Here is the verification link<b><a href="http://localhost/LARAVELPROJECT/resources/views/SOFTDES/?verification='.$code.'">http://localhost/LARAVELPROJECT/resources/views/SOFTDES/?verification='.$code.'</a></b>';
                       

                        $mail->send();
                          
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                        
                    $message =  "<div class='alert alert-danger'>We have send a verification link on your email adress.</div>";
                    
                    

                }
            } else {
                $message = "<div class='alert alert-danger'>Password and Confirm Password do not match</div>";
            }
        }
        
        
        
    }
    

?>
