<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Carbon\Carbon;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        DB::table('image')->insert([
            ['url' => 'https://noithatre.vn/wp-content/uploads/2022/09/gia-tham-co-nhan-tao-san-bong-03.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['url' => 'https://giaydabongtot.com/wp-content/uploads/2020/07/Gia-lam-san-co-nhan-tao-bong-da-bao-nhieu-tien-3.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['url' => 'https://toplist.vn/images/800px/san-bong-da-mini-truong-dh-tdtt-da-nang-617768.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['url' => 'https://sonsanepoxy.vn/wp-content/uploads/2023/08/kich-thuoc-san-bong-da-4.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['url' => 'https://miui.vn/wp-content/uploads/2022/10/khu-cau-mon-san-bong-7-nguoi.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['url' => 'https://pinxedapdien.com.vn/wp-content/uploads/phat-den.png', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['url' => 'https://wesport.asia/wp-content/uploads/2020/09/IMG_2833-1.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTu83B-N3r9RZVK3eheWEI1ZxqbZ0LMJwHLmpvFZDW_j-amHwm2dvuesbIEfo-3sNhbCq0&usqp=CAU', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['url' => 'https://rozaco.vn/wp-content/uploads/2021/05/san-bong-yen-hoa.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTz1kCknfHOqWJpxEBOyo5KcXMJRjDSKHVSc76evdiiLe51mOffWp0fPb5QWbGv6x3tcv4&usqp=CAU', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSqwmOYw2rxx7pf53J_61Sev1fxf0297OPHtK8KDrJmjVY_N9tD2LCxABsyiFv1NIY00jE&usqp=CAU', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['url' => 'https://toplist.vn/images/800px/san-bong-tri-hai-khu-the-thao-an-phu-619025.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['url' => 'https://top10tphcm.com/wp-content/uploads/2020/12/San-bong-da-o-binh-thanh.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['url' => 'https://santennis.com.vn/uploads/partner/2021/02/04/thi_cong_san_bong_da_mini_5_nguoi_cao_cap_voi_den_led_400w_usa.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['url' => 'https://santennis.com.vn/uploads/partner/2021/02/04/thi_cong_san_bong_da_11_nguoi_pho_bien_voi_den_led_400w_usa.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            
        ]);
    }
}
