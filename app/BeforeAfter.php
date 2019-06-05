<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeforeAfter extends Model
{
    protected $fillable = ['description','name'];

    public $timestamps = null;
}
