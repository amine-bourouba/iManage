<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Training_storage extends Model
{

    use SoftDeletes;

    public $table ='training_storage';

    protected $dates = ['deleted_at'];

}
