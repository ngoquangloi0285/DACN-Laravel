@extends('layouts.backend.index')
@section('title', 'Chi tiết đơn hàng')
{{-- @php
    dd($list_category);
@endphp --}}
@section('content')
    <!-- Content Wrapper. Contains page content -->
    @method('PUT')
    @csrf
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>CHI TIẾT ĐƠN HÀNG</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <div class="container text-center">
                        <div class="row">
                            <div class="col-md-6 text-left">

                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('order.index') }}" class="btn btn-sm btn-primary"><i
                                        class="fa-solid fa-arrow-rotate-left"></i>
                                    Quay về</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @includeIf('backend.mess_alert')
                    <div class="container text-center">
                        {{-- @php
                            $order = $order;
                            $orderdetail = $orderdetail;
                        @endphp --}}
                        <div class="row">
                            <style>
                                .table tr th p {
                                    font-size: 1.2rem;
                                    font-style: initial;
                                }

                                .table tr td strong {
                                    color: #1f08c8;
                                }
                            </style>
                            <div class="col-md-4 text-left">
                                @includeIf('backend.mess_alert')
                                <h3>Thông tin khách hàng: </h3>
                                <table class="table table-bordered text-center">
                                    <tr>
                                        <th class="table-info">
                                            <p class="form-label title">Mã đơn hàng:</p>
                                        </th>
                                        <td class="table-warning">
                                            <strong class="content">{{ $order->id }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="table-info">
                                            <p class="form-label title">Mã khách hàng:</p>
                                        </th>
                                        <td class="table-warning">
                                            <strong class="content">{{ $order->user_id }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="table-info">
                                            <p class="form-label title">Tên khách hàng:</p>
                                        </th>
                                        <td class="table-warning">
                                            <strong class="content">{{ $order->name }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="table-info">
                                            <p class="form-label title">Email:</p>
                                        </th>
                                        <td class="table-warning">
                                            <strong class="content">{{ $order->email }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="table-info">
                                            <p class="form-label title">Số điện thoại:</p>
                                        </th>
                                        <td class="table-warning">
                                            <strong class="content">{{ $order->phone }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="table-info">
                                            <p class="form-label title">Địa chỉ:</p>
                                        </th>
                                        <td class="table-warning">
                                            <strong class="content">{{ $order->address }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="table-info">
                                            <p class="form-label title">Lời nhắn:</p>
                                        </th>
                                        <td class="table-warning">
                                            <strong class="content">{{ $order->note }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="table-info">
                                            <p class="form-label title">Ngày lập đơn:</p>
                                        </th>
                                        <td class="table-warning">
                                            <strong class="content">{{ $order->created_at }}</strong>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-md-4 text-right">
                                <h3 class="text-left">Thông tin đơn hàng: </h3>
                                <table class="table table-bordered text-center">
                                    <tr>
                                        <th class="table-info">
                                            <p class="form-label title">Mã đơn hàng:</p>
                                        </th>
                                        <td class="table-warning">
                                            <strong class="content">{{ $orderdetail->order_id }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="table-info">
                                            <p class="form-label title">Mã sản phẩm:</p>
                                        </th>
                                        <td class="table-warning">
                                            <strong class="content">{{ $orderdetail->product_id }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="table-info">
                                            <p class="form-label title">Giá:</p>
                                        </th>
                                        <td class="table-warning">
                                            <strong class="content">{{ $orderdetail->price }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="table-info">
                                            <p class="form-label title">Số lượng:</p>
                                        </th>
                                        <td class="table-warning">
                                            <strong class="content">{{ $orderdetail->quantity }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="table-info">
                                            <p class="form-label title">Tổng:</p>
                                        </th>
                                        <td class="table-warning">
                                            <strong class="content">
                                                @php
                                                    $price = $orderdetail->price;
                                                    $quantity = $orderdetail->quantity;
                                                    $sum = 0;
                                                    $sum += $orderdetail->price * $orderdetail->quantity;
                                                @endphp
                                                {{ $sum }}
                                            </strong>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-4 text-right text-center">
                                <h3>Quét mã QR tại đây: </h3>
                                <img src="https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=https://google.com&choe=UTF-8"
                                    title="Link to Google.com" />
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        Footer
    </div>
    <!-- /.card-footer-->
    </div>
    <!-- /.card -->

    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
