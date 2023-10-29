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
                'price' => '150.000',
                'avt' => 'https://top10vietnam.top/wp-content/uploads/2021/08/Tong-hop-10-san-bong-da-cho-thue-uy-tin-tai-Da-Nang.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_field' => 1, 
                'name_field_child' => 'Sân Số 2',
                'type_field_child' => 'Sân 7 người', 
                'status' => 'Sẵn sàng',
                'price' => '180.000',
                'avt' => 'https://thethaovn365.com/wp-content/uploads/2019/03/s%C3%A2n-b%C3%B3ng-l%C3%AA-qu%C3%BD-%C4%91%C3%B4n-1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_field' => 1, 
                'name_field_child' => 'Sân Số 3',
                'type_field_child' => 'Sân 5 người', 
                'status' => 'Sẵn sàng',
                'price' => '120.000',
                'avt' => 'https://ledsaigon.net/upload/image/S%C3%82N%20BANH/z2362051233871_e70182af77a3215e0d8a3186d21ba199.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_field' => 1, 
                'name_field_child' => 'Sân Số 4',
                'type_field_child' => 'Sân 11 người', 
                'status' => 'Sẵn sàng',
                'price' => '210.000',
                'avt' => 'https://chonthuonghieu.com/wp-content/uploads/listing-uploads/gallery/2021/03/da-phuoc-2.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_field' => 2, 
                'name_field_child' => 'Sân Số 1',
                'type_field_child' => 'Sân 7 người', 
                'status' => 'Sẵn sàng',
                'price' => '170.000',
                'avt' => 'https://phuongthanhngoc.com/media/data/tin-tuc/danh-cho-nha-dau-tu/6-cong-trinh-phu-trong-san-bong-co-nhan-tao.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_field' => 2, 
                'name_field_child' => 'Sân Số 2',
                'type_field_child' => 'Sân 11 người', 
                'status' => 'Sẵn sàng',
                'price' => '200.000',
                'avt' => 'https://rozaco.vn/wp-content/uploads/2021/06/thuong-dinh.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_field' => 2, 
                'name_field_child' => 'Sân Số 3',
                'type_field_child' => 'Sân 5 người', 
                'status' => 'Sẵn sàng',
                'price' => '150.000',
                'avt' => 'https://wolfoundation.org/wp-content/uploads/2021/04/Dien-tich-san-bong-da-11-nguoi-theo-tieu-chuan-cua-FIFA.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_field' => 3, 
                'name_field_child' => 'Sân Số 1',
                'type_field_child' => 'Sân 5 người', 
                'status' => 'Sẵn sàng',
                'price' => '155.000',
                'avt' => 'https://top10tphcm.com/wp-content/uploads/2020/12/San-bong-da-o-binh-thanh.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_field' => 3, 
                'name_field_child' => 'Sân Số 2',
                'type_field_child' => 'Sân 7 người', 
                'status' => 'Sẵn sàng',
                'price' => '180.000',
                'avt' => 'https://fpt123.net/uploads/images/san-co-nhan-tao/thi-cong-san-bong-co-nhan-tao-3.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_field' => 3, 
                'name_field_child' => 'Sân Số 3',
                'type_field_child' => 'Sân 7 người', 
                'status' => 'Sẵn sàng',
                'price' => '180.000',
                'avt' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSJv7oX25yMRkICRSohuQtGwe2lVfVYz-Jssiu80iqBO6TOuTejxe2mojGE7zpZFUky0Q8&usqp=CAU',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_field' => 3, 
                'name_field_child' => 'Sân Số 4',
                'type_field_child' => 'Sân 11 người', 
                'status' => 'Sẵn sàng',
                'price' => '220.000',
                'avt' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRt_aypiMRe4Xaqjtry0r60WFKxiTLZzPXRmn0PQqwYwap5voTtWKXOcJQQeaV0Jv43u7Y&usqp=CAU',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_field' => 4, 
                'name_field_child' => 'Sân Số 1',
                'type_field_child' => 'Sân 5 người', 
                'status' => 'Sẵn sàng',
                'price' => '140.000',
                'avt' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR1B8rHUHKk1ierjItL6JoXFMvk9v0xTuG6A5l_m0pT7HpMmq7tnKqVhFCn_VOq4XfbSFU&usqp=CAU',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_field' => 4, 
                'name_field_child' => 'Sân Số 2',
                'type_field_child' => 'Sân 5 người', 
                'status' => 'Sẵn sàng',
                'price' => '140.000',
                'avt' => 'https://fpt123.net/uploads/images/san-co-nhan-tao/thi-cong-san-bong-co-nhan-tao-3.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_field' => 4, 
                'name_field_child' => 'Sân Số 3',
                'type_field_child' => 'Sân 7 người', 
                'status' => 'Sẵn sàng',
                'price' => '165.000',
                'avt' => 'https://top10tphcm.com/wp-content/uploads/2020/12/san-bong-da-o-quan-8.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_field' => 4, 
                'name_field_child' => 'Sân Số 4',
                'type_field_child' => 'Sân 7 người', 
                'status' => 'Sẵn sàng',
                'price' => '165.000',
                'avt' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRt_aypiMRe4Xaqjtry0r60WFKxiTLZzPXRmn0PQqwYwap5voTtWKXOcJQQeaV0Jv43u7Y&usqp=CAU',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_field' => 5, 
                'name_field_child' => 'Sân Số 1',
                'type_field_child' => 'Sân 5 người', 
                'status' => 'Sẵn sàng',
                'price' => '150.000',
                'avt' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR1B8rHUHKk1ierjItL6JoXFMvk9v0xTuG6A5l_m0pT7HpMmq7tnKqVhFCn_VOq4XfbSFU&usqp=CAU',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_field' => 5, 
                'name_field_child' => 'Sân Số 2',
                'type_field_child' => 'Sân 7 người', 
                'status' => 'Sẵn sàng',
                'price' => '180.000',
                'avt' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT4Npv2F4-bmSTj6W9pBd-OFB27MUayB9QyxtzWpCMMcgIVvwAKnPKvCJfHqWW_KtbcAdE&usqp=CAU',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_field' => 5, 
                'name_field_child' => 'Sân Số 3',
                'type_field_child' => 'Sân 7 người', 
                'status' => 'Sẵn sàng',
                'price' => '180.000',
                'avt' => 'https://co-nhan-tao.com/wp-content/uploads/2021/08/san-bong-7-nguoi.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_field' => 5, 
                'name_field_child' => 'Sân Số 4',
                'type_field_child' => 'Sân 7 người', 
                'status' => 'Sẵn sàng',
                'price' => '180.000',
                'avt' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRt_aypiMRe4Xaqjtry0r60WFKxiTLZzPXRmn0PQqwYwap5voTtWKXOcJQQeaV0Jv43u7Y&usqp=CAU',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_field' => 6, 
                'name_field_child' => 'Sân Số 1',
                'type_field_child' => 'Sân 5 người', 
                'status' => 'Sẵn sàng',
                'price' => '150.000',
                'avt' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR1B8rHUHKk1ierjItL6JoXFMvk9v0xTuG6A5l_m0pT7HpMmq7tnKqVhFCn_VOq4XfbSFU&usqp=CAU',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_field' => 6, 
                'name_field_child' => 'Sân Số 2',
                'type_field_child' => 'Sân 5 người', 
                'status' => 'Sẵn sàng',
                'price' => '150.000',
                'avt' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT4Npv2F4-bmSTj6W9pBd-OFB27MUayB9QyxtzWpCMMcgIVvwAKnPKvCJfHqWW_KtbcAdE&usqp=CAU',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_field' => 6, 
                'name_field_child' => 'Sân Số 3',
                'type_field_child' => 'Sân 7 người', 
                'status' => 'Sẵn sàng',
                'price' => '175.000',
                'avt' => 'https://co-nhan-tao.com/wp-content/uploads/2021/08/san-bong-7-nguoi.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_field' => 6, 
                'name_field_child' => 'Sân Số 4',
                'type_field_child' => 'Sân 11 người', 
                'status' => 'Sẵn sàng',
                'price' => '210.000',
                'avt' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRt_aypiMRe4Xaqjtry0r60WFKxiTLZzPXRmn0PQqwYwap5voTtWKXOcJQQeaV0Jv43u7Y&usqp=CAU',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_field' => 6, 
                'name_field_child' => 'Sân Số 5',
                'type_field_child' => 'Sân 11 người', 
                'status' => 'Sẵn sàng',
                'price' => '210.000',
                'avt' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcThu5VIST3wYLBKeZZw35G8C3rNAlUid-TmXzZgRRB2HW-74lsKC5-E_89uMc57BK6bdLY&usqp=CAU',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
            
        ]);
    }
}
