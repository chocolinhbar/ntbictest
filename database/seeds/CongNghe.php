<?php

use Illuminate\Database\Seeder;

class CongNghe extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cong_nghe')->insert([
        [
        	'slug' => 'san-xuat-thu-nghiem-mot-so-duoc-lieu-theo-huong-dan-gacp-tai-huyen-lac-thuy-tinh-hoa-binh',
        ],
         [
            'slug' => 'san-xuat-thu-nghiem-mot-so-duoc-lieu-theo-huong-dan-gacp-tai-huyen-lac-thuy-tinh-hoa-binh',
        ],
         [
            'slug' => 'san-xuat-thu-nghiem-mot-so-duoc-lieu-theo-huong-dan-gacp-tai-huyen-lac-thuy-tinh-hoa-binh',
        ],
       
        ]);
    }
}
