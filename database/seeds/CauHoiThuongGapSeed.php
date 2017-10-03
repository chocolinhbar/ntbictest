<?php

use Illuminate\Database\Seeder;

class CauHoiThuongGapSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cau_hoi_translations')->insert([
        [
        	'cau_hoi_id' => '1',
            'CauHoi' => 'ntbic ở đâu',
            'CauTraLoi' => 'NTBIC có văn phòng đại diện tại Hà Nội thực hiện nhiệm vụ ươm tảo ảo và duy trì mối liên hệ với các đơn vị nghiên cứu KH&CN ở Hà Nội và trong cộng đồng KH&CN.',
            'locale' => 'vi'
        ],
         [
            'cau_hoi_id' => '1',
            'CauHoi' => 'ntbic ở đâu',
            'CauTraLoi' => 'NTBIC có văn phòng đại diện tại Hà Nội thực hiện nhiệm vụ ươm tảo ảo và duy trì mối liên hệ với các đơn vị nghiên cứu KH&CN ở Hà Nội và trong cộng đồng KH&CN.',
            'locale' => 'en'
        ],
         [
            'cau_hoi_id' => '2',
            'CauHoi' => 'ntbic ở đâu',
            'CauTraLoi' => 'NTBIC có văn phòng đại diện tại Hà Nội thực hiện nhiệm vụ ươm tảo ảo và duy trì mối liên hệ với các đơn vị nghiên cứu KH&CN ở Hà Nội và trong cộng đồng KH&CN.',
            'locale' => 'vi'
        ],
         [
            'cau_hoi_id' => '2',
            'CauHoi' => 'ntbic ở đâu',
            'CauTraLoi' => 'NTBIC có văn phòng đại diện tại Hà Nội thực hiện nhiệm vụ ươm tảo ảo và duy trì mối liên hệ với các đơn vị nghiên cứu KH&CN ở Hà Nội và trong cộng đồng KH&CN.',
            'locale' => 'en'
        ],
         [
            'cau_hoi_id' => '3',
            'CauHoi' => 'ntbic ở đâu',
            'CauTraLoi' => 'NTBIC có văn phòng đại diện tại Hà Nội thực hiện nhiệm vụ ươm tảo ảo và duy trì mối liên hệ với các đơn vị nghiên cứu KH&CN ở Hà Nội và trong cộng đồng KH&CN.',
            'locale' => 'vi'
        ],
         [
            'cau_hoi_id' => '3',
            'CauHoi' => 'ntbic ở đâu',
            'CauTraLoi' => 'NTBIC có văn phòng đại diện tại Hà Nội thực hiện nhiệm vụ ươm tảo ảo và duy trì mối liên hệ với các đơn vị nghiên cứu KH&CN ở Hà Nội và trong cộng đồng KH&CN.',
            'locale' => 'en'
        ],
         [
            'cau_hoi_id' => '4',
            'CauHoi' => 'ntbic ở đâu',
            'CauTraLoi' => 'NTBIC có văn phòng đại diện tại Hà Nội thực hiện nhiệm vụ ươm tảo ảo và duy trì mối liên hệ với các đơn vị nghiên cứu KH&CN ở Hà Nội và trong cộng đồng KH&CN.',
            'locale' => 'vi'
        ],
         [
            'cau_hoi_id' => '4',
            'CauHoi' => 'ntbic ở đâu',
            'CauTraLoi' => 'NTBIC có văn phòng đại diện tại Hà Nội thực hiện nhiệm vụ ươm tảo ảo và duy trì mối liên hệ với các đơn vị nghiên cứu KH&CN ở Hà Nội và trong cộng đồng KH&CN.',
            'locale' => 'en'
        ]
        ]);
    }
}
