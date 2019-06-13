<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class In_order extends Model
{
    protected $table = "in_order";

    public $timestamps = null;

    protected $fillable = ["name", "email", "number", "car_model", "product_id","product_category_id"]; 

    public function product(){
    	return $this->belongsTo("App\Product");
    }

    public function task(){
    	return $this->hasOne("App\Task");
    }

    public function category(){
    	return $this->belongsTo('App\ProductCategory','product_category_id');
    }
}
