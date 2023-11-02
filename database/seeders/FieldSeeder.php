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
                'description' => 'Sân bóng đá Chuyên Việt là một trong những cái tên được biết đến rộng rãi nhất ở Đà Thành. Sân bóng đá Chuyên Việt là một trong những sân bóng đá mini chất lượng tốt nhất tại Đà Nẵng, cùng với độ rộng sân, lề sân, cũng như lưới được bao bọc xung quanh hợp lý hơn so với các sân khác.',
                'address' => 'Trung tâm Thể dục thể thao Quốc Phòng 3 – 98 Tiểu La, Đà Nẵng',
                'locate' => 'https://www.google.com/maps?ll=16.045103,108.214369&z=16&t=m&hl=en-US&gl=US&mapclient=embed&cid=1658093238522239791',
                'time_open' => '7:00',
                'time_close' => '23:30',
                'avt' => 'https://noithatbinhminh.com.vn/wp-content/uploads/2018/09/co-nhan-tao-san-bong-da-nang.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_field' => 'Sân Đa Phước', 
                'username' => 'nguyenvanan',
                'id_sub_district' => 2, 
                'description' => 'Sân bóng đá Đa Phước được xây dựng hoàn toàn dựa trên các tiêu chuẩn chất lượng, từ sân, cỏ cho đến đèn, lưới. Với không gian vô cùng rộng rãi và thoáng mát, người chơi sẽ cảm thấy hài lòng ngay khi đến đây. Sân có không gian rộng rãi, thoáng mát, trong lành thích hợp để tổ chức những trận bóng phong trào. Tại đây cũng cung cấp dịch vụ cho thuê giày, quần áo tập, nước uống giải khát. Sân có khu vệ sinh và phòng thay đồ khá sạch sẽ, bãi gửi xe an toàn. Những dịch vụ này giúp người chơi an tâm, thoải mái hơn khi đến với sân chơi.',
                'address' => 'Số 24 Nguyễn Tất Thành – Quận Thanh Khê, Đà Nẵng.',
                'locate' => 'https://www.google.com/maps/dir//%C3%94ng+%C3%8Dch+Khi%C3%AAm,+Khu+%C4%91%C3%B4+th%E1%BB%8B+%C4%90a+Ph%C6%B0%E1%BB%9Bc,+H%E1%BA%A3i+Ch%C3%A2u,+%C4%90%C3%A0+N%E1%BA%B5ng+550000/@16.0758763,108.1222282,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x3142184f9d0957ef:0xef353f95a192dad9!2m2!1d108.20463!2d16.0758921?entry=ttu',
                'time_open' => '5:00',
                'time_close' => '23:00',
                'avt' => 'https://www.danang43.vn/wp-content/uploads/2015/06/san-bong-nhan-tao-da-nang.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name_field' => 'Sân Tuyên Sơn', 
                'username' => 'nguyenanhtuan',
                'id_sub_district' => 2, 
                'description' => 'Sân bóng đá Tuyên Sơn là cụm sân bóng đá cỏ nhân tạo Làng thể thao Tuyên Sơn nằm tọa lạc tại Hòa Cường, Lê Duẩn, thành phố Đà Nẵng. Được xây dựng với quy mô lớn, chiếm một vị trí trong danh sách top sân bóng đá cỏ nhân tạo Đà Nẵng tốt nhất.  Hệ thống sân bóng đá cỏ nhân tạo hiện đại gồm 12 sân bóng, với 4 sân 5 người, 4 sân 6 người và 4 sân 7 người, cùng 1 sân 11 người theo đúng tiêu chuẩn quốc tế.  Đội ngũ nhân viên chuyên nghiệp, chu đáo trong từng chi tiết.',
                'address' => 'Số 22 đường 2/9 – Quận Hải Châu – TP Đà Nẵng',
                'locate' => '',
                'time_open' => '6:00',
                'time_close' => '23:30',
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
                'avt' => 'https://atsport.vn/wp-content/uploads/2021/08/kich-thuoc-san-bong-mini-5-nguoi-1-512x341.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            
            [
                'name_field' => 'Sân An Phúc', 
                'username' => 'nguyenvanquan',
                'id_sub_district' => 5, 
                'description' => 'Sân bóng đá An Phúc được đầu tư xây dựng với mặt cỏ chất lượng cao. Hệ thống đèn chiếu sáng hiện đại, cung cấp đủ ánh sáng cho các trận đấu vào buổi tối. Mặc dù nằm khá xa vị trí trung tâm, nhưng đây vẫn là sân bóng được nhiều người săn đón nhờ sự phục vụ cực kỳ chu đáo. Bởi lẽ một phần vì giá cả thuê rất phải chăng với các bạn sinh viên và luôn có các quầy nước phục vụ cho mỗi trận bóng.',
                'address' => 'Số 36, Nguyễn Hữu Cảnh, Thuận Phước, Hải Châu, Đà Nẵng',
                'locate' => 'https://www.google.com/maps/dir//36P8%2BWWW,+Nguy%E1%BB%85n+H%E1%BB%AFu+C%E1%BA%A3nh,+Thu%E1%BA%ADn+Ph%C6%B0%E1%BB%9Bc,+H%E1%BA%A3i+Ch%C3%A2u,+%C4%90%C3%A0+N%E1%BA%B5ng+550000/@16.0873357,108.1349311,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x3142181583fdbc81:0xa28c59b6a5d98cb0!2m2!1d108.2173329!2d16.0873515?entry=ttu',
                'time_open' => '5:00',
                'time_close' => '23:00',
                'avt' => 'https://dongphucmientrung.vn/StoreData/PageData/600/san-bong-da-o-da-nang-tuyen-son.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
