<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\UserCharacterType;

class CharacterType extends Model
{
    protected $table ='character_types';

    public function UserCharacterTypes()
    {

        return $this->hasMany(UserCharacterType::class);
    }
}