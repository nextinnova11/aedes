<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bancian extends Model
{
    protected $table = 'bancians';

    protected $fillable = ['tempat_diperiksa', 'soalan_1', 'soalan_2','soalan_3', 'soalan_4', 'soalan_5','status','created_at','updated_at'];
}
