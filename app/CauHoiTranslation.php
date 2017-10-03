<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CauHoiTranslation extends Model
{
	protected $table = "cau_hoi_translations";
	protected $timestamp = false;
    protected $fillable = ['CauHoi', 'CauTraLoi'];
}
