<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    protected $dateFormat = 'y/m/d';
    protected $table = "b_commune";
}
