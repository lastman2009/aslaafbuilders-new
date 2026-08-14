<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\UserCharacterType;

class UserCharacterDetail extends Model
{
     public function UserCharacterType()
    {
    		return $this->belongsTo(UserCharacterType::class);
    }
}
