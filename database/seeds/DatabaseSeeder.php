<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserTableSeeder::class);
         $this->call(CauHoi::class);
         $this->call(CauHoiThuongGapSeed::class);
         $this->call(ChuyenGia::class);
         $this->call(ChuyenGiaSeed::class);
         $this->call(CongNghe::class);
         $this->call(CongNgheSeed::class);
         $this->call(LoaiDoiTac::class);
         $this->call(LoaiDoiTacSeed::class);
         $this->call(DoiTac::class);
         $this->call(DoiTacSeed::class);
         $this->call(LoaiTin::class);
         $this->call(LoaiTinSeed::class);
         $this->call(SuKien::class);
         $this->call(SuKienSeed::class);
         $this->call(TinTuc::class);
         $this->call(TinTucSeed::class);
         $this->call(ToChuc::class);
         $this->call(ToChucSeed::class);
         $this->call(TuyenDung::class);
         $this->call(TuyenDungSeed::class);
    }
}
