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
                              <h1 class="display-3 text-white mb-4 animated slideInDown">Dịch vụ cho thuê<br> sân bóng đá
                                  mini</h1>
                              <a href="{{ route('client.fields.index') }}"
                                  class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Xem sân</a>
                          </div>
                      </div>
                  </div>
                  <div class="carousel-item">
                      <img class="w-100" src="client/img/carousel-2.jpg" alt="Image">
                      <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                          <div class="p-3" style="max-width: 100%;">
                              <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">XTMN</h6>
                              <h1 class="display-3 text-white mb-4 animated slideInDown">Dịch vụ cho thuê<br> sân bóng đá
                                  mini</h1>
                              <a href="{{ route('client.fields.index') }}"
                                  class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Xem sân</a>
                          </div>
                      </div>
                  </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
              </button>
          </div>
      </div>

      <!-- welcome to xtmn -->
      <div class="container-xxl py-5">
          <div class="container">
              <div class="row g-5 align-items-center">
                  <div class="col-lg-6">

                      <h1 class="mb-4">Chào mừng đến với <span class="text-primary text-uppercase">XTMN</span></h1>
                      <p class="mb-4">Dịch vụ cho thuê sân bóng đá mini tiện lợi và hiện đại bậc nhất tại thành phố Đà
                          Nẵng. Hệ thống sân cỏ nhân tạo chất lượng cao, lịch linh hoạt, và đảm bảo an toàn. Hãy cùng trải
                          nghiệm những trận đấu thú vị cùng bạn bè tại XTMN!</p>
                      <div class="row g-3 pb-4">
                          <div class="col-sm-4 wow fadeIn" data-wow-delay="0.1s">
                              <div class="border rounded p-1">
                                  <div class="border rounded text-center p-4">
                                      <i class="fa fa-futbol fa-2x text-primary mb-2"></i>
                                      <h2 class="mb-1" data-toggle="counter-up">{{ $fieldCount }}</h2>
                                      <p class="mb-0">Sân bóng</p>
                                  </div>
                              </div>
                          </div>
                          <div class="col-sm-4 wow fadeIn" data-wow-delay="0.3s">
                              <div class="border rounded p-1">
                                  <div class="border rounded text-center p-4">
                                      {{-- <i class="fa fa-users-cog fa-2x text-primary mb-2"></i> --}}
                                      <i class="fa fa-solid fa-user-tie fa-2x text-primary mb-2"></i>
                                      <h2 class="mb-1" data-toggle="counter-up">{{ $owner }}</h2>
                                      <p class="mb-0">Chủ sân</p>
                                  </div>
                              </div>
                          </div>
                          <div class="col-sm-4 wow fadeIn" data-wow-delay="0.5s">
                              <div class="border rounded p-1">
                                  <div class="border rounded text-center p-4">
                                      <i class="fa fa-users fa-2x text-primary mb-2"></i>
                                      <h2 class="mb-1" data-toggle="counter-up">{{ $client }}</h2>
                                      <p class="mb-0">Khách hàng</p>
                                  </div>
                              </div>
                          </div>
                      </div>

                  </div>
                  <div class="col-lg-6">
                      <div class="row g-3">
                          <div class="col-6 text-end">
                              <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s"
                                  src="client/img/about-1.jpg" style="margin-top: 25%;">
                          </div>
                          <div class="col-6 text-start">
                              <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.3s"
                                  src="client/img/about-2.jpg">
                          </div>
                          <div class="col-6 text-end">
                              <img class="img-fluid rounded w-50 wow zoomIn" data-wow-delay="0.5s"
                                  src="client/img/about-3.jpg">
                          </div>
                          <div class="col-6 text-start">
                              <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s"
                                  src="client/img/about-4.jpg">
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <!--Cac san bong -->
      <div class="container-xxl py-5">
          <div class="container">
            <div class="wrap-header-cart js-panel-cart">
                <div class="s-full js-hide-cart"></div>
        
                <div class="header-cart ">
                    <div class="header-cart-title ">
                        <span class="mx-3">
                            Bộ lọc tìm kiếm sân bóng
                        </span>
        
                        <div class="mx-3 js-hide-cart" style="cursor: pointer;float: left">
                            <i class="fas fa-times"></i>
                        </div>
                    </div>
        
                    <form id="filterForm" form method="GET" action="{{ route('client.home.filter') }}">
                        <div class="col-md-6 offset-3 my-3">
                            <label class="ml-3 form-control-placeholder" id="start-p" for="start">Chọn phường/xã:</label>
                            <select class="form-select" name="sub_district">
                                <option selected>Phường</option>
                                @foreach ($subDistricts as $subDistrict)
                                    <option value="{{ $subDistrict->id }}">{{ $subDistrict->name_sub_district }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 offset-3 my-3">
                            <div class="date" id="date1" data-target-input="nearest">
                                <label class="ml-3 form-control-placeholder" for="#">Chọn ngày đặt:</label>
                                <input type="date" name="date" class="col-md-14 form-control" min="<?php echo date('Y-m-d'); ?>"
                                    value="<?php echo date('Y-m-d'); ?>"id="inputDate">
                            </div>
                        </div>
                        <div class="col-md-6 offset-3 my-3">
                            <div class="date" id="date2" data-target-input="nearest">
                                <label class="ml-3 form-control-placeholder" id="start-p" for="start">Giờ bắt
                                    đầu:</label>
                                <input type="text" name="start_Time" class="form-control datetimepicker-input"
                                    placeholder="VD: 08:00" id="inputStartTime">
                            </div>
                        </div>
                        <div class="col-md-6 offset-3 my-3">
                            <div class="date" id="date2" data-target-input="nearest">
                                <label class="ml-3 form-control-placeholder" id="start-p" for="start">Giờ kết
                                    thúc:</label>
                                <input type="text" name="end_Time" class="form-control datetimepicker-input"
                                    placeholder="VD: 10:00" id="inputEndTime">
                            </div>
                        </div>
                        <div class="price-range-container">
                            <label for="priceRange">Giá tiền:</label>
                            <input type="range" id="priceRange" name="priceRange" min="50" max="500" value="100">
                            <span id="selectedPrice">100</span>.000 VNĐ
                        </div>
        
                        <script>
                            // Bắt sự kiện thay đổi giá trị của thanh trượt
                            document.getElementById('priceRange').addEventListener('input', function() {
                                // Cập nhật giá trị hiển thị
                                document.getElementById('selectedPrice').textContent = this.value;
                            });
                        </script>
                        <div class="col-md-6 offset-3 my-5">
                            <button type="submit" class="btn btn-primary w-100">Tìm</button>
                        </div>
                    </form>
                </div>
            </div>
            <p class="mx-3 js-show-cart" style="cursor: pointer;float: right">Bộ lọc tìm kiếm
                <i class="fas fa-filter"></i>
            </p>
              <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                  <h6 class="section-title text-center text-primary text-uppercase">CÁC SÂN BÓNG</h6>
                  <h1 class="mb-5">Khám phá <span class="text-primary text-uppercase">SÂN BÓNG</span></h1>
              </div>
              <ul class="list-inline">
                @if (isset($subDistrict1))
                <li class="list-inline-item">
                    <h6>Phường/Xã:</h6>
                </li>
                <li class="list-inline-item">
                    <p>{{ $subDistrict1->first()->name_sub_district }}</p>
                </li> 
                @endif      
                @if (isset($date))
                <li class="list-inline-item">
                    <h6>Ngày đặt:</h6>
                </li>
                <li class="list-inline-item">
                    <p>{{ $date }}</p>
                </li> 
                @endif  
                @if (isset($startTime))
                <li class="list-inline-item">
                    <h6>Giờ bắt đầu:</h6>
                </li>
                <li class="list-inline-item">
                    <p>{{ $startTime }}</p>
                </li> 
                @endif  
                @if (isset($endTime))
                <li class="list-inline-item">
                    <h6>Giờ kết thúc:</h6>
                </li>
                <li class="list-inline-item">
                    <p>{{ $endTime }}</p>
                </li> 
                @endif  
                @if (isset($priceRange))
                <li class="list-inline-item">
                    <h6>Giá sân:</h6>
                </li>
                <li class="list-inline-item">
                    <p>{{ $priceRange }}.000 VNĐ</p>
                </li> 
                @endif           
            </ul>
              <div class="row g-4">
                  @foreach ($fields as $field)
                      <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                          <div class="room-item shadow rounded overflow-hidden">
                              <div class="position-relative">
                                  <img class="img-fluid" src="{{ $field->avt }}" alt="Field Image"
                                      style="width: 100%; height: 250px;">
                                  <small
                                      class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">
                                      @if ($priceByField[$field->id]['min'] === $priceByField[$field->id]['max'])
                                          {{ number_format($priceByField[$field->id]['min'], 0, ',', '.') }}/giờ
                                      @else
                                          {{ number_format($priceByField[$field->id]['min'], 0, ',', '.') }} -
                                          {{ number_format($priceByField[$field->id]['max'], 0, ',', '.') }}/giờ
                                      @endif
                                  </small>
                              </div>
                              <div class="p-4 mt-2">
                                  <div class="d-flex justify-content-between mb-3">
                                      <h5 class="mb-0">{{ $field->name_field }}</h5>
                                      <div class="ps-2">
                                          <p>{{ $averageStars[$field->id] }}<small
                                                  class="fa fa-star text-primary"></small></p>
                                      </div>
                                  </div>
                                  <p class="text-body mb-3">Địa chỉ: {{ $field->address }}</p>
                                  <p class="text-body mb-3">Giờ mở cửa: {{ $field->time_open }} -
                                      {{ $field->time_close }}</p>
                                  <div class="d-flex justify-content-end">
                                      <!--<a class="btn btn-sm btn-primary rounded py-2 px-4" href="{ route('field.details', ['id' => $field->id]) }}">Xem chi tiết</a>-->
                                      <a class="btn btn-sm btn-primary rounded py-2 px-4"
                                          href="{{ route('client.fields.detail', ['id' => $field->id]) }}">Xem chi
                                          tiết</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  @endforeach
              </div>
          </div>
      </div>
  @endsection
