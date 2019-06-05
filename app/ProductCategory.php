<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = [
        'name', 'description', 'status',
    ];

    public $timestamps = false;

    public static function scopeAllActive($query){ //get all products that are active
        return $query->where('status', '0')->get();
    }
}
