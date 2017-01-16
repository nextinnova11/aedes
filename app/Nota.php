<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $table = 'notas';

    protected $fillable = ['mesej', 'sasaran', 'created_at','updated_at'];
}
