<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
     public function updateStats($column_name){
        $statics=Statistic::first();
        $statics->$column_name += 1;
        $statics->update();
     }

     public function decrementStats($column_name)
     {
     	 $statics=Statistic::first();
        $statics->$column_name -= 1;
        $statics->update();
     }
}
