<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use SoftDeletes;

    public $table ='applications';

    protected $fillable = [
        'name', 'pubisher', 'size', 'version', 'installation_date'
    ];

    protected $dates = ['deleted_at'];

    public function  user()
    {
        return $this->belongsToMany('App\User');
    }

    public function  task()
    {
        return $this->belongsToMany('App\Task');
    }

    public function  machine()
    {
        return $this->belongsToMany('App\Machine');
    }
    
    public function  document()
    {
        return $this->hasMany('App\Document');
    }

    public function  training()
    {
        return $this->belongsToMany('App\Training');
    }

    public function  storage()
    {
        return $this->belongsToMany('App\Storage');
    }

    public function  dutytime()
    {
        return $this->hasMany('App\Dutytime');
    }

}
