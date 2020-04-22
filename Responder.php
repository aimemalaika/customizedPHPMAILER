<?php
    class Responder extends PHPMailer{
        private function sendMessage($virtualSender,$destination,$mailSubject,$MailContent,$attach = null,$nameattach=null){
            $mail = new PHPMailer();
            $mail->SMTPDebug = 0;                               // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'acontrol08@gmail.com';                 // SMTP username
            $mail->Password = 'aime1995';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            $mail->setFrom($virtualSender['email'],$virtualSender['name']);
            foreach ($destination as $destination) {
                $mail->addAddress($destination['email'],$destination['name']);     // Add a recipient
            }
            if($nameattach != null){
                $mail->addAttachment($attach,$nameattach);
            }
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $mailSubject;
            $mail->Body    = $MailContent;
            
            $mail->send();
            //  if ($mail->send()) {
            //     echo 'Message has been sent';
            //     die($attach);
            //  }else {
            //     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            //     die();
            //  }
    
        }
        
    }
?>