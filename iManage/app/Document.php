<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use SoftDeletes;

    public $table ='documents';

    protected $fillable = [
        'type', 'name', 'extension', 'content', 'user_manual', 'workshop_manual'
    ];

    protected $dates = ['deleted_at'];

    public function  machine()
    {
        return $this->belongsTo('App\Machine');
    }

    public function  application()
    {
        return $this->belongsTo('App\Application');
    }

    public function  training()
    {
        return $this->belongsToMany('App\Training');
    }

    public function  user()
    {
        return $this->belongsTo('App\User');
    }

    public function  storage()
    {
        return $this->belongsTo('App\Storage');
    }

}
