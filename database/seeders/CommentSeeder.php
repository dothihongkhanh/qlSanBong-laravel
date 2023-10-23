<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Carbon\Carbon;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        DB::table('comment')->insert([
            [
                'username' => 'nguyenvanC', 
                'id_field_child' => 1,
                'time' => Carbon::now(),
                'star' => 5,
                'content' => 'Sân này chất lượng tốt, mình sẽ quay lại',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]      
            
        ]);
    }
}
