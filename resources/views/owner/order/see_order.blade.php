@extends('owner.layouts.app')
@section('title', 'Xem đơn đặt sân')
@section('content')
    <div class="card">
        <!-- Header -->
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter">
                            <li class="breadcrumb-item"><a class="breadcrumb-link" href="/see_order">
                                    <h5>Đơn đặt sân</h5>
                                </a></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- End Row -->
        </div>
        <!-- End Page Header -->
        <div class="card-header">
            <div class="row justify-content-between align-items-center flex-grow-1">
                <div class="col-lg-6 mb-3 mb-lg-0">
                    <form>
                        <!-- Search -->
                        <div class="input-group input-group-merge input-group-flush">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tio-search"></i>
                                </div>
                            </div>
                            <input id="datatableSearch" type="search" class="form-control" placeholder="Tìm đơn đặt"
                                aria-label="Tìm đơn đặtđặt">
                        </div>
                        <!-- End Search -->
                    </form>
                </div>

                <div class="col-lg-6">
                    <div class="d-sm-flex justify-content-sm-end align-items-sm-center">
                        <!-- Datatable Info -->
                        <div id="datatableCounterInfo" class="mr-2 mb-2 mb-sm-0" style="display: none;">
                            <div class="d-flex align-items-center">
                                <span class="font-size-sm mr-3">
                                    <span id="datatableCounter">0</span>
                                    Selected
                                </span>
                                <a class="btn btn-sm btn-outline-danger" href="javascript:;">
                                    <i class="tio-delete-outlined"></i> Delete
                                </a>
                            </div>
                        </div>
                        <!-- End Datatable Info -->
                    </div>
                </div>
            </div>
            <!-- End Row -->
        </div>
        <!-- End Header -->

        <!-- Table -->
        <div class="table-responsive datatable-custom">
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
                        <th scope="col" class="table-column-pr-0">
                            <div class="custom-control custom-checkbox">
                                <input id="datatableCheckAll" type="checkbox" class="custom-control-input">
                                <label class="custom-control-label" for="datatableCheckAll"></label>
                            </div>
                        </th>
                        <th class="table-column-pl-0">Mã đơn đặt</th>
                        <th>Thời gian đặt sân</th>
                        <th>Khách Hàng</th>
                        <th>Tên sân</th>
                        <th>Trạng thái thanh toán</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($distinctOrders as $order)
                        <tr>
                            <td class="table-column-pr-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="ordersCheck1">
                                    <label class="custom-control-label" for="ordersCheck1"></label>
                                </div>
                            </td>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->time_create }}</td>
                            <td>{{ $order->username }}</td>
                            <td>{{ $order->name_field }}</td>
                            <td>{{ $order->status }}</td>
                            <td>
                                <a href="{{ route('owner.order.see_order_detail', ['id' => $order->id]) }}">Xem chi tiết</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection