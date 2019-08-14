<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use SoftDeletes;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password'
    ];
    
    protected $dates = ['deleted_at'];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function  profile()
    {
       return $this->morphTo();
    }

    public function  machine()
   {
       return $this->belongsToMany('App\Machine');
   }

   public function  document()
   {
       return $this->hasMany('App\Document');
   }

   public function  dutytime()
   {
       return $this->hasMany('App\Dutytime');
   }

   public function  application()
   {
       return $this->belongsToMany('App\Applcation');
   }

   public function  training()
   {
       return $this->belongsToMany('App\Training');
   }

   public function  task()
   {
       return $this->belongsToMany('App\Task');
   }

   public function  storage()
   {
       return $this->belongsToMany('App\Stoage');
   }

   public function  complaint()
   {
       return $this->hasMany('App\Complaint');
   }

   public function  notification()
   {
       return $this->hasMany('App\Notification');
   }
}
