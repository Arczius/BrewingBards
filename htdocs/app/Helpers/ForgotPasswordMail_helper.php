<?php

helper("BasicMail");

class ForgotPasswordMail extends BasicMail
{

    public function __construct($fromName, $fromEmail)
    {
        parent::__construct($fromName, $fromEmail);
    }

    public function SendPasswordMail($toMailAddress, $personName,  $password, $content)
    {
        $baseUrl = base_url();
        $this->SendMail(
            $to = $toMailAddress,
            $subject = "Hallo $personName,u hebt een nieuwe wachtwoord aangevraagt",
            $message = $content,
        );
    }
    
}