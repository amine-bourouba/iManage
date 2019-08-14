<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topology extends Model
{

    use SoftDeletes;

    public $table ='topologies';

    protected $fillable = [
        'type', 'title', 'description'
    ];

    protected $dates = ['deleted_at'];

}
