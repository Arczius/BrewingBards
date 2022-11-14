<?php
namespace App\Models;

use CodeIgniter\Model;

class getDnDRaces extends Model{
    protected $table = "DnDRaces";
    protected $primaryKey = "DnDRaceId";
    protected $returnType = "array";
    protected $allowedFields = ['RaceName'];
}
