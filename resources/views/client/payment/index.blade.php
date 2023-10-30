<!-- Page Header Start -->
@extends('client.layouts.app')
@section('title', 'Danh sách sân')
@section('content')

<!-- thong tin dat san  -->
<div class="container my-sm-4">
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h5 class="section-title text-center text-primary">Thông tin đơn đặt sân</h5>
    </div>
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
        <tr>
            <td>Sân Chuyên Việt - Sân số 1</td>
            <td>Sân 7</td>
            <td>28/10/2023</td>
            <td>8:00</td>
            <td>10:00</td>
            <td>2</td>
            <td>170.000</td>
            <td>340.000</td>
        </tr>

        <tr>
            <td>Sân Chuyên Việt - Sân số 1</td>
            <td>Sân 7</td>
            <td>28/10/2023</td>
            <td>8:00</td>
            <td>10:00</td>
            <td>2</td>
            <td>170.000</td>
            <td>340.000</td>
        </tr>
    </table>
    <div class="col-12">
        <div class="row">
            <div class="col-4">
                <label for="message">Để lại lời nhắn cho chúng tôi:</label>
                <div class="form-floating">
                    <textarea class="form-control" id="message" style="height: 100px"></textarea>
                </div>
            </div>
            <div class="col-3"></div>
            <div class="col-5">
                <div class="row">
                    <div class="col-10">
                        <label class="ml-3 form-control-placeholder">Nhập mã giảm giá</label>
                        <input type="text" class="form-control" />
                    </div>
                    <div class="col-2 mt-sm-4">
                        <button class="btn btn-primary">Chọn</button>
                    </div>
                </div>
                <div class="row mt-sm-4">
                    <div class="col-7">
                        <p>Tổng tiền sân</p>
                    </div>
                    <div class="col-4 float-end">
                        <b>340.000</b>
                    </div>
                    <div class="col-7">
                        <p>Giảm giá</p>
                    </div>
                    <div class="col-4 float-end">
                        <b>0</b>
                    </div>
                    <div class="col-7">
                        <p>Tổng thanh toán</p>
                    </div>
                    <div class="col-4 float-end">
                        <b class="text-danger">340.000</b>
                    </div>
                    <div class="col-7">
                        <p>Tiền đặt cọc (20%)</p>
                    </div>
                    <div class="col-4 float-end">
                        <b class="text-danger">170.000</b>
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
        <h5 class="section-title text-center text-primary">Hình thức thanh toán</h5>
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
                <p>day la home</p>

            </div><!--/tab-pane-->
            <div class="tab-pane" id="deposit">
            <p>day la deposit</p>
            </div><!--/tab-pane-->

        </div><!--/tab-pane-->
    </div><!--/tab-content-->
</div>
@endsection