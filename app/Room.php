<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
   protected  $table = "rooms";

   public function owner(){

   	 return $this->hasOne("App\User",'id','ownerid');
   }
   public function building(){

   	 return $this->hasOne("App\Building",'id','buildingid');
   }
}
