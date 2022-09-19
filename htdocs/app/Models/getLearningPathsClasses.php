<?php

namespace App\Models;

use CodeIgniter\Model;

class getLearningPathsClasses extends Model{
    protected $table = "LearningPathsClasses";
    protected $primaryKey = "ID";
    protected $returnType = "array";
    protected $allowedFields = ['ClassID', 'LearningPathID'];
}
