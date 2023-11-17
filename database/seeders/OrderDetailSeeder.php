<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Carbon\Carbon;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        DB::table('order_detail')->insert([
            [
                'id_order' => 1, 
                'id_field_child' => 1,
                'time_start' => '8:00', 
                'time_end' => '10:00',
                'time_order' => Carbon::createFromFormat('d/m/Y', '20/11/2023'),
                'note' => '',
                'status'=>'Chờ xác nhận',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_order' => 1, 
                'id_field_child' => 1,
                'time_start' => '15:00', 
                'time_end' => '17:00',
                'time_order' => Carbon::createFromFormat('d/m/Y', '20/11/2023'),
                'note' => '',
                'status'=>'Xác nhận',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_order' => 1, 
                'id_field_child' => 2,
                'time_start' => '08:00', 
                'time_end' => '11:00',
                'time_order' => Carbon::createFromFormat('d/m/Y', '20/11/2023'),
                'note' => '',
                'status'=>'Xác nhận',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'id_order' => 2, 
                'id_field_child' => 5,
                'time_start' => '8:00', 
                'time_end' => '10:00',
                'time_order' => Carbon::createFromFormat('d/m/Y', '11/11/2023'),
                'note' => '',
                'status'=>'Đã xác nhận',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_order' => 2, 
                'id_field_child' => 6,
                'time_start' => '15:00', 
                'time_end' => '17:00',
                'time_order' => Carbon::createFromFormat('d/m/Y', '21/11/2023'),
                'note' => '',
                'status'=>'Chờ xác nhận',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_order' => 3, 
                'id_field_child' => 7,
                'time_start' => '08:00', 
                'time_end' => '10:00',
                'time_order' => Carbon::createFromFormat('d/m/Y', '21/11/2023'),
                'note' => '',
                'status'=>'Xác nhận',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
