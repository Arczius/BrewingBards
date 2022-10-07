<?php
namespace App\Models;

use CodeIgniter\Model;

class getClasses extends Model{
    protected $table = "Classes";
    protected $primaryKey = "ID";
    protected $returnType = "array";
    protected $allowedFields = ['Name'];
}
