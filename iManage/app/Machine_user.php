<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Machine_user extends Model
{

    use SoftDeletes;

    public $table ='machine_user';
    
    protected $dates = ['deleted_at'];

}
