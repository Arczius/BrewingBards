<?php
namespace App\Models;

use CodeIgniter\Model;

class getClassesModerators extends Model{
    protected $table = "Classes_Moderators";
    protected $primaryKey = "ID";
    protected $returnType = "array";
    protected $allowedFields = ['ClassID', 'ModeratorName'];
}