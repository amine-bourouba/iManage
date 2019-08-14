<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Training extends Model
{

    use SoftDeletes;

    public $table ='trainings';

    protected $fillable = [
        'type', 'subject', 'description', 'location', 'calender'
    ];
    
    protected $dates = ['deleted_at'];

    public function  machine()
    {
        return $this->belongsToMany('App\Machine');
    }

    public function  document()
   {
       return $this->belongsToMany('App\Document');
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
