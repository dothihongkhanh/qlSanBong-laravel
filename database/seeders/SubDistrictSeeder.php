<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Carbon\Carbon;

class SubDistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        DB::table('sub_district')->insert([
            ['name_sub_district' => 'Thanh Bình', 'id_district' => 1,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name_sub_district' => 'Hải Châu I', 'id_district' => 1,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name_sub_district' => 'Hải Châu II', 'id_district' => 1,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name_sub_district' => 'Hòa Cường Bắc', 'id_district' => 1,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name_sub_district' => 'Tam Thuận', 'id_district' => 2,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name_sub_district' => 'An Hải Bắc', 'id_district' => 2,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name_sub_district' => 'An Hải Đông', 'id_district' => 2,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name_sub_district' => 'An Khê', 'id_district' => 2,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name_sub_district' => 'Liên Chiểu', 'id_district' => 3,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name_sub_district' => 'Hòa Hiệp Nam', 'id_district' => 3,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name_sub_district' => 'Hòa Khánh Bắc', 'id_district' => 3,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name_sub_district' => 'Hòa Khánh Nam', 'id_district' => 3,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name_sub_district' => 'Thọ Quang', 'id_district' => 4,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name_sub_district' => 'Mỹ An', 'id_district' => 4,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name_sub_district' => 'Phước Mỹ', 'id_district' => 4,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name_sub_district' => 'Hòa Quý', 'id_district' => 5,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name_sub_district' => 'Hoà Hải', 'id_district' => 5,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name_sub_district' => 'Khuê Mỹ', 'id_district' => 5,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name_sub_district' => 'Mỹ Đa', 'id_district' => 5,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name_sub_district' => 'Khuê Trung', 'id_district' => 6,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name_sub_district' => 'Hòa An', 'id_district' => 6,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name_sub_district' => 'Hòa Phát', 'id_district' => 6,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name_sub_district' => 'Hòa Thọ Tây', 'id_district' => 6,'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        ]);
    }
}
