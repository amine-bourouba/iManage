<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Machine extends Model
{

   use SoftDeletes;

   public $table ='machines';

   protected $fillable = [
       'serial_number', 'model', 'electric_power', 'manufacturer', 'machine_name', 'installation_date',
       'software_version', 'hardware_version', 'ip_address', 'mac_address', 'delivery_date',
       'category', 'location', 'state', 'notification', 'type'
   ];

   protected $dates = ['deleted_at'];
   
   public function  document()
   {
       return $this->hasMany('App\Document');
   }

   public function  training()
   {
       return $this->belongsToMany('App\Training');
   }

   public function  task()
   {
       return $this->belongsToMany('App\Task');
   }

   public function  application()
   {
       return $this->belongsToMany('App\Application');
   }

   public function  storage()
   {
       return $this->belongsToMany('App\Storage');
   }

   public function  user()
   {
       return $this->belongsToMany('App\User');
   }

   public function  dutytime()
   {
       return $this->hasMany('App\Dutytime');
   }

}
