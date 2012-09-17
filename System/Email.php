<?php

namespace System;
class Email extends \System\Core {
    public $email;
    private $mailer, $message;
    
    /**
     * Прави връзка с SMTP сървъра
     */
    public function loadSmtp() {
        \System\Core::loadSystem('Swift/swift_required.php');
        $transport = \Swift_SmtpTransport::newInstance(\Config::$smtpServer, \Config::$smtpPort)
                ->setUsername(\Config::$emailUsername)
                  ->setPassword(\Config::$emailPassword);
        $this->mailer = \Swift_Mailer::newInstance($transport);
    }
    /**
     * Изпраща съобщение
     * 
     * @param string $subject заглавие на съобщението
     * @param string $senderEmail имейл на подателя, най-често е имейлът зададен в /System/Config.php
     * @param string $senderName име на подателя
     * @param string $receiverEmail имейл на получателя
     * @param string $receiverName име на получателя
     * @param string $content съдържание на съобщението, разрешено е и html
     * @return bool връща true/false
     */
    public function sendEmail($subject, $senderEmail, $senderName, $receiverEmail, $receiverName, $content) {
        $this->message = \Swift_Message::newInstance($subject)
          ->setFrom(array($senderEmail => $senderName))
          ->setTo(array($receiverEmail => $receiverName))
          ->setBody($content, 'text/html');
        $result = $this->mailer->send($this->message);
        if($result) {
            return true;
        } else {
            return false;
        }
    }
}
?>