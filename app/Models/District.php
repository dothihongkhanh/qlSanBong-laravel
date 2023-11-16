<?php

// Trong model của bạn (ví dụ: App\Models\District):
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'district'; // Tên của bảng trong cơ sở dữ liệu
    protected $primaryKey = 'id'; // Khóa chính của bảng
    protected $fillable = ['name_district', 'created_at', 'updated_at'];

    // Phương thức để lấy tất cả quận/huyện
    public static function getAllDistricts()
    {
        // Lấy tất cả quận/huyện từ cơ sở dữ liệu
        $districts = self::all();

        // Chuyển đổi thành mảng key-value để sử dụng trong dropdown
        return $districts->pluck('name_district', 'id')->all();
    }
}
