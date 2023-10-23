<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Carbon\Carbon;

class FieldChildSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        DB::table('field_child')->insert([
            [
                'id_field' => 1, 
                'name_field_child' => 'Sân Số 1',
                'type_field_child' => 'Sân 7 người', 
                'status' => 'Sẵn sàng',
                'price' => '150000',
                'number_star' => 5,
                'desc' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_field' => 1, 
                'name_field_child' => 'Sân Số 2',
                'type_field_child' => 'Sân 5 người', 
                'status' => 'Sẵn sàng',
                'price' => '120000',
                'number_star' => 5,
                'desc' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_field' => 2, 
                'name_field_child' => 'Sân Số 1',
                'type_field_child' => 'Sân 7 người', 
                'status' => 'Sẵn sàng',
                'price' => '170000',
                'number_star' => 5,
                'desc' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_field' => 3, 
                'name_field_child' => 'Sân Số 1',
                'type_field_child' => 'Sân 5 người', 
                'status' => 'Sẵn sàng',
                'price' => '140000',
                'number_star' => 4,
                'desc' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_field' => 2, 
                'name_field_child' => 'Sân Số 2',
                'type_field_child' => 'Sân 7 người', 
                'status' => 'Sẵn sàng',
                'price' => '170000',
                'number_star' => 5,
                'desc' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
            
        ]);
    }
}
