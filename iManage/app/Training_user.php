<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Training_user extends Model
{

    use SoftDeletes;

    public $table ='training_user';

    protected $dates = ['deleted_at'];

}
