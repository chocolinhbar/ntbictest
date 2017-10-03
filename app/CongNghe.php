<?php

namespace App;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class CongNghe extends Model
{
	use Translatable;
    protected $table = "cong_nghe";

    protected $fillable = ['slug'];

    public $translatedAttributes = ['Ten', 'NoiDung'];
}
