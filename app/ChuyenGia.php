<?php

namespace App;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class ChuyenGia extends Model
{
	use Translatable;
    protected $table="chuyen_gia";

    protected $fillable = ['slug', 'HinhAnh'];

    public $translatedAttributes = ['Ten', 'ChucVu'];
}
