<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocietyBlock extends Model
{
    protected $fillable = ['society_id', 'name', 'status'];

    public function society()
    {
        return $this->belongsTo(Society::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
