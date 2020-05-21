<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experiment extends Model
{
    protected $fillable = [
        'data',
        'partijoszy',
        'sudetis',
        'degimotemp',
        'islaikymot'];
}
