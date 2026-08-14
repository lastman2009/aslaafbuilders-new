<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable=['name','price','duration','adcategory_id','adpage_id','adposition_id'];
}
