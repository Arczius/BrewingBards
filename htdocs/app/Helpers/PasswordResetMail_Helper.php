<?php

helper("BasicMail");

class NewUserPasswordMail extends BasicMail
{

    public function __construct($fromName, $fromEmail)
    {
        parent::__construct($fromName, $fromEmail);
    }

    public function SendPasswordMail($toMailAddress, $personName,  $password)
    {
        $baseUrl = base_url();
        $this->SendMail(
            $to = $toMailAddress,
            $subject = "Hallo $personName, nieuw wachtwoord aangevraagt",
            $message = " 
            <h1>Hallo $personName, uw wachtwoord is veranderd.</h1>
            <p>u kan inloggen op <a href='$baseUrl' target='_blank'>$baseUrl</a> met de volgende gegevens:</p>
            <p>Email: $toMailAddress</p>
            <p>Wachtwoord: $password</p> 
            ",
        );
    }
    
}