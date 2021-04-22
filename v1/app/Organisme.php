<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organisme extends Model
{    
    protected $dateFormat = 'y/m/d';    
    protected $table = "b_organismes";
    public function wilaya()
        {
        return $this->belongsTo('App\wilaya');
        }
    public function commune()
    {
     return $this->belongsTo('App\commune');
    }
}