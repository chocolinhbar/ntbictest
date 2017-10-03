<?php

namespace App;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class DoiTac extends Model
{
	use Translatable;
    protected $table = "doi_tac";

    protected $fillable = ['slug', 'HinhAnh'];

    public $translatedAttributes = ['Ten', 'NoiDung'];

    public function loaidoitac() {
    	return $this->belongsTo('App\LoaiDoiTac', 'loai_doi_tac_id', 'id');
    }
}
