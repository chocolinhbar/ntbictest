<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NguoiDangKiSuKien extends Model
{
    protected $table = "nguoi_dang_ki_su_kien";

    public function sukien() {
    	return $this->belongsTo('App\SuKien', 'su_kien_id', 'id');
    }
}
