<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enterprise extends Model
{
    use SoftDeletes;

    public $table ='enterprises';

    protected $fillable = [
        'name', 'phone', 'fax', 'email_pro', 'website', 'address', 'activity', 'logo', 
        'covered_region', 'category' 
    ];

    protected $dates = ['deleted_at'];

    public function  user()
    {
       return $this->morphMany('App\User', 'profile');
    }

    public function  employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function member()
    {
       return $this->belongsToMany('App\Member');
    }
}
