<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Task_application extends Model
{

    use SoftDeletes;

    public $table ='task_application';
    
    protected $dates = ['deleted_at'];

}
