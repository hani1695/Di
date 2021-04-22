<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usage extends Model
{
    protected $dateFormat = 'y/m/d';
    protected $table = "c_usage";
}
