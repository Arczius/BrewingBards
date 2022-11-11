<?php

helper("BasicMail");

class ResetPasswordMail extends BasicMail {
    public function __construct($fromMail, $fromName)
    {
        parent::construct($fromMail, $fromName);
    }

    public function SendResetLinkMail($toMailAddress, $personName, $link){
        $link = base_url()/"NewPassword";
        $this->SendMail(
            $to = $toMailAddress,
            $subject = "Uw wachtwoord resetten",
            $messsage = "
            <h1>Hallo $personName als u een nieuw gegeneerd wachtwoord wilt hebben klik dan op de link</h1>
            <a href='$link'>Klik hier voor een nieuw wachtwoord</a>
            "
        );
    }
}