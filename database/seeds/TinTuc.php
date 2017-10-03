<?php

use Illuminate\Database\Seeder;

class TinTuc extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tin_tuc')->insert([
        [
        	'slug' => 'hoi-thao-gioi-thieu-va-ket-noi-cac-giai-phap-cong-nghe-xanh-cho-doanh-nghiep-vua-va-nho',
        	'loai_tin_id' => '1',
        	'users_id' => '1',
        	'HinhAnh' => 'W3Mn_RM-running-man-34478593-1023-506.png',
        ],
        [
            'slug' => 'hoi-thao-gioi-thieu-va-ket-noi-cac-giai-phap-cong-nghe-xanh-cho-doanh-nghiep-vua-va-nho',
            'loai_tin_id' => '1',
            'users_id' => '1',
            'HinhAnh' => 'W3Mn_RM-running-man-34478593-1023-506.png',
        ],
        [
            'slug' => 'hoi-thao-gioi-thieu-va-ket-noi-cac-giai-phap-cong-nghe-xanh-cho-doanh-nghiep-vua-va-nho',
            'loai_tin_id' => '1',
            'users_id' => '1',
            'HinhAnh' => 'W3Mn_RM-running-man-34478593-1023-506.png',
        ],
        [
            'slug' => 'hoi-thao-gioi-thieu-va-ket-noi-cac-giai-phap-cong-nghe-xanh-cho-doanh-nghiep-vua-va-nho',
            'loai_tin_id' => '1',
            'users_id' => '1',
            'HinhAnh' => 'W3Mn_RM-running-man-34478593-1023-506.png',
        ]
        ]);
    }
}
