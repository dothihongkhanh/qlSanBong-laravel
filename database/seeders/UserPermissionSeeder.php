<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Carbon\Carbon;

class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        DB::table('user_permission')->insert([
            [
                'id_permission' => 1, 
                'username' => 'nguyenvanlong',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_permission' => 2, 
                'username' => 'nguyenvanan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_permission' => 2, 
                'username' => 'nguyenanhtuan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_permission' => 2, 
                'username' => 'nguyenvanquan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_permission' => 3, 
                'username' => 'nguyenvancong',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_permission' => 3, 
                'username' => 'levantuan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_permission' => 3, 
                'username' => 'letuananh',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_permission' => 3, 
                'username' => 'lekhanh',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_permission' => 3, 
                'username' => 'dothanhnhan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_permission' => 3, 
                'username' => 'nguyenthanhminh',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_permission' => 3, 
                'username' => 'leanhquan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_permission' => 3, 
                'username' => 'tranvantung',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
