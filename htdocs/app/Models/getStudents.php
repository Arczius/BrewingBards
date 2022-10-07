<?php
namespace App\Models;

use CodeIgniter\Model;

class getStudents extends Model{
    protected $table = "Users";
    protected $primaryKey = "ID";
    protected $returnType = "array";
    protected $allowedFields = ['Name', 'Mail', 'SchoolUserName'];
}