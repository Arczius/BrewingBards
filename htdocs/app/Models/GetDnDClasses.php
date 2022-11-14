<?php
namespace App\Models;

use CodeIgniter\Model;

class getDnDClasses extends Model{
    protected $table = "DnDClasses";
    protected $primaryKey = "DnDClassId";
    protected $returnType = "array";
    protected $allowedFields = ['ClassName'];
}