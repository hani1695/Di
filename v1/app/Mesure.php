<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesure extends Model
{
    protected $dateFormat = 'y/m/d';
    protected $table = "c_mesure_immediate";
}
