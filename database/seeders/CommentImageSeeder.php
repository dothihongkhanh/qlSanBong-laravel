<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Carbon\Carbon;

class CommentImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        DB::table('comment_image')->insert([
            [
                'id_comment' => 1, 
                'id_image' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_comment' => 1, 
                'id_image' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_comment' => 3, 
                'id_image' => 15,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_comment' => 4, 
                'id_image' => 12,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_comment' => 4, 
                'id_image' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_comment' => 8, 
                'id_image' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_comment' => 6, 
                'id_image' => 11,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_comment' => 6, 
                'id_image' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            
        ]);
    }
}
