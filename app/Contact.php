<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $timestamps = null;

    protected $fillable = [
    	"email", "number", "address", "details",
    ];

    protected $table = 'contact';
}
