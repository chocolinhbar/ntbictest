<?php

use Illuminate\Database\Seeder;

class LoaiTin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('loai_tin')->insert([
        [
        	'slug' => 'cong-nghe',
        ],
        [
        	'slug' => 'khoi-nghiep',
        ],
        [
        	'slug' => 'doanh-nghiep',
        ]
        ]);
    }
}
