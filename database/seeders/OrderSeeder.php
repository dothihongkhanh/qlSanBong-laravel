<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        DB::table('order')->insert([
            [
                'username' => 'letuananh', 
                'time_create' => Carbon::now(),
                'status' => 'Đã xác nhận', 
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'levantuan', 
                'time_create' => Carbon::now(),
                'status' => 'Đã xác nhận', 
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'nguyenvancong', 
                'time_create' => Carbon::now(),
                'status' => 'Đã xác nhận', 
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            
        ]);
    }
}
