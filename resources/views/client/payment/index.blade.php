<!-- Page Header Start -->
@extends('client.layouts.app')
@section('title', 'Trang thanh toán')
@section('content')

<!-- thong tin dat san  -->
<div class="container my-sm-4">
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h5 class="section-title text-center text-primary">1. Thông tin đơn đặt sân</h5>
    </div>

    <!-- Hiển thị dữ liệu trong trang -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Tên sân</th>
                <th>Loại sân</th>
                <th>Ngày đặt</th>
                <th>Giờ bắt đầu</th>
                <th>Giờ kết thúc</th>
                <th>Số giờ</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order['fieldName'] }}</td>
                <td>{{ $order['loaiSan'] }}</td>
                <td>{{ $order['ngayDat'] }}</td>
                <td>{{ $order['gioBatDau'] }}</td>
                <td>{{ $order['gioKetThuc'] }}</td>
                <td>{{ $order['totalTime'] }}</td>
                <td>{{ number_format($order['childFieldPrice'], 0, '.', '.') }}</td>
                <td>{{ number_format($order['totalAll'], 0, '.', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="col-12">
        <div class="row">
            <div class="col-4">
            </div>
            <div class="col-3"></div>
            <div class="col-5">
                <div class="row mt-sm-4">
                    <div class="col-7">
                        <p>Tổng tiền sân</p>
                    </div>
                    <div class="col-4 float-end">
                        <b><?php echo number_format($totalAll, 0, '.', '.'); ?> VNĐ</b>
                    </div>
                    <div class="col-7">
                        <p>Tổng thanh toán</p>
                    </div>
                    <div class="col-4 float-end">
                        <b class="text-danger"><?php echo number_format($totalAll, 0, '.', '.'); ?> VNĐ</b>
                    </div>
                    <div class="col-7">
                        <p>Tiền đặt cọc (20%)</p>
                    </div>
                    <div class="col-4 float-end">
                        <b class="text-danger"><?php echo number_format($deposit, 0, '.', '.'); ?> VNĐ</b>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- close thong tin dat san -->

<!-- hinh thuc thanh toan -->
<div class="container my-sm-4">
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h5 class="section-title text-center text-primary">2. Thanh toán</h5>
    </div>
    <div class="col-sm-12">
        <ul class="nav nav-tabs justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#payment-all">Thanh toán hết</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#deposit">Chỉ đặt cọc</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane active" id="payment-all">
                <div class="row container d-flex justify-content-center">
                    <div class="col-lg-12 col-xl-6">
                        <div class="card border-0">
                            <div class="row">
                                <div class="col-md-6 mt-sm-3">
                                    <div class="border-0 shadow">
                                        <form action="{{ url('/vnpay_payment') }}" method="POST">
                                            @csrf
                                            <input name="total" value="{{ $totalAll }}" type="hidden">
                                            <button type="submit" name="redirect" class="btn"><img class="card-img-top p-sm-3" src="https://vnpay.vn/assets/images/logo-icon/logo-primary.svg"></button>
                                        </form>
                                    </div>
                                </div>
                                <div id="payment_offline" class="col-md-6 mt-sm-3 text-center ">
                                    <div class="border-0 shadow d-flex align-items-center justify-content-center btn btn-primary" style="height: 115px">
                                        <b>Thanh toán tại văn phòng sân</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="deposit">
                <div class="row container d-flex justify-content-center">
                    <div class="col-lg-12 col-xl-6">
                        <div class="card border-0">
                            <div class="row">
                                <div class="col-md-6 mt-sm-3">
                                    <div class="border-0 shadow">
                                        <form action="{{ url('/vnpay_payment') }}" method="POST">
                                            @csrf
                                            <input name="total" value="{{ $deposit }}" type="hidden">
                                            <button type="submit" name="redirect" class="btn"><img class="card-img-top p-sm-3" src="https://vnpay.vn/assets/images/logo-icon/logo-primary.svg"></button>
                                        </form>
                                    </div>
                                </div>
                                <div id="deposit_offline" class="col-md-6 mt-sm-3 text-center ">
                                    <div class="border-0 shadow d-flex align-items-center justify-content-center btn btn-primary" style="height: 115px">
                                        <b>Đặt cọc tại văn phòng sân</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- hidden -->
<div id="payment_offline_info" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary">Xác nhận thanh toán trực tiếp</h5>
                <button type="button" class="btn-close" data-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row mt-sm-4">
                    <div class="col-7">
                        <p>Tổng thanh toán</p>
                    </div>
                    <div class="col-4 float-end">
                        <b class="text-danger"><?php echo number_format($totalAll, 0, '.', '.'); ?> VNĐ</b>
                    </div>
                    <div class="col-7">
                        <p>Ngày đặt</p>
                    </div>
                    <div class="col-4 float-end">
                        <b><?php
                            date_default_timezone_set('Asia/Ho_Chi_Minh'); // Đặt múi giờ thành múi giờ GMT+7 (Asia/Ho_Chi_Minh)
                            $currentDateTime = date('Y-m-d H:i:s'); // Lấy ngày và giờ hiện tại
                            echo $currentDateTime;
                            ?></b>
                    </div>
                    <p class="mt-sm-3">Bạn vui lòng đến <b>{{$fieldAddress}}</b> để thanh toán.
                        <br>Sau <b>2 ngày (<?php
                                            $currentDateTime = new DateTime(); // Lấy thời gian hiện tại
                                            $currentDateTime->modify('+3 days'); // Thêm 3 ngày vào thời gian hiện tại
                                            date_default_timezone_set('Asia/Ho_Chi_Minh');
                                            $newDateTime = $currentDateTime->format('Y-m-d H:i:s'); // Định dạng lại thời gian
                                            echo $newDateTime;
                                            ?>)</b> kể từ ngày tạo phiếu, nếu bạn không thanh toán, đơn đặt sân của bạn sẽ bị hủy.
                    </p>

                </div>
                <div class="col-12 d-flex align-items-center justify-content-center">

                    <form id="datSanForm" action="{{ url('/payment') }}" method="POST">

                        <button type="submit" id="datSanButton" class="btn btn-primary">Đặt sân</button>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="deposit_offline_info" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary">Xác nhận đặt cọc trực tiếp</h5>
                <button type="button" class="btn-close" data-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row mt-sm-4">
                    <div class="col-7">
                        <p>Tổng đặt cọc</p>
                    </div>
                    <div class="col-4 float-end">
                        <b class="text-danger"><?php echo number_format($deposit, 0, '.', '.'); ?> VNĐ</b>
                    </div>
                    <div class="col-7">
                        <p>Ngày đặt</p>
                    </div>
                    <div class="col-4 float-end">
                        <b><?php
                            date_default_timezone_set('Asia/Ho_Chi_Minh'); // Đặt múi giờ thành múi giờ GMT+7 (Asia/Ho_Chi_Minh)
                            $currentDateTime = date('Y-m-d H:i:s'); // Lấy ngày và giờ hiện tại
                            echo $currentDateTime;
                            ?></b>
                    </div>
                    <p class="mt-sm-3">Bạn vui lòng đến <b>{{$fieldAddress}}</b> để đặt cọc.
                        <br>Số tiền còn lại <b class="text-danger"> <?php echo number_format($totalAll - $deposit, 0, '.', '.'); ?> VNĐ</b> sẽ được thanh toán khi nhận sân.
                        <br>Sau <b>2 ngày(<?php
                                            $currentDateTime = new DateTime(); // Lấy thời gian hiện tại
                                            $currentDateTime->modify('+3 days'); // Thêm 3 ngày vào thời gian hiện tại
                                            date_default_timezone_set('Asia/Ho_Chi_Minh');
                                            $newDateTime = $currentDateTime->format('Y-m-d H:i:s'); // Định dạng lại thời gian
                                            echo $newDateTime;
                                            ?>)</b> kể từ ngày tạo phiếu, nếu bạn không đặt cọc, đơn đặt sân của bạn sẽ bị hủy.
                    </p>

                </div>
                <div class="col-12 d-flex align-items-center justify-content-center">

                    <a class="btn btn-primary" href="/payment_succsess">Đặt sân</a>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    document.getElementById('payment_offline').addEventListener('click', function() {
        var myModal = new bootstrap.Modal(document.getElementById('payment_offline_info'));
        myModal.show();
    });

    document.getElementById('deposit_offline').addEventListener('click', function() {
        var myModal = new bootstrap.Modal(document.getElementById('deposit_offline_info'));
        myModal.show();
    });
</script>
@endsection