<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaidProperty extends Model
{
     protected $fillable=['user_id','property_id','start_date','end_date','status','discount_offer_id','price','recieved_amount','package_id','support_id','payment_method_id','transaction_id'];
}
