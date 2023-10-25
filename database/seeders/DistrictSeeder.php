<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Carbon\Carbon;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        DB::table('district')->insert([
            ['name_district' => 'Hải Châu', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name_district' => 'Thanh Khê', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name_district' => 'Liên Chiểu', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name_district' => 'Sơn Trà', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name_district' => 'Ngũ Hành Sơn', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name_district' => 'Cẩm Lệ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        ]);
    }
}
