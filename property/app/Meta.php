<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    
    public function getData()
    {
    	return $this->all();
    }

    public function storeData($req)
    {
    	$this->title = $req->title;
    	$this->save();
    	return true;
    }

    public function updateMeta($req)
    {
    	$this->title = $req->title;
    	$this->meta_description =$req->meta_description;
    	$this->meta_keyword =$req->meta_keyword;
    	$this->meta_title =$req->meta_title;
    	$this->update();
    	return true;
    }
}
