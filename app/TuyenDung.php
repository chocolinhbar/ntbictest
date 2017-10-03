<?php

namespace App;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class TuyenDung extends Model
{
	use Translatable;
    protected $table = "tuyen_dung";

    protected $fillable = ['slug', 'NgayBatDau', 'NgayKetThuc'];

    public $translatedAttributes = ['MoTa', 'NoiDungTuyenDung'];
}
