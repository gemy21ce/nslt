<?php

include_once 'class.phpmailer.php';
include_once 'class.smtp.php';

class Mailer {

    private $smtp = 'smtp.gmail.com';

    public function SendTaskMail($recivers, $subject, $replyTo, $desc, $email, $password) {
        $mail = new PHPMailer();
        $mail->IsSMTP();                                   // set mailer to use SMTP
        $mail->SMTPSecure= 'ssl'; //  Used instead of TLS when only POP mail is selected
        $mail->Port = 465;        //  Used instead of 587 when only POP mail is selected
        $mail->SMTPDebug = 1;
        $mail->Host = $this->smtp;  // specify main and backup server
        $mail->SMTPAuth = true;     // turn on SMTP authentication
        $mail->Username = $email;  // SMTP username
        $mail->Password = $password; // SMTP password
        $mail->From = $email;
        $mail->FromName = $email;
        foreach ($recivers as $reciver) {
            $mail->AddAddress($reciver);
        }
        $mail->AddReplyTo($replyTo);

        $mail->WordWrap = 80;                                 // set word wrap to 80 characters
        $mail->IsHTML(true);                                  // set email format to HTML
        $mail->ContentType = "text/html";
        $mail->Subject = $subject;
        $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
        $mail->Body = $desc; // optional - MsgHTML will create an alternate automatically
        //$mail->AddCustomHeader("Content-type: text/html; charset=utf-8");
        if (!$mail->Send()) {
            return false;
        }
        return true;
    }

}

?>
