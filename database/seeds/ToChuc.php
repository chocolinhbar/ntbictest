<?php

use Illuminate\Database\Seeder;

class ToChuc extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('to_chuc')->insert([
        [
        	'slug' => 'ntbic',
        ]
        ]);
    }
}
