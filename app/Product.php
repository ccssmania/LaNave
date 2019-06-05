<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'status', 'title',
    ];

    public $timestamps = false;

    public static function scopeAllActive($query){ //get all products that are active
        return $query->where('status', '0')->get();
    }

    public function prices(){
    	return $this->hasMany('App\ProductCategoryPrice');
    }

    public function categories(){
    	return $this->belongsToMany('App\ProductCategory', 'product_category_prices');
    }
}
