<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategoryPrice extends Model
{
    protected $fillable = [
        'product_id', 'product_category_id', 'price',
    ];

    public $timestamps = false;

    public function product(){
    	return $this->belongsTo('App\Product');
    }

    public function product_category(){
    	return $this->belongsTo('App\ProductCategory');
    }
}
