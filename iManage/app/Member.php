<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{

   use SoftDeletes;


   protected $fillable = [
      'fullname', 'date_of_birth', 'place_of_birth', 'address', 
      'phone', 'email_pro', 'job_title', 'gender', 'photo'     
   ];

   protected $dates = ['deleted_at'];

   public $table ='members';
    
   public function  user()
   {
      return $this->morphMany('App\User', 'profile');
   }

   public function  enterprise()
   {
      return $this->belongsToMany('App\Enterprise');
   }
   
   public function employee()
   {
      return $this->belongsToMany('App\Employee');
   }
}
