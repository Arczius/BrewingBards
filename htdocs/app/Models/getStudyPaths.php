<?php

namespace App\Models;

use CodeIgniter\Model;

class getStudyPaths extends Model{
    protected $table = "StudyPath";
    protected $primaryKey = "ID";
    protected $returnType = "array";
    protected $allowedFields = ['Name', 'Required'];
}
