<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    protected $table = 'admins';

    protected $fillable = ['user_id', 'no_tel','alamat_1', 'alamat_2', 'alamat_3','poskod', 'bandar', 'negeri', 'no_pekerja','created_at','updated_at'];

    public function user()
    {
      return $this->belongsTo('App\User', 'user_id');
    }
}
