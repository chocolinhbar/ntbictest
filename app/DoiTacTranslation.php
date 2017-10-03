<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoiTacTranslation extends Model
{
    protected $timestamp = false;

    protected $fillable = ['Ten', 'NoiDung'];
}
