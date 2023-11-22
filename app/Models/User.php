<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    protected $table = 'user'; // Tên của bảng trong cơ sở dữ liệu
    // Các trường của bảng
    protected $fillable = ['username', 'account_name', 'phone_number', 'password', 'address', 'email', 'google_id', 'avt', 'created_at', 'updated_at'];
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function canLogin()
    {
        // Kiểm tra trong bảng user_permission hoặc bất kỳ quyền nào bạn đã định nghĩa
        return $this->permissions->contains('name', 'login');
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Permission', 'user_permission');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'username', 'username');
    }
    }
