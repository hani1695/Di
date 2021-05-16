<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RapportEval extends Model
{
    protected $guarded = ['id'];
    protected $table = 't_rapport_evaluation';
    public function getDateFormat() {
        return 'Y-d-m H:i:s.v';
    }
}
