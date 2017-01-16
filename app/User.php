<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'password', 'KP', 'kumpulan', 'jawatan', 'status', 'created_at','updated_at',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function admin()
     {
        return $this->hasOne('App\admin', 'user_id');
     }

     public function pejabatKesihatan()
     {
        return $this->hasOne('App\pejabatKesihatan', 'user_id');
     }

     public function pembanci()
     {
        return $this->hasOne('App\pembanci', 'user_id');
     }

     public function ketuaLokaliti()
     {
        return $this->hasOne('App\ketuaLokaliti', 'user_id');
     }

     public function pegawaiVektor()
     {
        return $this->hasOne('App\pegawaiVektor', 'user_id');
     }

     public function kawasan()
     {
        return $this->hasOne('App\kawasan', 'user_id');
     }

     public function jadualBancian()
     {
       return $this->hasOne('App\jadual_bancian', 'user_id');
     }
}
