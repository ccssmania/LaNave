<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name', 'description', 'task_date'];

    protected $appends = ['url'];


    public function getUrlAttribute(){
    	return  '/tasks/'.$this->id.'/edit';
    }
}
