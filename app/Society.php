<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Society extends Model
{
    protected $fillable = ['province', 'city', 'name', 'slug', 'status'];

    public function taxRules()
    {
        return $this->hasMany(TaxRule::class);
    }

    public function blocks()
    {
        return $this->hasMany(SocietyBlock::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
