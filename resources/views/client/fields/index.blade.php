<!-- Page Header Start -->
@extends('client.layouts.app')
@section('title', 'Danh sách sân')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-1.jpg);">
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center pb-5">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Danh sách sân</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Danh sách sân</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
<!-- Page Header End -->

 <!-- search sân-->
 <div class="container-fluid booking pb-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container">
                <div class="bg-white shadow" style="padding: 35px;">
                    <div class="row g-2">
                        <div class="col-md-10">
                            <div class="row g-2">
                                <div class="col-md-4">
                                    <select class="form-select">
                                        <option selected>Quận</option>
                                        <option value="1">Adult 1</option>
                                        <option value="2">Adult 2</option>
                                        <option value="3">Adult 3</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-select">
                                        <option selected>Phường</option>
                                        <option value="1">Child 1</option>
                                        <option value="2">Child 2</option>
                                        <option value="3">Child 3</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="date" id="date2" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" placeholder="Nhập sân cần tìm"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary w-100">Tìm</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
 <!--Cac san bong -->
 <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">CÁC SÂN BÓNG</h6>
                    <h1 class="mb-5">Khám phá <span class="text-primary text-uppercase">SÂN BÓNG</span></h1>
                </div>
                <div class="row g-4">
                    @foreach ($fields as $field)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="room-item shadow rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="{{ $field->avt }}" alt="Field Image" style="width: 100%; height: 250px;">
                                <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">{{ $field->price }}</small>
                            </div>
                            <div class="p-4 mt-2">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="mb-0">{{ $field->name_field }}</h5>
                                    <div class="ps-2">
                                        <small class="fa fa-star text-primary"></small>
                                    </div>
                                </div>
                                <p class="text-body mb-3">Địa chỉ: {{ $field->address }}</p>
                                <p class="text-body mb-3">Giờ mở cửa: {{ $field->time_open }} - {{ $field->time_close }}</p>
                                <div class="d-flex justify-content-end">
                                    <!--<a class="btn btn-sm btn-primary rounded py-2 px-4" href="{ route('field.details', ['id' => $field->id]) }}">Xem chi tiết</a>-->
                                    <a class="btn btn-sm btn-primary rounded py-2 px-4" href="">Xem chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
@endsection
