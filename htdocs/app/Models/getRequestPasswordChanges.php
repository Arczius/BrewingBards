<?php
namespace App\Models;

use CodeIgniter\Model;

class getRequestPasswordChanges extends Model{
    protected $table = 'RequestPasswordChanges';
    
    protected $allowedFields = [
        'ID',
        'Mail',
        'progression'
    ];
}
