<?php

namespace App\Models;

use CodeIgniter\Model;

class getStudyPathQuestions extends Model{
    protected $table = "StudyPathQuestion";
    protected $primaryKey = "ID";
    protected $returnType = "array";
    protected $allowedFields = ['ID', 'Order', 'StudyPathID', 'QuestionID'];
}
