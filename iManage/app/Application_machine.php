<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application_machine extends Model
{
    use SoftDeletes;

    public $table ='application_machine';

    protected $dates = ['deleted_at'];

}
