<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task_machine extends Model
{

    use SoftDeletes;

    public $table ='task_machine';

    protected $dates = ['deleted_at'];

}
