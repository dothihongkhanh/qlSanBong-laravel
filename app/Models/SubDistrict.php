<?php
// Trong model của bạn (ví dụ: App\Models\SubDistrict):
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubDistrict extends Model
{
    protected $table = 'sub_district'; // Tên của bảng trong cơ sở dữ liệu
    protected $primaryKey = 'id'; // Khóa chính của bảng
    protected $fillable = ['name_sub_district', 'id_district', 'created_at', 'updated_at'];

    // Phương thức để lấy tất cả phường/xã theo id quận/huyện
    public static function getSubDistrictsByDistrict($districtId)
    {
        // Lấy tất cả phường/xã theo id quận/huyện từ cơ sở dữ liệu
        $subDistricts = self::where('id_district', $districtId)->get();

        // Chuyển đổi thành mảng key-value để sử dụng trong dropdown
        return $subDistricts->pluck('name_sub_district', 'id')->all();
    }
}
