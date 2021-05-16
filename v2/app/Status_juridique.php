<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status_juridique extends Model
{
    protected $dateFormat = 'y/m/d';
    protected $table = "c_status_juridique";
}
