<?php

use Illuminate\Database\Seeder;

class ChuyenGia extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chuyen_gia')->insert([
        [
        	'slug' => 'lai-thi-thao-van',
              'HinhAnh'=>'W3Mn_RM-running-man-34478593-1023-506.png'
        ],
        [
            'slug' => 'lai-thi-thao-van',
              'HinhAnh'=>'W3Mn_RM-running-man-34478593-1023-506.png'
        ],
        [
            'slug' => 'lai-thi-thao-van',
              'HinhAnh'=>'W3Mn_RM-running-man-34478593-1023-506.png'
        ]
        ]);
    }
}
