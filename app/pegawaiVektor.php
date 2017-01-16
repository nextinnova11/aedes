<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pegawaiVektor extends Model
{
    protected $table = 'pegawai_vektors';

    protected $fillable = ['user_id', 'no_tel','alamat_1', 'alamat_2', 'alamat_3','poskod', 'bandar', 'negeri', 'no_pekerja', 'created_at','updated_at'];

    public function jadualTindakan()
    {
      return $this->hasOne('App\jadual_tindakan', 'pegawaiVektor_id');
    }

    public function user()
    {
      return $this->belongsTo('App\User', 'user_id');
    }
}
