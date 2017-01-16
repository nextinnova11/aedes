<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembanci extends Model
{
    protected $table = 'pembancis';

    protected $fillable = ['user_id', 'no_tel','alamat_1', 'alamat_2', 'alamat_3','poskod', 'bandar', 'negeri','created_at','updated_at'];

    public function kawasan()
    {
      return $this->belongsTo('App\kawasan', 'kawasan_id');
    }

    public function user()
    {
      return $this->belongsTo('App\User', 'user_id');
    }
}
