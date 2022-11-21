<?php

namespace App\Models;

use CodeIgniter\Model;

class getMailingTemplates extends Model{
    protected $table = "MailingTemplates";
    protected $primaryKey = "MailingID";
    protected $returnType = "array";
    protected $allowedFields = ['MailingID', 'templateName', 'content'];
}