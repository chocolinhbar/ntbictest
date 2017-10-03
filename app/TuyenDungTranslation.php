<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TuyenDungTranslation extends Model
{
    protected $timestamp = false;

    protected $fillable = ['MoTa', 'NoiDungTuyenDung'];
}
