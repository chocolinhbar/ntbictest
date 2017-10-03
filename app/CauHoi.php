<?php

namespace App;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class CauHoi extends Model
{
	use Translatable;
    protected $table = "cau_hoi";
    protected $fillable = ['slug'];

    public $translatedAttributes = ['CauHoi','CauTraLoi'];
}
