<?php

namespace App\Models;

use CodeIgniter\Model;

class getUsersClasses extends Model{
    protected $table = "UsersClasses";
    protected $primaryKey = "ID";
    protected $returnType = "array";
    protected $allowedFields = ['ClassID', 'UserID'];
}