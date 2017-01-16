<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kawasan extends Model
{
    protected $table = 'kawasans';

    protected $fillable = ['perumahan_id','nama', 'bandar', 'negeri', 'lat', 'lng', 'ketualokaliti_id', 'user_id', 'created_at', 'updated_at'];

    public function user()
    {
      return $this->belongsTo('App\User', 'user_id');
    }

    public function perumahan()
    {
      return $this->belongsTo('App\perumahan', 'perumahan_id');
    }

    public function jadualBancian()
    {
      return $this->hasMany('App\jadual_bancian', 'kawasan_id');
    }

    public function tindakan()
    {
      return $this->hasOne('App\jadual_tindakan', 'kawasan_id');
    }

    public function jawapanBancian()
    {
      return $this->hasMany('App\jawapan_bancian', 'kawasan_id');
    }

    public function risiko()
    {
      return $this->hasOne('App\risiko', 'kawasan_id');
    }
}
