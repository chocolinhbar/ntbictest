<?php

namespace App;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class ToChuc extends Model
{
	use Translatable;
    protected $table = "to_chuc";

    protected $fillable = ['slug'];

    public $translatedAttributes = [
    	'GioiThieuChung',
    	'ViTriChucNang',
    	'SuMenhTamNhin',
    	'CoCau',
    	'DoiNguTrungTam'
    ];
}
