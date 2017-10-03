<?php

use Illuminate\Database\Seeder;

class ChuyenGiaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chuyen_gia_translations')->insert([
        [
        	'chuyen_gia_id' => '1',
        	'Ten' => 'Lại Thị Thảo Vân',
        	'ChucVu' => 'Cán Bộ',
        	'locale' => 'vi'
        ],
         [
            'chuyen_gia_id' => '1',
            'Ten' => 'Thảo Vân Lại Thị',
            'ChucVu' => 'Cán Bộ eb',        
            'locale' => 'en'
        ],
        [
            'chuyen_gia_id' => '2',
            'Ten' => 'Thảo Vân Lại Thị',
            'ChucVu' => 'Cán Bộ eb',          
            'locale' => 'vi'
        ],
        [
            'chuyen_gia_id' => '2',
            'Ten' => 'Thảo Vân Lại Thị',
            'ChucVu' => 'Cán Bộ eb',            
            'locale' => 'en'
        ],
        [
            'chuyen_gia_id' => '3',
            'Ten' => 'Thảo Vân Lại Thị',
            'ChucVu' => 'Cán Bộ eb',         
            'locale' => 'en'
        ],
        [
            'chuyen_gia_id' => '3',
            'Ten' => 'Thảo Vân Lại Thị',
            'ChucVu' => 'Cán Bộ eb',         
            'locale' => 'vi'
        ]
        ]);
    }
}
