<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Storage_user extends Model
{

    use SoftDeletes;

    public $table ='storage_user';

    protected $dates = ['deleted_at'];

}
