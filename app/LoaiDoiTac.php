<?php

namespace App;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class LoaiDoiTac extends Model
{
    use Translatable;
    protected $table = 'loai_doi_tac';

    protected $fillable = ['slug'];

    public $translatedAttributes = ['Ten'];

    public function doitac() {
    	return $this->hasMany('App\DoiTac', 'loai_doi_tac_id', 'id');
    }
}
