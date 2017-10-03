<?php

use Illuminate\Database\Seeder;

class LoaiDoiTacSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('loai_doi_tac_translations')->insert([
        [
        	'loai_doi_tac_id' => '1',
        	'Ten' => 'Tổ chức',
        	'locale' => 'vi',
        ],
        [
            'loai_doi_tac_id' => '1',
            'Ten' => 'eng to chuc',
            'locale' => 'en',
        ],
        [
            'loai_doi_tac_id' => '2',
            'Ten' => 'Doanh nghiệp',
            'locale' => 'vi',
        ],
        [
            'loai_doi_tac_id' => '2',
            'Ten' => 'Doanh nghiệp en',
            'locale' => 'en',
        ],
        [
            'loai_doi_tac_id' => '3',
            'Ten' => 'Cá nhân',
            'locale' => 'vi',
        ],
        [
            'loai_doi_tac_id' => '3',
            'Ten' => 'Cá nhân en',
            'locale' => 'en',
        ]
        ]);
    }
}
