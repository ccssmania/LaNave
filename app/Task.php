<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title','status', 'description', 'date','end'];

    protected $appends = ['url'];


    public function getUrlAttribute(){
    	return  '/tasks/'.$this->id.'/edit';
    }

    public function order(){
    	return $this->belongsTo('App\Order');
    }

    public function product(){
    	return $this->belongsTo('App\Product');
    }
}

