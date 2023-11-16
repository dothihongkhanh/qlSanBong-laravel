@extends('owner.layouts.app')
@section('title', 'Đăng sân bóng')
<!-- Thêm CSS của Quill -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

<!-- Thêm thư viện Quill format description -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<!-- Thư viện Dropzone.js -->
<!-- Thư viện Dropzone.js -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropzone@5.9.2/dist/dropzone.css">
<script src="https://cdn.jsdelivr.net/npm/dropzone@5.9.2/dist/dropzone.js"></script>
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css"> --}}

@section('content')
    
        <div class="row">
            <div class="col-lg-8">
                <!-- Card -->
                <div class="card mb-3 mb-lg-5">
                    <!-- Header -->
                    <div class="card-header">
                        <h6 class="card-header-title"><b>THÔNG TIN SÂN BÓNG</b></h6>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <!-- Form Group -->
                        <div class="form-group">
                            <label for="nameFieldLabel" class="input-label">Tên sân bóng</label>
                            <input type="text" class="form-control" name="nameField" id="nameField"
                                placeholder="Sân bóng ABC, Sân bóng MNP,...">
                        </div>
                        <!-- End Form Group -->

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="QuanHuyen" class="input-label">Quận/Huyện</label>
                                    <select class="form-control" name="QuanHuyen" id="QuanHuyen">
                                        <option value="" disabled selected>-- Chọn Quận/Huyện --</option>
                                        @foreach (\App\Models\District::pluck('name_district', 'id') as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="PhuongXa" class="input-label">Phường/Xã</label>
                                    <select class="form-control" name="PhuongXa" id="PhuongXa">
                                        <option value="" disabled selected>-- Chọn Phường/Xã --</option>
                                        @foreach (\App\Models\SubDistrict::pluck('name_sub_district', 'id') as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- End Row -->
                        <div class="form-group">
                            <label for="addressLabel" class="input-label">Địa chỉ cụ thể</label>
                            <input type="text" class="form-control" name="address" id="address"
                                placeholder="123 Ông Ích Khiêm,12/12 Nguyễn Tất Thành...">
                        </div>
                        <div class="form-group">
                            <label for="locationLabel" class="input-label">Vị trí</label>
                            <input type="url" class="form-control" name="location" id="location"
                                placeholder="Dán đường dẫn url vào đây">
                        </div>
                        <label class="input-label">Mô tả </label>

                        <div id="quill-editor" style="min-height: 15rem;">
                            {{-- <p>Type your description...</p> --}}
                        </div>


                        <!-- Thêm mã script để kích hoạt Quill -->
                        <script>
                            var quill = new Quill('#quill-editor', {
                                theme: 'snow',
                                placeholder: 'Viết mô tả sân bóng tại đây...',
                            });
                        </script>

                        <!-- End Quill -->
                    </div>
                    <!-- Body -->
                </div>
                <!-- End Card -->
                <!-- Card -->
                <div class="card">
                    <!-- Header -->
                    <div class="card-header">
                        <h6 class="card-header-title"><b>THÔNG TIN SÂN CON</b></h6>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body" id="fieldContainer">
                        <div class="row">
                            <div class="col-sm-3">
                                <!-- Form Group -->
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nameFieldChild"
                                        id="nameFieldChild"placeholder="Tên sân con">
                                </div>
                                <!-- End Form Group -->
                            </div>

                            <div class="col-sm-3">
                                <!-- Form Group for Type of Field Child -->
                                <div class="form-group">
                                    <select class="form-control" name="typeFieldChild" id="typeFieldChild">
                                        <option value="san5">Sân 5 người</option>
                                        <option value="san7">Sân 7 người</option>
                                        <option value="san11">Sân 11 người</option>
                                    </select>
                                </div>
                                <!-- End Form Group for Type of Field Child -->
                            </div>

                            <div class="col-sm-2">
                                <!-- Form Group -->
                                <div class="form-group">
                                    <input type="text" class="form-control" name="price"
                                        id="price"placeholder="Giá(VND)">
                                </div>
                                <!-- End Form Group -->
                            </div>

                            <div class="col-sm-3">
                                <!-- Form Group for Image Upload -->
                                <div class="form-group">
                                    <input type="file" class="custom-file-input" name="image" id="image"
                                        accept="image/*">
                                    <label class="custom-file-label" for="image">Hình ảnh</label>
                                </div>
                                <!-- End Form Group for Image Upload -->
                            </div>                            
                        </div>
                    </div>
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-3">
                                <a href="javascript:;"
                                    class="js-create-field btn btn-sm btn-no-focus btn-ghost-primary"id="addNewField">
                                    <i class="fas fa-plus" style="color: #15b601;"></i> Thêm sân con mới
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- script ảnh sân con --}}
                    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                    <script>
                        $(document).ready(function() {
                            // Lắng nghe sự kiện thay đổi của input file
                            $('#fieldContainer').on('change', 'input[name="image"]', function() {
                                // Lấy tên của file được chọn
                                var fileName = $(this).val().split('\\').pop();
                                // Hiển thị tên file trên label
                                $(this).siblings('.custom-file-label').html(fileName);
                            });

                            // Xử lý sự kiện khi nút "Thêm sân con mới" được nhấn
                            $('#addNewField').on('click', function() {
                                // Sao chép hàng dữ liệu gốc
                                var newRow = $('#fieldContainer .row:first').clone();

                                // Tạo id động cho input file trong hàng mới
                                var newId = 'image_' + Math.floor(Math.random() * 1000);
                                newRow.find('input[name="image"]').attr('id', newId);
                                newRow.find('input[name="image"]').siblings('label').attr('for', newId);

                                // Thêm cột "Xóa" vào hàng mới
                                var deleteColumn =
                                    '<div class="col-sm-1"><div class="form-group"><button type="button" class="btn btn-danger deleteRow">Xóa</button></div></div>';
                                newRow.append(deleteColumn);

                                // Xóa giá trị của các trường input và combobox trong hàng mới
                                newRow.find('input, select').val('');

                                newRow.find('select[name="typeFieldChild"]').val('san5');

                                // Đặt lại giá trị của input file thành mặc định và xóa thuộc tính required
                                newRow.find('input[name="image"]').val('');
                                newRow.find('input[name="image"]').removeAttr('required');
                                newRow.find('.custom-file-label').html('Hình ảnh');

                                // Thêm hàng mới vào cuối
                                $('#fieldContainer').append(newRow);
                            });

                            // Lắng nghe sự kiện click của nút "Xóa"
                            $('#fieldContainer').on('click', '.deleteRow', function() {
                                var row = $(this).closest('.row');
                                row.remove();
                            });
                        });
                    </script>


                    <!-- Body -->
                </div>
                <!-- End Card -->
            </div>

            <div class="col-lg-4">
                <!-- Card -->
                <div class="card mb-3 mb-lg-5">
                    <!-- Header -->
                    <div class="card-header">
                        <h6 class="card-header-title"><b>ẢNH ĐẠI DIỆN SÂN BÓNG</b></h6>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <form action="/upload" class="dropzone" id="profileImageDropzone">
                            <div class="dz-message custom-file-boxed-label">
                                <img class="avatar avatar-xl avatar-4by3 mb-0"
                                    src="https://htmlstream.com/front-dashboard/assets/svg/illustrations-light/oc-browse.svg"
                                    alt="Image Description">
                                <h5 class="mb-1">Kéo hình ảnh</h5>
                                <p> or
                                    <a href="#" id="file-browser">Chọn file</a> từ máy tính của bạn.
                                </p>
                            </div>
                        </form>
                    </div>
                    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>                   
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>
                    <script>
                        // Initialize Dropzone
                        Dropzone.autoDiscover = false;
                        var myDropzone = new Dropzone("#profileImageDropzone", {
                            url: "/upload", // Specify the URL for server-side file handling
                            maxFiles: 1, // Allow only one file to be uploaded
                            acceptedFiles: 'image/*', // Allow only image files
                            addRemoveLinks: true,
                            init: function() {
                                this.on("success", function(file, response) {
                                    // Handle successful upload (you can update UI or do something here)
                                    console.log(response);
                                });
                            }
                        });
                    </script>
                    <!-- Body -->
                </div>
                <!-- Card -->
                <div class="card mb-3 mb-lg-5">
                    <!-- Header -->
                    <div class="card-header">
                        <h6 class="card-header-title"><b>GIỜ HOẠT ĐỘNG</b></h6>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <!-- Form Group -->
                        <div class="form-group">
                            <label for="priceNameLabel" class="input-label">Giờ mở cửa</label>

                            <div class="input-group">
                                <input type="text" class="form-control" name="priceName" id="priceNameLabel"
                                    placeholder="07:00" aria-label="07:00">
                            </div>
                        </div>
                        <!-- End Form Group -->

                        <!-- Form Group -->
                        <div class="form-group">
                            <label for="priceNameLabel" class="input-label">Giờ đóng cửa</label>

                            <div class="input-group">
                                <input type="text" class="form-control" name="priceName" id="priceNameLabel"
                                    placeholder="22:00" aria-label="22:00">
                            </div>
                        </div>
                        <!-- End Form Group -->
                    </div>
                    <!-- Body -->
                </div>
                <!-- End Card -->

            </div>
        </div>

        <div class="row mt-4" style="display: flex; justify-content: center;">
            <!-- Button to Add New Field -->
            <button type="button" class="btn btn-success" id="postField">Đăng sân bóng</button>
        </div>
@endsection
