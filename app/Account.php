<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable=['user_id','property_id','previous_balance','recieved_amount','payable_amount','status','total_balance'];
}
