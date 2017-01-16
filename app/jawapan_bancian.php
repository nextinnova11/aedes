<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jawapan_bancian extends Model
{
    protected $table = 'jawapan_bancians';

    protected $fillable = ['kawasan_id', 'jalan_blok', 'tarikh_mula', 'no_rumah', 'q1_1', 'q1_2', 'q2_1', 'q2_2', 'q3_1', 'q3_2', 'q4_1', 'q4_2', 'q5_1', 'q5_2', 'q5_3', 'q6_1', 'q6_2', 'q7_1', 'q7_2', 'q7_3', 'q8_1', 'q8_2', 'q8_3', 'q9_1', 'q9_2', 'q9_3', 'q9_4', 'q9_5', 'q10_1', 'q10_2', 'q10_3', 'q11_1', 'q12_1', 'q12_2', 'q12_3', 'q13_1', 'q13_2', 'q14_1', 'q14_2', 'q14_3', 'q15_1', 'q16_1', 'q16_2', 'q17_1', 'q18_1', 'q19_1', 'q19_2', 'q20_1', 'q20_2', 'created_at','updated_at'];

    public function kawasan()
    {
      return $this->belongsTo('App\kawasan', 'kawasan_id');
    }
}
