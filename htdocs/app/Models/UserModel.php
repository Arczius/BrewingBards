<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class UserModel extends \CodeIgniter\Model{

    protected $table = 'Users';
    
    protected $allowedFields = [
        'ID',
        'Name',
        'Mail',
        'Password',
        'SchoolUserName',
        'PermissionLevel'
    ];
}
?>