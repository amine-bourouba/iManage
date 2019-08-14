<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Finance extends Model
{
    use SoftDeletes;

    public $table ='finances';
    
    protected $fillable = ['type', 'metric', 'currency', 'cost'];

    protected $dates = ['deleted_at'];

}
