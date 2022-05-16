<?php

    require "PHPMailer/PHPMailerAutoload.php";
    class Email {
    
        function smtpmailer($to, $from, $from_name, $subject, $body){
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->SMTPAuth = true; 
    
            $mail->SMTPSecure = 'ssl'; 
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 465;  
            $mail->Username = 'emiliecoatelant.vegandco@gmail.com';
            $mail->Password = 'bobigny2022!';   
    
            //   $path = 'reseller.pdf';
            //   $mail->AddAttachment($path);
    
            $mail->IsHTML(true);
            $mail->From="emiliecoatelant.vegandco@gmail.com";
            $mail->FromName=$from_name;
            $mail->Sender=$from;
            $mail->AddReplyTo($from, $from_name);
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->AddAddress($to);
            if(!$mail->Send())
            {
                $error ="Please try Later, Error Occured while Processing...";
                return $error; 
            }
            else 
            {
                $error = "Thanks You !! Your email is sent.";  
                return $error;
            }
        }
        
        $to   = $to;
        $from = 'emiliecoatelant.vegandco@gmail.com';
        $name = 'VEG AND CO - SUPPORT';
        $subj = $subject;
        $msg = 'http://localhost/vegandco/';
        
        $error=smtpmailer($to,$from, $name ,$subj, $msg);
        
    }

    Email::smtpmailer();
    
?>