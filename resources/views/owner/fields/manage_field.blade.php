@extends('owner.layouts.app')
@section('title', 'Quản lý sân bóng')
@section('content')
<div id="form1">
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
                <th style="vertical-align: middle; text-align: center;"></th>
                <th style="vertical-align: middle; text-align: center;">Hình ảnh</th>
                <th style="vertical-align: middle; text-align: center;">Tên sân</th>
                <th style="vertical-align: middle; text-align: center;">Địa chỉ</th>
                <th style="vertical-align: middle; text-align: center;">Mô tả</th>
                <th style="vertical-align: middle; text-align: center;">Thời gian mở</th>
                <th style="vertical-align: middle; text-align: center;">Thời gian đóng</th>
                <th style="vertical-align: middle; text-align: center;">Sân con</th>
            </tr>
            @foreach($fields as $field)
                <tr>
                    <td style="vertical-align: middle; text-align: center;"><input type="checkbox"  name="fields" style="width: 15px; height: 15px;"></td>
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
                        onclick="showForm2({{ $field->id }})">Chi tiết
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
</div>


    <div id="form2" style="display: none;">       
            <a href="#" onclick="showForm1()" style="font-size: 50px; 
                                                     display: inline-block;
                                                     padding: 0px 15px 0px 15px;">&#8249;</a>
            <h4 style=" display: inline-block;" id="field-name"></h4>
            <table id="childFieldsTable" class="table table-hover">
                
            </table>
        <div class="edit" style="text-align: center;">
            <button type="button" class="btn btn-sm btn-primary rounded py-2 px-4" style="cursor: pointer;">Sửa</button>
            <button type="button" class="btn btn-sm btn-primary rounded py-2 px-4">Xóa</button>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>   
<script>
    function showForm2(id) {
        document.getElementById('form1').style.display = 'none';
        document.getElementById('form2').style.display = 'block';
        $.ajax({
        url: '/getNameField/' + id,
        type: 'GET',
        success: function(name) {
            console.log(name);
            if ($('#field-name').length) {
                $('#field-name').text(name[0].name_field);
            } else {
                console.error('Element with id "field-name" not found.');
            }
        }
        });
        $.ajax({
            url: '/getChildFields/' + id, 
            type: 'GET',
            success: function(data) {               
                $('#childFieldsTable').empty();
                $('#childFieldsTable').append(
                    '<tr>'+
                        '<th></th>'+
                        '<th style="vertical-align: middle; text-align: center;">Tên sân con</th>'+
                        '<th style="vertical-align: middle; text-align: center;">Hình ảnh</th>'+
                        '<th style="vertical-align: middle; text-align: center;">Loại sân</th>'+
                        '<th style="vertical-align: middle; text-align: center;">Giá</th>'+
                        '<th style="vertical-align: middle; text-align: center;">Trạng thái</th>'+
                    '</tr>');

                // Add new rows to the table for each child field
                data.forEach(function(child) {
                $('#childFieldsTable').append(
                    '<tr>' +
                    '<td style="vertical-align: middle; text-align: center;"><input type="checkbox" name="field-child" style="width: 15px; height: 15px;"></td>'+
                    '<td style="vertical-align: middle; text-align: center;">' + child.name_field_child + '</td>' +
                    '<td style="vertical-align: middle; text-align: center;"><img src="' + child.avt + '" alt="ảnh sân" style="width: 10vw; height: 12vh;"></td>' +
                    '<td style="vertical-align: middle; text-align: center;">' + child.type_field_child + '</td>' +
                    '<td style="vertical-align: middle; text-align: center;">' + child.price + '</td>' +
                    '<td style="vertical-align: middle; text-align: center;">' + child.status + '</td>' +
                    '</tr>'
                    );
                });

                
            }
        });
    }

    function showForm1() {
        document.getElementById('form2').style.display = 'none';
        document.getElementById('form1').style.display = 'block';
    }
</script>

@endsection
