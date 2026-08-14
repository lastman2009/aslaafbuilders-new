<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPortfolio extends Model
{
    protected $fillable = [
        'user_id',
        'character_type_id',
        'title',
        'description',
        'images',
        'priority',
        'start_date',
        'end_date',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
