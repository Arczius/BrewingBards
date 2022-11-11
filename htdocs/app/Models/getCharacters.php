<?php

namespace App\Models;

use CodeIgniter\Model;

class getCharacters extends Model{
    protected $table = "UserCharacters";
    protected $primaryKey = "CharacterId";
    protected $returnType = "array";
    protected $allowedFields = ['UserId', 'CharacterName', 'CharacterRace', 'CharacterClass', 'CharacterActivity'];
}
