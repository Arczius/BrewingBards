<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MailingTemplateSeeder extends Seeder
{
    public function run()
    {
        $TemplateName = 'Student aanmaken';
        $TemplateContent = '<h2>Welkom {USERNAME}</h2><p><br></p><p>Je kunt nu inloggen op Social Tavern met de volgende gegevens:</p><p>E-mail:<br>{MAIL}</p><p>Wachtwoord:<br>{PASSWORD}<br><br>Dankuwel voor deelnemen.<br>Met vriendelijke groet,<br>Team Social Tavern</p><p><br></p><img src="https://i.imgur.com/hkxE6Fr.png" alt="Logo" width="150">';
        $TemplateKeywords = '{USERNAME}, {PASSWORD}, {MAIL}';
    
        $this->db->query("INSERT INTO `MailingTemplates` (`MailingID`, `templateName`, `keywords`, `content`) VALUES (NULL, ' $TemplateName', '$TemplateKeywords', '$TemplateContent') ");

        $TemplateName = 'Wachtwoord veranderen';
        $TemplateContent = '<h2>Goede dag {USERNAME},</h2><p><br></p><p>U heeft recent uw wachtwoord veranderd. </p><p>Uw nieuwe wachtwoord is:<br>{PASSWORD}</p><p>U kunt nu inloggen met dit nieuwe wachtoord.</p><p><br></p><p>Met vriendelijke groet,<br>Team Social Tavern</p><p><br></p><img src="https://i.imgur.com/hkxE6Fr.png" alt="Logo" width="150">';
        $TemplateKeywords = '{USERNAME}, {PASSWORD}';
    
        $this->db->query("INSERT INTO `MailingTemplates` (`MailingID`, `templateName`, `keywords`, `content`) VALUES (NULL, ' $TemplateName', '$TemplateKeywords', '$TemplateContent') ");
    }
}
