<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{

    use SoftDeletes;

    public $table ='notifications';

    protected $fillable = [
        'message', 'seen'
    ];

    protected $dates = ['deleted_at'];

    protected $attributes = [
        'seen' => false,
    ];

    public function  user()
   {
       return $this->belongsToMany('App\User');
   }
}
