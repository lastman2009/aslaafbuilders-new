<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaticAd extends Model
{
    protected $fillable=['title','link','user_id','package_id','discount_offer_id','price','recieved_amount','support_id','payment_method','transaction_id','image','start_date','end_date','status'];
}
