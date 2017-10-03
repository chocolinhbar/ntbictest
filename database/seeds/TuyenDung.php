<?php

use Illuminate\Database\Seeder;

class TuyenDung extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tuyen_dung')->insert([
        [
        	'slug' => 'tuyen-dung-truong-phong-nhan-su',
        	'NgayBatDau' => '2017-06-25 00:00:00',
        	'NgayKetThuc' => '2017-06-25 00:00:00',
        ]
        ]);
    }
}
