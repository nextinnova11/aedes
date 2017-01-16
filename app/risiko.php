<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class risiko extends Model
{
    protected $table = 'risikos';

    protected $fillable = ['kawasan_id', 'tarikh_mula', 'soalan_dijawab', 'jumlah_soalan', 'keputusan_bancian', 'created_at','updated_at'];

    public function kawasan()
    {
      return $this->belongsTo('App\kawasan', 'kawasan_id');
    }
}
