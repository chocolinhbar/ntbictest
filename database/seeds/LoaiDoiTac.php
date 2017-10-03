<?php

use Illuminate\Database\Seeder;

class LoaiDoiTac extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('loai_doi_tac')->insert([
        [
        	'slug' => 'to-chuc',
        ],
        [
        	'slug' => 'doanh-nghiep',
        ],
        [
        	'slug' => 'ca-nhan',
        ]
        ]);
    }
}
