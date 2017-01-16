<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jadual_bancian extends Model
{
    protected $table = 'jadual_bancians';

    protected $fillable = ['pembanci_id', 'kawasan_id', 'tarikh_mula', 'tarikh_akhir', 'status', 'created_at','updated_at'];

    public function pembanci()
    {
      return $this->belongsTo('App\pembanci', 'pembanci_id');
    }

    public function kawasan()
    {
      return $this->belongsTo('App\kawasan', 'kawasan_id');
    }
}
