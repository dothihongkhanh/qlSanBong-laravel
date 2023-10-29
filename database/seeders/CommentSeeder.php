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
                'username' => 'letuananh', 
                'id_field_child' => 1,
                'time' => Carbon::now(),
                'star' => 5,
                'content' => 'Sân này chất lượng tốt, mình sẽ quay lại',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'levantuan', 
                'id_field_child' => 1,
                'time' => Carbon::now(),
                'star' => 5,
                'content' => 'Sân bóng này tuyệt vời! Điều kiện sân rất tốt và sạch sẽ. Dịch vụ chuyên nghiệp và nhân viên thân thiện. Tôi rất hài lòng với trải nghiệm của mình ở đây!',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'nguyenvancong', 
                'id_field_child' => 1,
                'time' => Carbon::now(),
                'star' => 4,
                'content' => 'Sân ok',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'nguyenvancong', 
                'id_field_child' => 17,
                'time' => Carbon::now(),
                'star' => 5,
                'content' => 'Giá ok, sân đẹp',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'lekhanh', 
                'id_field_child' => 6,
                'time' => Carbon::now(),
                'star' => 5,
                'content' => 'Sân còn mới, giá hợp lý',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],  
            [
                'username' => 'nguyenthanhminh', 
                'id_field_child' => 10,
                'time' => Carbon::now(),
                'star' => 5,
                'content' => 'Sân bóng này tuyệt vời! Điều kiện sân rất tốt và sạch sẽ. Dịch vụ chuyên nghiệp và nhân viên thân thiện. Tôi rất hài lòng với trải nghiệm của mình ở đây!',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ], 
            [
                'username' => 'dothanhnhan', 
                'id_field_child' => 19,
                'time' => Carbon::now(),
                'star' => 5,
                'content' => 'Sân bóng này thực sự tuyệt! Cơ sở vật chất đẹp, sân luôn được bảo quản và chăm sóc tốt. Đội ngũ nhân viên thân thiện và nhiệt tình. Tôi thực sự thích đến đây và sẽ quay lại!',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],  
            [
                'username' => 'leanhquan', 
                'id_field_child' => 8,
                'time' => Carbon::now(),
                'star' => 4,
                'content' => 'Sân tạm, hơi bẩn.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],      
            [
                'username' => 'tranvantung', 
                'id_field_child' => 18,
                'time' => Carbon::now(),
                'star' => 5,
                'content' => 'Sân bóng này thực sự tuyệt!',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],  
            [
                'username' => 'nguyenthanhminh', 
                'id_field_child' => 21,
                'time' => Carbon::now(),
                'star' => 4,
                'content' => 'Sân tạm, giá hơi cao.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],   
            [
                'username' => 'nguyenvancong', 
                'id_field_child' => 15,
                'time' => Carbon::now(),
                'star' => 4,
                'content' => 'Sân ok',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],             
            
        ]);
    }
}
