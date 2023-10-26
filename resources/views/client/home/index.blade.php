  <!-- Featured Start -->
  @extends('client.layouts.app')
  @section('title', 'Trang chủ')
  @section('content')
      
  <!-- Part 1-->
      <div class="container-fluid p-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="client/img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 100%;">
                            <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">XTMN</h6>
                            <h1 class="display-3 text-white mb-4 animated slideInDown">Dịch vụ cho thuê<br> sân bóng đá mini</h1>
                            <a href="{{ route('client.fields.index') }}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Xem sân</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="client/img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 100%;">
                            <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">XTMN</h6>
                            <h1 class="display-3 text-white mb-4 animated slideInDown">Dịch vụ cho thuê<br> sân bóng đá mini</h1>
                            <a href="{{ route('client.fields.index') }}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Xem sân</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
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
        

        <!-- welcome to xtmn -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                       
                        <h1 class="mb-4">Chào mừng đến với <span class="text-primary text-uppercase">XTMN</span></h1>
                        <p class="mb-4">Dịch vụ cho thuê sân bóng đá mini tiện lợi và hiện đại bậc nhất tại thành phố Đà Nẵng. Hệ thống sân cỏ nhân tạo chất lượng cao, lịch linh hoạt, và đảm bảo an toàn. Hãy cùng trải nghiệm những trận đấu thú vị cùng bạn bè tại XTMN!</p>
                        <div class="row g-3 pb-4">
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.1s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        <i class="fa fa-futbol fa-2x text-primary mb-2"></i>
                                        <h2 class="mb-1" data-toggle="counter-up">65</h2>
                                        <p class="mb-0">Sân bóng</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.3s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        {{-- <i class="fa fa-users-cog fa-2x text-primary mb-2"></i> --}}
                                        <i class="fa fa-solid fa-user-tie fa-2x text-primary mb-2"></i>
                                        <h2 class="mb-1" data-toggle="counter-up">60</h2>
                                        <p class="mb-0">Chủ sân</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.5s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        <i class="fa fa-users fa-2x text-primary mb-2"></i>
                                        <h2 class="mb-1" data-toggle="counter-up">231</h2>
                                        <p class="mb-0">Khách hàng</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="client/img/about-1.jpg" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.3s" src="client/img/about-2.jpg">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-50 wow zoomIn" data-wow-delay="0.5s" src="client/img/about-3.jpg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s" src="client/img/about-4.jpg">
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
