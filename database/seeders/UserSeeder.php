<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        DB::table('user')->insert([
            [
                'username' => 'nguyenvanlong', 
                'account_name' => 'Nguyễn Văn Long',
                'phone_number' => '0123456789', 
                'password' => 'ABC12345',
                'address' => '41 Cao Thắng',
                'avt' => 'https://tse4.mm.bing.net/th?id=OIP.tS4o_QzG25ntuI90jWWWXQHaHa&pid=Api&P=0&h=180',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'nguyenvanan', 
                'account_name' => 'Nguyễn Văn An',
                'phone_number' => '0987654321', 
                'password' => 'ABC123456',
                'address' => '50 Cao Thắng',
                'avt' => 'https://scr.vn/wp-content/uploads/2020/07/%E1%BA%A2nh-c%E1%BA%B7p-%C4%91%E1%BA%B9p-ng%E1%BA%A7u-n%E1%BB%AF.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'nguyenvancong', 
                'account_name' => 'Nguyễn Văn Công',
                'phone_number' => '0112233445', 
                'password' => 'ABC12345',
                'address' => '123 Nguyễn Tất Thành',
                'avt' => 'https://scr.vn/wp-content/uploads/2020/08/H%C3%ACnh-avt-Anime.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'levantuan', 
                'account_name' => 'Lê Văn Tuấn',
                'phone_number' => '014777777', 
                'password' => 'ABC12345',
                'address' => '458 Nguyễn Tất Thành',
                'avt' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSq2IU5Ms2W9aAfftphuUY9ISdst9nzyq3xW5RNu2IeJuMuOtYL-h3W5v7GfpWlxAc21ng&usqp=CAU',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'letuananh', 
                'account_name' => 'Lê Tuấn Anh',
                'phone_number' => '0112233445', 
                'password' => 'ABC12345',
                'address' => '156 Lê Duẩn',
                'avt' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSq2IU5Ms2W9aAfftphuUY9ISdst9nzyq3xW5RNu2IeJuMuOtYL-h3W5v7GfpWlxAc21ng&usqp=CAU',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'nguyenvanquan', 
                'account_name' => 'Nguyễn Văn Quân',
                'phone_number' => '0112233445', 
                'password' => 'ABC12345',
                'address' => '20 Hải Phòng',
                'avt' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSq2IU5Ms2W9aAfftphuUY9ISdst9nzyq3xW5RNu2IeJuMuOtYL-h3W5v7GfpWlxAc21ng&usqp=CAU',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'nguyenanhtuan', 
                'account_name' => 'Nguyễn Anh Tuấn',
                'phone_number' => '0112233445', 
                'password' => 'ABC12345',
                'address' => '20 Cao Thắng',
                'avt' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSq2IU5Ms2W9aAfftphuUY9ISdst9nzyq3xW5RNu2IeJuMuOtYL-h3W5v7GfpWlxAc21ng&usqp=CAU',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}