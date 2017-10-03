<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuKienTranslation extends Model
{
    protected $timestamp = false;

    protected $fillable = [
    	'Ten',
    	'TomTat',
    	'NoiDung',
    	'DiaChi'
    ];
}
