@extends('owner.layouts.app')
@section('title', 'Quản lý sân bóng')
@section('content')
<table class="table table-hover">
    
    @php
        $username = session('username');
        $user = \App\Models\User::where('username', $username)->first();

        if ($user) {
            $fields = \App\Models\Field::where('username', $user->username)
                ->select('id', 'time_open', 'time_close', 'avt', 'description', 'address', 'name_field')
                ->get();
        } else {
            echo "Không tìm thấy người dùng";
        }
    @endphp

    @if($fields)
        <table class="table table-hover">
            <tr>
                <th></th>
                <th style="vertical-align: middle; text-align: center;">ID</th>
                <th style="vertical-align: middle; text-align: center;">Hình ảnh</th>
                <th style="vertical-align: middle; text-align: center;">Tên sân</th>
                <th style="vertical-align: middle; text-align: center;">Địa chỉ</th>
                <th style="vertical-align: middle; text-align: center;">Mô tả</th>
                <th style="vertical-align: middle; text-align: center;">Thời gian mở</th>
                <th style="vertical-align: middle; text-align: center;">Thời gian đóng</th>
                <th></th>
            </tr>
            @foreach($fields as $field)
                <tr>
                    <td style="vertical-align: middle; text-align: center;"><input type="checkbox"></td>
                    <td style="vertical-align: middle; text-align: center;">{{ $field->id }}</td>
                    <td style="vertical-align: middle; text-align: center;">
                        <img src="{{ $field->avt }}" alt="ảnh sân" style="width: 10vw; height: 12vh;">
                    </td>
                    <td style="vertical-align: middle; text-align: center;">{{ $field->name_field }}</td>
                    <td style="text-align: justify;">{{ $field->address }}</td>
                    <td style="text-align: justify;">{{ $field->description }}</td>
                    <td style="vertical-align: middle; text-align: center;">{{ $field->time_open }}</td>
                    <td style="vertical-align: middle; text-align: center;">{{ $field->time_close }}</td>
                    <td style="vertical-align: middle;">
                        <a style="width: max-content;" class="btn btn-sm btn-primary rounded py-2 px-4"
                            href="{{ route('owner.fields.detail', ['id' => $field->id]) }}">Chi tiết
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>

    @else
        <p>Không có dữ liệu để hiển thị</p>
    @endif
</table>
<div class="edit" style="text-align: center;">
    <button type="button" class="btn btn-sm btn-primary rounded py-2 px-4" style="cursor: pointer;">Sửa</button>
    <button type="button" class="btn btn-sm btn-primary rounded py-2 px-4">Xóa</button>
</div>

@endsection