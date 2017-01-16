<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ketuaLokaliti extends Model
{
    protected $table = 'ketua_lokalitis';

    protected $fillable = ['user_id', 'perumahan_id', 'no_tel','alamat_1', 'alamat_2', 'alamat_3','poskod', 'bandar', 'negeri','created_at','updated_at'];

    public function perumahan()
    {
      return $this->hasOne('App\perumahan', 'ketualokaliti_id');
    }

    public function kawasan()
    {
      return $this->hasOne('App\kawasan', 'kawasan_id');
    }

    public function user()
    {
      return $this->belongsTo('App\User', 'user_id');
    }
}
