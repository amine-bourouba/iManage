<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Storage_machine extends Model
{

    use SoftDeletes;

    public $table ='storage_machine';
    
    protected $dates = ['deleted_at'];

}
