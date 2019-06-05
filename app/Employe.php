<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    public $timestamps = null;

    protected $fillable = [
    	"name", "email", "number", "status"
    ];

    protected $table = 'employees';


    public static function scopeAllActive($query){
        return $query->where('status', '0')->get();
    }
}
