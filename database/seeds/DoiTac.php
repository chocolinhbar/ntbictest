<?php

use Illuminate\Database\Seeder;

class DoiTac extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('doi_tac')->insert([
        [
        	'slug' => 'dai-hoc-cong-nghe',
        	'HinhAnh' => 'W3Mn_RM-running-man-34478593-1023-506.png',
        	'loai_doi_tac_id' => '1',
        ],
        [
            'slug' => 'dai-hoc-cong-nghe',
            'HinhAnh' => 'W3Mn_RM-running-man-34478593-1023-506.png',
            'loai_doi_tac_id' => '1',
        ],
        [
            'slug' => 'dai-hoc-cong-nghe',
            'HinhAnh' => 'W3Mn_RM-running-man-34478593-1023-506.png',
            'loai_doi_tac_id' => '1',
        ],
        [
            'slug' => 'dai-hoc-cong-nghe',
            'HinhAnh' => 'W3Mn_RM-running-man-34478593-1023-506.png',
            'loai_doi_tac_id' => '1',
        ]
        
        ]);
    }
}
