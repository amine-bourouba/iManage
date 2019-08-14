<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task_storage extends Model
{

    use SoftDeletes;

    public $table ='task_storage';
    
    protected $dates = ['deleted_at'];

}
