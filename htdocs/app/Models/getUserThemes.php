<?php

namespace App\Models;

use CodeIgniter\Model;

class getUserThemes extends Model{
    protected $table = "UserThemes";
    protected $primaryKey = "ID";
    protected $returnType = "array";
    protected $allowedFields = ['UserID', 'ThemeID'];
}