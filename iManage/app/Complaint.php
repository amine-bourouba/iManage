<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Complaint extends Model
{   
    use SoftDeletes;

    public $table = 'complaints';

    protected $fillable = ['object', 'description'];

    protected $dates = ['deleted_at'];

    public function  user()
   {
       return $this->belongsTo('App\User');
   }

    //
}
