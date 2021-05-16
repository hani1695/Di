<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    protected $guarded = ['id','wilayas'];    
    protected $table = "t_evenement";
    
    public function getDateFormat() {
        return 'Y-d-m H:i:s.v';
    }
}
