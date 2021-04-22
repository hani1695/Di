<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $guarded = ['id', '_token', 'password_confirmation'];
    protected $table = "b_users";//'users';
    protected $dateFormat = 'y/m/d';
      /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getDateFormat() {
        return 'Y-d-m H:i:s.v';
    }
}
