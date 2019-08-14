<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Storage extends Model
{
    use SoftDeletes;

    public $table ='storages';

    protected $fillable = [
        'type', 'name', 'category', 'location', 'free_space', 'capacity', 'extension',
        'serial_number', 'model', 'file_system', 'electric_power', 'delivery_date',
        'installation_date', 'state' 
    ];

    protected $dates = ['deleted_at'];

    public function  document()
    {
        return $this->hasMany('App\Document');
    }

    public function  machine()
    {
        return $this->belongsToMany('App\Machine');
    }

    public function  task()
    {
        return $this->belongsToMany('App\Task');
    }

    public function  user()
    {
        return $this->belongsToMany('App\User');
    }

    public function  training()
    {
        return $this->belongsToMany('App\Training');
    }

    public function  application()
    {
        return $this->belongsToMany('App\Application');
    }

    public function  dutytime()
    {
        return $this->hasMany('App\Dutytime');
    }
    
}
