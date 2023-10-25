<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Carbon\Carbon;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        DB::table('field')->insert([
            [
                'name_field' => 'Sân Chuyên Việt', 
                'username' => 'nguyenvanan',
                'id_sub_district' => 1, 
                'description' => 'Cho thuê trang phục thi đấu, Có nơi trông giữ xe, Có dịch vụ nước uống giải khát khác,  Khu vệ sinh và thay đồ sạch sẽ',
                'address' => 'Trung tâm Thể dục thể thao Quốc Phòng 3 – 98 Tiểu La, Đà Nẵng',
                'locate' => 'https://www.google.com/maps?ll=16.045103,108.214369&z=16&t=m&hl=en-US&gl=US&mapclient=embed&cid=1658093238522239791',
                'time_open' => '7:00',
                'time_close' => '23:30',
                'price' => '150k – 300k/h',
                'avt' => 'https://noithatbinhminh.com.vn/wp-content/uploads/2018/09/co-nhan-tao-san-bong-da-nang.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_field' => 'Sân Tuyên Sơn', 
                'username' => 'nguyenanhtuan',
                'id_sub_district' => 2, 
                'description' => 'Cho thuê tranh phục thi đấu, Có đèn đá ban đêm, Có nơi gửi xe, Phục vụ đồ uống',
                'address' => 'Số 22 đường 2/9 – Quận Hải Châu – TP Đà Nẵng',
                'locate' => '',
                'time_open' => '6:00',
                'time_close' => '23:30',
                'price' => '100k – 300k/h',
                'avt' => 'https://dongphucmientrung.vn/StoreData/PageData/600/san-bong-da-o-da-nang-duy-tan.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_field' => 'Sân Duy Tân (Quân Khu 5)', 
                'username' => 'nguyenvanquan',
                'id_sub_district' => 3, 
                'description' => 'Sân bóng Duy Tân Đà Nẵng nằm tại trên đường Duy Tân, phía trong Quân Khu 5. Sân Duy Tân nằm sát với Sân bóng Chuyên Việt.',
                'address' => 'số 07 đường Duy Tân, Quận Hải Châu, Tp.Đà Nẵng',
                'locate' => '',
                'time_open' => '6:00',
                'time_close' => '23:30',
                'price' => '100k – 300k/h',
                'avt' => 'https://qisc.com.vn/storage/2016/06/san-bong-da-mini-co-nhan-tao-doc-soi-6-1024x768.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_field' => 'Sân Trường Chinh', 
                'username' => 'nguyenvanan',
                'id_sub_district' => 5, 
                'description' => 'Là sân cỏ nhân tạo thuộc quận Thanh Khê, Đà Nẵng, tuy không thường xuyên đông khách, nhưng sân cỏ nhân tạo Trường Chinh cũng có rất nhiều lượng  khách đặt lịch vào các mùa giải vì sân mới, cỏ xanh và êm cho các cầu thủ thi đấu và giao lưu.',
                'address' => 'Số 243-Trường Chinh – Quận Thanh Khê, Đà Nẵng.',
                'locate' => '',
                'time_open' => '5:00',
                'time_close' => '23:00',
                'price' => '100k – 300k/h',
                'avt' => 'https://atsport.vn/wp-content/uploads/2021/08/kich-thuoc-san-bong-mini-5-nguoi-1-512x341.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_field' => 'Sân Đa Phước', 
                'username' => 'nguyenvanan',
                'id_sub_district' => 5, 
                'description' => 'Là sân cỏ nhân tạo thuộc quận Thanh Khê, Đà Nẵng, tuy không thường xuyên đông khách, nhưng sân cỏ nhân tạo Trường Chinh cũng có rất nhiều lượng  khách đặt lịch vào các mùa giải vì sân mới, cỏ xanh và êm cho các cầu thủ thi đấu và giao lưu.',
                'address' => 'Số 243-Trường Chinh – Quận Thanh Khê, Đà Nẵng.',
                'locate' => '',
                'time_open' => '5:00',
                'time_close' => '23:00',
                'price' => '100k – 300k/h',
                'avt' => 'https://www.danang43.vn/wp-content/uploads/2015/06/san-bong-nhan-tao-da-nang.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_field' => 'Sân Đa Phước', 
                'username' => 'nguyenvanquan',
                'id_sub_district' => 5, 
                'description' => 'Là sân cỏ nhân tạo thuộc quận Thanh Khê, Đà Nẵng, tuy không thường xuyên đông khách, nhưng sân cỏ nhân tạo Trường Chinh cũng có rất nhiều lượng  khách đặt lịch vào các mùa giải vì sân mới, cỏ xanh và êm cho các cầu thủ thi đấu và giao lưu.',
                'address' => 'Số 243-Trường Chinh – Quận Thanh Khê, Đà Nẵng.',
                'locate' => '',
                'time_open' => '5:00',
                'time_close' => '23:00',
                'price' => '100k – 300k/h',
                'avt' => 'https://dongphucmientrung.vn/StoreData/PageData/600/san-bong-da-o-da-nang-tuyen-son.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
