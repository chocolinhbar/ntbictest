<?php

namespace App;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
	use Translatable;
    protected $table = "tin_tuc";
    protected $fillable = ['slug', 'HinhAnh'];

    public function loaitin(){
    	return $this->belongsTo('App\LoaiTin','loai_tin_id','id');
    }

    public function user(){
    	return $this->belongsTo('App\User','users_id','id');
    }
    protected $translatedAttributes = [
    	'Ten',
    	'TomTat',
    	'NoiDung'
    ];
}
