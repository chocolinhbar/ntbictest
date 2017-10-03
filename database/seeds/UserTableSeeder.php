<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            ['name' => 'admin',
            'username' => 'admin',
            'hinh_anh' => '',
            'email' => 'mcboy.v@gmail.com',
            'email_token' => str_random(10),
            'password' => bcrypt('123456'),
            'level' => 1,
            'verified' => 1,
        ]
        ); 
        DB::table('menu')->insert([
        [
            'slug' => 'to-chuc',
        ],
        [
            'slug' => 'tin-tuc',
        ],
        [
            'slug' => 'su-kien',
        ],
        [
            'slug' => 'doi-tac',
        ],
        [
            'slug' => 'du-lieu',
        ],
        [
            'slug' => 'uom-tao',
        ],
        [
            'slug' => 'cong-nghe',
        ],
        [
            'slug' => 'lien-he',
        ]
        ]);
    }
}
