<!-- Page Header Start -->
@extends('client.layouts.app')
@section('title', $field->name_field)
@section('content')

<!-- đường dẫn -->
<!-- close đường dẫn -->
<div class="container mt-3">
    <p><a href="{{ route('client.home') }}">Trang chủ</a> /<a href="{{ route('client.fields.index') }}"> Danh sách sân </a>/ <b>{{ $field->name_field }}</b></p>
</div>
<!-- Open Content -->
<div class="container pb-5">
    <div class="row">
        <div class="col-lg-5 mt-2">
            <div class="card mb-3">
                <img class="card-img img-fluid" src="{{ $field->avt }}" alt="Card image cap" id="product-detail" style="height:410px">
            </div>
            <div class="row">
                <!--Start Controls-->
                <div class="col-1 align-self-center">
                    <a href="#multi-item-example" role="button" data-bs-slide="prev">
                        <i class="text-dark fas fa-chevron-left"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                </div>
                <!--End Controls-->
                <!--Start Carousel Wrapper-->
                <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                    <!--Start Slides-->
                    <div class="carousel-inner product-links-wap" role="listbox">
                        <!--First slide-->
                        <div class="carousel-item active">
                            <div class="row">
                                @foreach ($fieldImages->take(3) as $image)
                                <div class="col-4">
                                    <a href="#">
                                        <img class="card-img img-fluid" src="{{ $imageUrls->where('id', $image->id_image)->first()->url }}" style="height:90px">
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!--/.First slide-->
                        <!--Second slide-->
                        <div class="carousel">
                            @foreach ($fieldImages->chunk(3) as $chunk)
                            <div class="carousel-item">
                                <div class="row">
                                    @foreach ($chunk as $image)
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="{{ $imageUrls->where('id', $image->id_image)->first()->url }}" style="height:90px">
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!--/.Second slide-->
                    </div>
                    <!--End Slides-->
                </div>
                <!--End Carousel Wrapper-->
                <!--Start Controls-->
                <div class="col-1 align-self-center">
                    <a href="#multi-item-example" role="button" data-bs-slide="next">
                        <i class="text-dark fas fa-chevron-right"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <!--End Controls-->
            </div>
        </div>
        <!-- col end -->
        <div class="col-lg-7 mt-2">
            <div class="card">
                <div class="card-body">
                    <h1 class="h2 text-primary">{{ $field->name_field }}</h1>
                    <p class="py-2">
                        <span class="list-inline-item text-dark">{{ $averageStars }}<i class="fa fa-star text-primary"></i> | {{$commentCount}} Comments</span>
                    </p>
                    <p class="h4 py-1 text-danger">{{ number_format($priceByField[$field->id]['min'], 0, ',', '.') }} - {{ number_format($priceByField[$field->id]['max'], 0, ',', '.') }}/giờ</p>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <!-- <i class="fa fa-user ms-3"></i> -->
                            <!-- <i class="fa fa-solid fa-user-tie fa-2x text-primary mb-2"></i> -->
                            <h6>Địa chỉ:</h6>
                        </li>
                        <li class="list-inline-item">
                            <p>{{ $field->address }}</p>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{ $field->locate }}" target="_blank">Xem vị trí</a>
                        </li>
                    </ul>

                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <h6>Thời gian mở cửa:</h6>
                        </li>
                        <li class="list-inline-item">
                            <p>{{ $field->time_open }} - {{ $field->time_close }}</p>
                        </li>
                    </ul>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <h6>Chủ sân:</h6>
                        </li>
                        <li class="list-inline-item">
                            <p>{{ $user->account_name }}</p>
                        </li>
                    </ul>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <h6>Số điện thoại chủ sân:</h6>
                        </li>
                        <li class="list-inline-item">
                            <p>{{ $user->phone_number }}</p>
                        </li>
                    </ul>

                    <h6>Mô tả:</h6>
                    <p>{{ $field->description }}</p>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Close Content -->

<!-- Sân con -->
<div class="container">
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h5 class="section-title text-center text-primary text-uppercase">Danh sách sân con</h5>
    </div>
    <div class="row g-2">
        <div class="col-md-10">
            <div class="row g-2">
                <div class="col-md-3">
                    <div class="date" id="date1" data-target-input="nearest">
                        <label class="ml-3 form-control-placeholder" for="#">Xem sân bận theo ngày:</label>
                        <input type="date" class="col-md-14 form-control" min="<?php echo date('Y-m-d'); ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-primary w-20" style="margin-top:24px">Xem</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-3">
        @foreach ($fieldChilds as $child)
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow">
                <div class="position-relative">
                    @if ($child->avt)
                    <img src="{{ $child->avt}}" class="card-img-top" style="height:170px">
                    @endif
                    <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">{{ $child->price }}/giờ</small>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="mb-2">{{ $child->name_field_child }}</h5>
                        <div class="ps-0">
                            <p>{{ $averageStars2[$child->id] }}<i class="fa fa-star text-primary"></i></p> 
                        </div>
                    </div>
                    <p class="mb-0">Loại sân: {{ $child->type_field_child }}</p>
                    <p class="mb-0">Tình trạng: {{ $child->status }}</p>
                    <p class="mb-0">Khung giờ bận:</p>
                    <p class="mb-0">7:00 - 10:00 (Ngày 28/10/2023)</p>
                    <p class="mb-0">7:00 - 10:00 (Ngày 28/10/2023)</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
<!-- Close Sân con -->

<!-- Dat san -->
<div class="container my-5">
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h5 class="section-title text-center text-primary text-uppercase">Đặt sân</h5>
    </div>
    <div class="row">
        <div class="col-lg-5">
            <div class="row g-2">
                <div class="col-md-12">
                    <div class="row g-2">
                        <div class="col-md-6">
                            <div class="date" id="date1" data-target-input="nearest">
                                <label class="ml-3 form-control-placeholder" for="#">Ngày đặt:</label>
                                <input type="date" class="col-md-14 form-control" min="<?php echo date('Y-m-d'); ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="ml-3 form-control-placeholder" for="#"> Sân:</label>
                            <select class="form-select" id="mySelect">
                                @foreach ($fieldChilds as $child)
                                <option>{{ $child->name_field_child }} ({{ $child->type_field_child }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="date" id="date2" data-target-input="nearest">
                                <label class="ml-3 form-control-placeholder" id="start-p" for="start">Giờ bắt đầu</label>
                                <input type="text" class="form-control datetimepicker-input" placeholder="VD: 5:00" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="date" id="date2" data-target-input="nearest">
                                <label class="ml-3 form-control-placeholder" id="start-p" for="start">Giờ kết thúc</label>
                                <input type="text" class="form-control datetimepicker-input" placeholder="VD: 5:00" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-primary w-100">Thêm sân</button>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="row g-2">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Ngày đặt</th>
                            <th>Loại sân</th>
                            <th>Giờ bắt đầu</th>
                            <th>Giờ kết thúc</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>28/10/2023</td>
                        <td>Sân 7</td>
                        <td>8:00</td>
                        <td>10:00</td>
                        <td class="text-center"><a class='btn btn-primary' href="#"><i class="fa fa-pen"></i> Edit</a> <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i> Del</a></td>
                    </tr>

                    <tr>
                        <td>28/10/2023</td>
                        <td>Sân 7</td>
                        <td>8:00</td>
                        <td>10:00</td>
                        <td class="text-center"><a class='btn btn-primary' href="#"><i class="fa fa-pen"></i> Edit</a> <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i> Del</a></td>
                    </tr>
                    <tr>
                        <td>28/10/2023</td>
                        <td>Sân 7</td>
                        <td>8:00</td>
                        <td>10:00</td>
                        <td class="text-center"><a class='btn btn-primary' href="#"><i class="fa fa-pen"></i> Edit</a> <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i> Del</a></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-3 float-end">
                <button class="btn btn-primary w-100 ">Đặt sân</button>
            </div>
        </div>
    </div>
</div>
<!-- Close Dat san -->

<!-- Binh luan -->
<div class="container my-5">
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h5 class="section-title text-center text-primary text-uppercase">Bình luận</h5>
    </div>

    <!-- Binh luan -->
    <div class="container mt-3 d-flex">

        <div class="row d-flex">
            <div class="col-md-12">
                <div class="text-left">
                    <h6>Tất cả bình luận ({{$commentCount}})</h6>
                </div>
                @foreach ($comments as $comment)
                <div class="border-bottom p-3 mb-2">

                    <div class="d-flex flex-row">
                        @foreach ($user2 as $user1)
                        @if ($comment->username == $user1->username)
                        <img src="{{ $user1->avt }}" height="40" width="40" class="rounded-circle">
                        <div class="d-flex flex-column ms-2">
                            <h6 class="mb-1">{{ $user1->account_name }} | {{ $comment->star }}<i class="fa fa-star text-primary"></i></h6>
                            @foreach ($fieldChilds as $fieldChild1)
                            @if ($fieldChild1->id == $comment->id_field_child)
                            <p>Loại sân: <b>{{ $fieldChild1->name_field_child }}</b></p>
                            @endif
                            @endforeach
                            <p class="comment-text">{{ $comment->content }}</p>
                            <!-- Kiểm tra xem có hình ảnh cho bình luận hiện tại -->
                            <div class="d-inline mb-3">
                                @foreach ($commentImages as $commentImage)
                                @if ($commentImage->id_comment == $comment->id)
                                @foreach ($imageUrls2 as $image2)
                                @if ($image2->id == $commentImage->id_image)
                                <img src="{{ $image2->url }}" style="width:70px ;height:70px">
                                @endif
                                @endforeach
                                @endif
                                @endforeach
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>

                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row gap-3 align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="fa fa-heart text-danger"></i>
                                <span class="ms-1 fs-10">Like</span>
                            </div>

                            <div class="d-flex align-items-center">
                                <i class="fa fa-reply text-primary"></i>
                                <span class="ms-1 fs-10">Reply</span>
                            </div>
                        </div>

                        <div class="d-flex flex-row">
                            <span class="text-muted fw-normal fs-10">{{ $comment->time }}</span>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>

        </div>

    </div>
</div>
<!-- close comment -->
@endsection