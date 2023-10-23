<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Carbon\Carbon;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        DB::table('image')->insert([
            ['url' => 'https://noithatre.vn/wp-content/uploads/2022/09/gia-tham-co-nhan-tao-san-bong-03.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['url' => 'https://giaydabongtot.com/wp-content/uploads/2020/07/Gia-lam-san-co-nhan-tao-bong-da-bao-nhieu-tien-3.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['url' => 'https://toplist.vn/images/800px/san-bong-da-mini-truong-dh-tdtt-da-nang-617768.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        ]);
    }
}
