<?php

class BasicMail
{
    protected $emailConfig;
    protected $fromEmail;
    protected $fromUsername;

    
    /**
     * __construct
     *
     * @param  string $fromName - the name of the person who you want to send the email as
     * @param  mixed $fromEmail - the mail address of the person you want to send the email as
     * @return void
     */
    protected function __construct($fromName, $fromEmail)
    {
        $this->email = \Config\Services::email();      
        $this->fromEmail = $fromEmail;
        $this->fromName = $fromName;
    }
    
    /**
     * SendMail a method to send a mail 
     *
     * @param  string $to - the mail address you want to send the mail to
     * @param  string $subject - the subject of the mail
     * @param  string $message - the message of the mail
     * @param  string $cc - the cc of the mail, leave empty if you dont want to use this
     * @param  string $bcc -the bcc of the mail, leave empty if you dont want to use this
     * @return void
     */
    protected function SendMail($to, $subject, $message, $cc = null, $bcc = null ){
        $this->email->setFrom($this->fromEmail, $this->fromName);
        $this->email->setTo($to);
        $this->email->setSubject($subject);
        $this->email->setMessage($message);
        if($cc !== null){
            $this->email->setCC($cc);
        }
        if($bcc !== null){
            $this->email->setBCC($bcc);
        }

        $this->email->send();
    }


    /**
     * setFromEmail a method to declare the email address where you wanna send this from
     *
     * @param  string $email - the name of the email address to set the mail to
     * @return void
     */
    public function SetFromEmail($email){
        $this->fromEmail = $email;
    }
    
    /**
     * setFromName a method to declare the person's name where you wanna send this from
     *
     * @param  string $name - the name of the person you wanna send this mail as
     * @return void
     */
    public function SetFromName($name){
        $this->fromName = $name;
    }

}