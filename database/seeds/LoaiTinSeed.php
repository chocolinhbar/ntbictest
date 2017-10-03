<?php

use Illuminate\Database\Seeder;

class LoaiTinSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('loai_tin_translations')->insert([
        [
        	'loai_tin_id' => '1',
        	'Ten' => 'Công nghệ',
        	'locale' => 'vi',
        ],
        [
        	'loai_tin_id' => '1',
        	'Ten' => 'Technology',
        	'locale' => 'en',
        ],
        [
        	'loai_tin_id' => '2',
        	'Ten' => 'Khởi nghiệp',
        	'locale' => 'vi',
        ],
        [
        	'loai_tin_id' => '2',
        	'Ten' => 'Start up',
        	'locale' => 'en',
        ],
        [
            'loai_tin_id' => '3',
            'Ten' => 'Doanh nghiệp',
            'locale' => 'vi',
        ],
        [
            'loai_tin_id' => '3',
            'Ten' => 'Company',
            'locale' => 'en',
        ]
        ]);
    }
}
