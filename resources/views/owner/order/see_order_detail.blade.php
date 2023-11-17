@extends('owner.layouts.app')
@section('title', 'Xem chi tiết đơn đặt sân')
@section('content')
    <!-- Body -->
    <div class="card">
        <!-- Header -->
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter">
                            <li class="breadcrumb-item"><a class="breadcrumb-link" href="/see_order">
                                    <p>Đơn đặt sân</p>
                                </a></li>
                            <li class="breadcrumb-item active" aria-current="page">Chi tiết đơn đặt</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <h6 class="card-header-title mb-3 ml-3"><b>Số lượng đặt</b> <span class="badge badge-soft-dark">
                        <sup style="font-size: 1.1em;">{{ $countOrder }}</sup>
                    </span>

                </h6>
                {{-- <button class="btn btn-primary mr-3 mb-3" href="javascript:;">Duyệt đơn đặt</button> --}}
            </div>

            <!-- End Page Header -->

            <table id="datatable"
                class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                style="width: 100%"
                data-hs-datatables-options='{
       "columnDefs": [{
          "targets": [0],
          "orderable": false
        }],
       "order": [],
       "info": {
         "totalQty": "#datatableWithPaginationInfoTotalQty"
       },
       "search": "#datatableSearch",
       "entries": "#datatableEntries",
       "pageLength": 3,
       "isResponsive": false,
       "isShowPaging": false,
       "pagination": "datatablePagination"
     }'>
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Ngày đặt sân</th>
                        <th>Tên sân</th>
                        <th>Giờ bắt đầu</th>
                        <th>Giờ kết thúc</th>
                        <th>Số giờ</th>
                        <th>Đơn giá( VNĐ)</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $counter = 1;
                    @endphp
                    @foreach ($orderDetails as $orderDetail)
                        <tr>
                            <td>{{ $counter++ }}</td>
                            <td>{{ $orderDetail->time_order }}</td>
                            <td>{{ $orderDetail->name_field_child }}</td>
                            <td>{{ $orderDetail->time_start }}</td>
                            <td>{{ $orderDetail->time_end }}</td>
                            <td>{{ number_format($orderDetail->time, 0, ',', '.') }}</td>
                            <td>{{ number_format($orderDetail->thanh_toan, 0, ',', '.') }}</td>
                            <td>
                                @if ($orderDetail->status == 'Chờ xác nhận')
                                    <div class="d-flex"><a class="btn btn-sm btn-primary rounded py-2 px-4"
                                            href="{{ route('owner.order.see_order_detail.confirmOrder', ['id' => $orderDetail->id]) }}">Xác
                                            nhận</a>

                                    </div>
                                @else
                                    @if ($orderDetail->status == 'Xác nhận')
                                        <div class="d-flex ">
                                            <a class="rounded py-2 px-4">Đã thanh toán</a>
                                        </div>
                                    @else
                                        <div class="d-flex ">
                                            <a class="rounded py-2 px-4">Đã nhận sân</a>
                                        </div>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>

            <div class="row justify-content-md-end mb-3">
                <div class="col-md-8 col-lg-4">
                    <dl class="row text-sm-right">
                        <dt class="col-sm-5">Tổng tiền:</dt>
                        <dd class="col-sm-5">{{ number_format($totalMoney, 0, ',', '.') }} VNĐ</dd>
                        <dt class="col-sm-5">Đã thanh toán:</dt>
                        <dd class="col-sm-5" style="color:#e72e2e">{{ number_format($payMoney, 0, ',', '.') }} VNĐ</dd>
                        <dt class="col-sm-5">Còn thiếu:</dt>
                        <dd class="col-sm-5" style="color:#e7972e">{{ number_format($stillInDebt, 0, ',', '.') }} VNĐ</dd>
                    </dl>
                    <!-- End Row -->
                </div>
            </div>
        </div>
    @endsection