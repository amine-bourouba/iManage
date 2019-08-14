<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{

    use SoftDeletes;

    public $table ='tasks';

    protected $fillable = [
        'subject', 'description', 'displacement', 'work_calender', 'type', 'task_status',
        'group_name'
     ];

    protected $dates = ['deleted_at'];
 
    public function  machine()
    {
        return $this->belongsToMany('App\Machine');
    }
    
    public function  user()
    {
        return $this->belongsToMany('App\User');
    }

    public function  dutytime()
    {
        return $this->hasMany('App\Dutytime');
    }

    public function  application()
    {
        return $this->belongsToMany('App\Application');
    }
    
    public function  storage()
    {
        return $this->belongsToMany('App\Storage');
    }
}
