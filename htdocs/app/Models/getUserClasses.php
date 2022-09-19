<?php

namespace App\Models;

use CodeIgniter\Model;

class getUserClasses extends Model{
    protected $table = "UserClasses";
    protected $primaryKey = "ID";
    protected $returnType = "array";
    protected $allowedFields = ['ClassID', 'UserID'];
}