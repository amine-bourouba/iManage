<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document_training extends Model
{
    use SoftDeletes;

    public $table ='document_training';

    protected $dates = ['deleted_at'];

}
