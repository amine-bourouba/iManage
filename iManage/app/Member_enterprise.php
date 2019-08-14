<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member_enterprise extends Model
{

    use SoftDeletes;

    public $table ='member_enterprise';

    protected $dates = ['deleted_at'];

}
