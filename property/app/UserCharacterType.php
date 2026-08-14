<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\CharacterType;
class UserCharacterType extends Model
{
    protected $table ='user_character_types';

   Public function users()
    {
        return $this->hasMany(User::class);
    }

   public function characterTypes()
    {
           return $this->hasMany(CharacterType::class);     
    }
}