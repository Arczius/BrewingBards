<?php
namespace App\Models;

use CodeIgniter\Model;

class getModeratorStudentArchive extends Model{
    protected $table = "ModeratorStudentArchive";
    protected $primaryKey = "ID";
    protected $returnType = "array";
    protected $allowedFields = [
        "ID",
        'ModeratorID',
        'StudentID',
    ];
}
