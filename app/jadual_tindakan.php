<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jadual_tindakan extends Model
{
    protected $table = 'jadual_tindakans';

    protected $fillable = ['kawasan_id', 'pegawaiVektor_id', 'mesej', 'tarikh_mula', 'status', 'created_at', 'updated_at'];

    public function pegawaiVektor()
    {
      return $this->belongsTo('App\pegawaiVektor', 'pegawaiVektor_id');
    }

    public function kawasan()
    {
      return $this->belongsTo('App\kawasan', 'kawasan_id');
    }

}
