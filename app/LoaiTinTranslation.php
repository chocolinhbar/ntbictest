<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiTinTranslation extends Model
{
    public $timestamp = false;

    protected $fillable = [
        'Ten'
    ];
}
