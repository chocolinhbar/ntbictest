<?php

use Illuminate\Database\Seeder;

class CauHoi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cau_hoi')->insert([
        [
            'slug' => 'ntbic-o-dau'
        ],
         [
            'slug' => 'ntbic-o-dau'
        ],
         [
            'slug' => 'ntbic-o-dau'
        ],
         [
            'slug' => 'ntbic-o-dau'
        ]
        ]);
    }
}
