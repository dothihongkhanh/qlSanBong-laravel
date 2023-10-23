<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Carbon\Carbon;

class FieldImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        DB::table('field_image')->insert([
            ['id_field' => '1', 'id_image' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id_field' => '1', 'id_image' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id_field' => '2', 'id_image' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id_field' => '3', 'id_image' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id_field' => '3', 'id_image' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
