<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class In_order extends Model
{
    protected $table = "in_order";

    public $timestamps = null;

    protected $fillable = ["name", "email", "number", "car_model", "product_id"]; 
}
