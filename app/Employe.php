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
}
