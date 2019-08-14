<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dutytime extends Model
{
    use SoftDeletes;

    public $table ='dutytimes';

    protected $fillable = ['duty_day', 'duty_time', 'off_days', 'events', 'overtime'];

    protected $dates = ['deleted_at'];

    public function  application()
    {
        return $this->belongsToMany('App\Application');
    }

    public function  storage()
    {
        return $this->belongsToMany('App\Storage');
    }

    public function  task()
    {
        return $this->belongsToMany('App\Task');
    }

    public function  training()
    {
        return $this->belongsToMany('App\Training');
    }

    public function  machine()
    {
        return $this->belongsToMany('App\Machine');
    }

    public function  user()
    {
        return $this->belongsToMany('App\User');
    }
}
