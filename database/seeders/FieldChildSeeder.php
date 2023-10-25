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
                'avt' => 'https://top10vietnam.top/wp-content/uploads/2021/08/Tong-hop-10-san-bong-da-cho-thue-uy-tin-tai-Da-Nang.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_field' => 1, 
                'name_field_child' => 'Sân Số 2',
                'type_field_child' => 'Sân 7 người', 
                'status' => 'Sẵn sàng',
                'price' => '180000',
                'number_star' => 4,
                'avt' => 'https://thethaovn365.com/wp-content/uploads/2019/03/s%C3%A2n-b%C3%B3ng-l%C3%AA-qu%C3%BD-%C4%91%C3%B4n-1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_field' => 1, 
                'name_field_child' => 'Sân Số 3',
                'type_field_child' => 'Sân 5 người', 
                'status' => 'Sẵn sàng',
                'price' => '120000',
                'number_star' => 5,
                'avt' => 'https://ledsaigon.net/upload/image/S%C3%82N%20BANH/z2362051233871_e70182af77a3215e0d8a3186d21ba199.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_field' => 1, 
                'name_field_child' => 'Sân Số 4',
                'type_field_child' => 'Sân 11 người', 
                'status' => 'Sẵn sàng',
                'price' => '210000',
                'number_star' => 5,
                'avt' => 'https://chonthuonghieu.com/wp-content/uploads/listing-uploads/gallery/2021/03/da-phuoc-2.jpg',
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
                'avt' => 'https://phuongthanhngoc.com/media/data/tin-tuc/danh-cho-nha-dau-tu/6-cong-trinh-phu-trong-san-bong-co-nhan-tao.jpg',
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
                'avt' => 'https://top10tphcm.com/wp-content/uploads/2020/12/San-bong-da-o-binh-thanh.jpg',
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
                'avt' => 'https://fpt123.net/uploads/images/san-co-nhan-tao/thi-cong-san-bong-co-nhan-tao-3.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
            
        ]);
    }
}
