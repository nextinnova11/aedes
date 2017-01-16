<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class perumahan extends Model
{
    protected $table = 'perumahans';

    protected $fillable = ['nama', 'bandar', 'negeri', 'ketualokaliti_id', 'created_at','updated_at'];

    public function ketuaLokaliti()
    {
      return $this->belongsTo('App\ketuaLokaliti', 'ketualokaliti_id');
    }

    public function pejabatKesihatan()
    {
      return $this->belongsTo('App\pejabatKesihatan', 'pejabatKesihatan_id');
    }

    public function kawasan()
    {
      return $this->hasOne('App\kawasan', 'perumahan_id');
    }
}
