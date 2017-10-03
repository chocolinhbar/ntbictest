<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TinTucTranslation extends Model
{
    protected $timestamp = false;

    protected $fillable = [
    	'Ten',
    	'TomTat',
    	'NoiDung'
    ];
}
