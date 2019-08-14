<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application_user extends Model
{
    use SoftDeletes;

    public $table ='application_user';

    protected $dates = ['deleted_at'];

}
