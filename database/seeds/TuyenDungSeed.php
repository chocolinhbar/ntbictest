<?php

use Illuminate\Database\Seeder;

class TuyenDungSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('tuyen_dung_translations')->insert([
        [
        	'tuyen_dung_id' => '1',
        	'MoTa' => 'tuyển dụng trưởng phòng nhân sự',
        	'NoiDungTuyenDung' => '<p><strong><em>Sứ mạng:</em></strong></p>

            <ul>
                <li>Trở th&agrave;nh c&aacute;c nh&agrave; ph&aacute;t triển doanh nghiệp KHCN th&agrave;nh c&ocirc;ng nhất tại H&agrave; Nội.</li>
                <li>N&acirc;ng cao sức cạnh tranh của nền kinh tế của Việt Nam bằng c&aacute;ch tạo ra một Trung t&acirc;m Đổi mới sẽ hoạt động như một cầu nối để đưa những &yacute; tưởng khoa học v&agrave; c&ocirc;ng nghệ v&agrave;o thị trường.</li>
                <li>Hỗ trợ cho Bộ Khoa học v&agrave; C&ocirc;ng nghệ để quyết định c&aacute;c ch&iacute;nh s&aacute;ch v&agrave; thủ tục mới nhằm ph&aacute;t triển khung ph&aacute;p l&yacute; cho c&aacute;c doanh nghiệp KHCN v&agrave; Trung t&acirc;m Ươm tạo.</li>
            </ul>

            <p><strong><em>Tầm nh&igrave;n, mục ti&ecirc;u chủ đạo:</em></strong></p>

            <ul>
                <li>L&agrave; đường dẫn đưa c&aacute;c &yacute; tưởng khoa học c&ocirc;ng nghệ trong v&agrave; ngo&agrave;i nước ra thị trường</li>
                <li>Tạo điều kiện thương mại h&oacute;a kết quả khoa học v&agrave; c&ocirc;ng nghệ v&agrave;o thị trường th&ocirc;ng qua ươm tạo</li>
                <li>Cung cấp c&aacute;c dịch vụ hỗ trợ quản l&yacute; ph&aacute;t triển cho c&aacute;c doanh nghiệp KHCN tiềm năng</li>
                <li>Hỗ trợ t&iacute;ch hợp li&ecirc;n kết c&aacute;c c&ocirc;ng nghệ v&agrave; &yacute; tưởng tới doanh nghiệp</li>
            </ul>',
        	'locale' => 'vi',
        ],
         [
            'tuyen_dung_id' => '1',
            'MoTa' => 'tuyển dụng trưởng phòng nhân sự',
            'NoiDungTuyenDung' => '<p><strong><em>Sứ mạng:</em></strong></p>

            <ul>
                <li>Trở th&agrave;nh c&aacute;c nh&agrave; ph&aacute;t triển doanh nghiệp KHCN th&agrave;nh c&ocirc;ng nhất tại H&agrave; Nội.</li>
                <li>N&acirc;ng cao sức cạnh tranh của nền kinh tế của Việt Nam bằng c&aacute;ch tạo ra một Trung t&acirc;m Đổi mới sẽ hoạt động như một cầu nối để đưa những &yacute; tưởng khoa học v&agrave; c&ocirc;ng nghệ v&agrave;o thị trường.</li>
                <li>Hỗ trợ cho Bộ Khoa học v&agrave; C&ocirc;ng nghệ để quyết định c&aacute;c ch&iacute;nh s&aacute;ch v&agrave; thủ tục mới nhằm ph&aacute;t triển khung ph&aacute;p l&yacute; cho c&aacute;c doanh nghiệp KHCN v&agrave; Trung t&acirc;m Ươm tạo.</li>
            </ul>

            <p><strong><em>Tầm nh&igrave;n, mục ti&ecirc;u chủ đạo:</em></strong></p>

            <ul>
                <li>L&agrave; đường dẫn đưa c&aacute;c &yacute; tưởng khoa học c&ocirc;ng nghệ trong v&agrave; ngo&agrave;i nước ra thị trường</li>
                <li>Tạo điều kiện thương mại h&oacute;a kết quả khoa học v&agrave; c&ocirc;ng nghệ v&agrave;o thị trường th&ocirc;ng qua ươm tạo</li>
                <li>Cung cấp c&aacute;c dịch vụ hỗ trợ quản l&yacute; ph&aacute;t triển cho c&aacute;c doanh nghiệp KHCN tiềm năng</li>
                <li>Hỗ trợ t&iacute;ch hợp li&ecirc;n kết c&aacute;c c&ocirc;ng nghệ v&agrave; &yacute; tưởng tới doanh nghiệp</li>
            </ul>',
            'locale' => 'en',
        ]
        
        ]);
    }
}
