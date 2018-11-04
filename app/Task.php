<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'description', 'date','end'];

    protected $appends = ['url'];


    public function getUrlAttribute(){
    	return  '/tasks/'.$this->id.'/edit';
    }
}
