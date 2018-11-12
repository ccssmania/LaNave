<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['status', 'in_order_id'];


    public function in_order(){
    	return $this->belongsTo('App\In_order');
    }

    public function task(){
    	return $this->hasOne('App\Task');
    }

    
}
