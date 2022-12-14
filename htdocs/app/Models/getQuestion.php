<?php

namespace App\Models;
use CodeIgniter\Model;

class getQuestion extends Model{

    protected $table = 'Question';
    protected $primaryKey = "ID";
    protected $returnType = "array";
    protected $allowedFields = [
        'ID',
        'type',
        'title',
        'description',
        'required',
    ];

}
