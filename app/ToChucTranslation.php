<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToChucTranslation extends Model
{
    protected $timestamp = false;

    public $fillable = [
    	'GioiThieuChung',
    	'ViTriChucNang',
    	'SuMenhTamNhin',
    	'CoCau',
    	'DoiNguTrungTam'
    ];
}
