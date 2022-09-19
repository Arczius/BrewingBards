<?php

namespace App\Models;

use CodeIgniter\Model;

class getThemes extends Model{
    protected $table = "Themes";
    protected $primaryKey = "ID";
    protected $returnType = "array";
    protected $allowedFields = ['Name'];
}
