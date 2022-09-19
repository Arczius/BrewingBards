<?php

namespace App\Models;

use CodeIgniter\Model;

class getLearningPaths extends Model{
    protected $table = "LearningPaths";
    protected $returnType = "array";
    protected $allowedFields = ['Name'];
}
?>