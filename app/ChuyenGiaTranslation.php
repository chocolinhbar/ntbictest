<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChuyenGiaTranslation extends Model
{	
	protected $table = "chuyen_gia_translations";
    protected $timestamp = false;
    protected $fillable = ['Ten', 'ChucVu'];
}
