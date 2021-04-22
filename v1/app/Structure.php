<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Structure extends Model
{
    // protected $dateFormat = 'y/m/d';    
    protected $table = "b_structures";
    public function getDateFormat(){
        return 'Y-d-m H:i:s.v';
 
       //return 'Y-m-d H:i:s';mysql
     }
     public function wilaya()
     {
     return $this->belongsTo('App\wilaya');
     }
 public function commune()
 {
  return $this->belongsTo('App\commune');
 }

}
