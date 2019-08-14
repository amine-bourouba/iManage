<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Storage_application extends Model
{

    use SoftDeletes;

    public $table ='storage_application';

    protected $dates = ['deleted_at'];

}
