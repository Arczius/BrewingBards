<?php
namespace App\Models;

use CodeIgniter\Model;

class getUserLogin extends Model{
    protected $table = "Users";
    protected $primaryKey = "ID";
    protected $returnType = "array";
    protected $allowedFields = ['Name', 'Password', 'Mail', 'SchoolUserName', 'PermissionLevel'];
}
