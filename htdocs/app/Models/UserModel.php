<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class UserModel extends Model{
    protected $table = 'users';
    
    protected $allowedFields = [
        'id',
        'name',
        'email',
        'password',
        'schoolUserName',
        'permissionLevel'
    ];
}
?>