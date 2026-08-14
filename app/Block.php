<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Phase;

class Block extends Model
{
    public function phase()
    {
    	return $this->belongsTo(Phase::class);
    }
    public function updateBlockCount($block_id)
    {
    	$blocks = $this->find($block_id);
    	$blocks->block_count = $blocks->	block_count+1;
    	$blocks->update();
    	return true;					
    }
}
