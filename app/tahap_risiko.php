<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tahap_risiko extends Model
{
    protected $table = 'tahap_risikos';

    protected $fillable = ['keterangan', 'nilai', 'warna', 'created_at','updated_at'];
}
