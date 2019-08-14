<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Training_application extends Model
{

    use SoftDeletes;

    public $table ='training_application';

    protected $dates = ['deleted_at'];

}
