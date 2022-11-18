<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MailingTemplateSeeder extends Seeder
{
    public function run()
    {
        $TemplateName = 'Student aanmaken';
        $TemplateContent = '<h2>Welkom!</h2><p>U bent succesvol aangemeld voor Social Tavern. <br></p><p>Je gebruikersnaam is {USERNAME}<br></p>';
    
        $this->db->query("INSERT INTO `MailingTemplates` (`MailingID`, `templateName`, `content`) VALUES (NULL, ' $TemplateName', '$TemplateContent') ");
    }
}
