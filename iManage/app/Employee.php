<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    public $table ='employees';
    
    protected $fillable = [
        'full_name', 'admin', 'date_of_birth', 'place_of_birth', 'address', 'phone', 
        'email_pro', 'job_title', 'office', 'department', 'gender', 
        'marital_status', 'hire_date', 'photo'
    ];

    protected $dates = ['deleted_at'];
    
    public function  user()
    {
       return $this->morphMany('App\User', 'profile');
    }

    public function  enterprise()
    {
        return $this->belongsTo('App\Enterprise');
    }
    public function member()
    {
       return $this->belongsToMany('App\Member');
    }
}
