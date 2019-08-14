<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member_employee extends Model
{
    
    use SoftDeletes;

    public $table ='member_employee';

    protected $dates = ['deleted_at'];

}
