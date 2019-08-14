<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Training_machine extends Model
{

    use SoftDeletes;

    public $table ='training_machine';

    protected $dates = ['deleted_at'];

}
