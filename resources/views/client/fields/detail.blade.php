<!-- Page Header Start -->
@extends('client.layouts.app')
@section('title', 'Trang chi tiết')
@section('content')

<!-- Open Content -->
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <img class="card-img img-fluid" src="https://bulbal.vn/wp-content/uploads/2023/01/TOP-10-SAN-BONG-DA-PHUI-TAI-TPHCM-NAM-2023.jpg" alt="Card image cap" id="product-detail">
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
                                                <img class="card-img img-fluid" src="{{ $imageUrls->where('id', $image->id_image)->first()->url }}" alt="Hình ảnh trường">
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
                                                    <img class="card-img img-fluid" src="{{ $imageUrls->where('id', $image->id_image)->first()->url }}" alt="Hình ảnh trường">
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
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2">{{ $field->name_field }}</h1>
                            <p class="py-2">
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <span class="list-inline-item text-dark">Rating 4.8 | 36 Comments</span>
                            </p>
                            <p class="h3 py-2">$25.00/giờ</p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Địa chỉ:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>{{ $field->address }}</strong></p>
                                </li>
                            </ul>

                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Thời gian mở cửa:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>{{ $field->time_open }} - {{ $field->time_close }}</strong></p>
                                </li>
                            </ul>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Chủ sân:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>{{ $user->account_name }}</strong></p>
                                </li>
                            </ul>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Số điện thoại chủ sân:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>{{ $user->phone_number }}</strong></p>
                                </li>
                            </ul>

                            <h6>Description:</h6>
                            <p>{{ $field->description }}</p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Close Content -->
    <!-- Sân con -->
    <div class="row">
        @foreach ($fieldChild as $child)
        <div class="col-md-4 mb-4">
            <div class="card">
                @if ($child->avt)
                    <img src="{{ $child->avt}}" class="card-img-top" alt="Avatar">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $child->name_field_child }}</h5>
                    <p class="card-text"><strong>Type:</strong> {{ $child->type_field_child }}</p>
                    <p class="card-text"><strong>Status:</strong> {{ $child->status }}</p>
                    <p class="card-text"><strong>Price:</strong> {{ $child->price }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection