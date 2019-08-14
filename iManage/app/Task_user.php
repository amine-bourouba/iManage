<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task_user extends Model
{
    use SoftDeletes;

    public $table ='task_user';
    
    protected $dates = ['deleted_at'];

}
