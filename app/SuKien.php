<?php

namespace App;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class SuKien extends Model
{
	use Translatable;
    protected $table = "su_kien";
    protected $fillable = [
    	'slug',
    	'HinhAnh',
    	'NgayBatDau',
    	'NgayKetThuc',
        'status'
    ];

    public function dangkisukien() {
    	return $this-hasMany('App\NguoiDangKiSuKien', 'su_kien_id', 'id');
    }

    public function user(){
    	return $this->belongsTo('App\User','users_id','id');
    }

    public $translatedAttributes = ['Ten', 'NoiDung', 'TomTat','DiaChi'];
}
