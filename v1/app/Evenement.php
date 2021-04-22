<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    protected $guarded = ['id','wilayas'];
    protected $dateFormat = 'y/m/d';
    protected $table = "t_evenement";
}
