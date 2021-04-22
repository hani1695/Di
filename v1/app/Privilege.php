<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
    protected $dateFormat = 'y/m/d';    
    protected $table = "p_privileges";
}
