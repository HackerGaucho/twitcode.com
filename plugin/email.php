<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function email($body, $subject, $to, $toName, $fromName = false, $fromMail = false)
{// composer require phpmailer/phpmailer
    $mail=new PHPMailer();
    $mail->CharSet = 'UTF-8';
    if (SMTP_TYPE=='smtp') {
        $mail->IsSMTP();
    }
    if (SMTP_DEBUG) {
        $mail->SMTPDebug=1; // 1 = errors and messages, 2 = messages only
    } else {
        $mail->SMTPDebug=0;
    }
    if (SMTP_AUTH) {
        $mail->SMTPAuth=true;
        $mail->SMTPSecure=PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Username=SMTP_USER;
        $mail->Password=SMTP_PASSWORD;
    } else {
        $mail->SMTPAuth=false;
    }
    if (!$fromName) {
        $fromName=SITE_NAME;
    }
    if (!$fromMail) {
        $fromMail=SITE_EMAIL;
    }
    $mail->Port=SMTP_PORT;
    $mail->Host=SMTP_HOST;
    $mail->SetFrom($fromMail, $fromName);
    $mail->AddReplyTo($fromMail, "Reply");
    $mail->Subject=$subject;
    $mail->MsgHTML($body);
    $address = $to;
    $mail->AddAddress($address, $toName);
    return $mail->Send();
}
