<?php

namespace App;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class LoaiTin extends Model
{
	use Translatable;
    protected $table = "loai_tin";

    protected $fillable = ['slug'];

    public $translatedAttributes = ['Ten'];

    public function tintuc(){
    	return $this->hasMany('App\TinTuc','loai_tin_id','id');
    }
}
