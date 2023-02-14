@extends('layouts.backend.index')
@section('title', 'Quản lý đơn hàng')
{{-- @php
    dd($list_category);
@endphp --}}
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>QUẢN LÝ ĐƠN HÀNG</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Quản lý đơn hàng</li>
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
                                <button class="btn btn-danger btn-sm" type="submit">
                                    <i class="fa-solid fa-trash-can"></i> Xóa tất cả</button>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('order.order_trash') }}" style="text-decoration: none" class="btn-trash btn-sm">
                                    <button type="button" class="btn btn-primary btn-sm"> <i class="fa-solid fa-trash"></i>
                                        Thùng rác <span class="badge text-bg-secondary">
                                            <strong style="font-size: 1rem;">
                                                {!! $count !!}
                                            </strong>
                                        </span>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @includeIf('backend.mess_alert')
                    <table class="table table-bordered" style="text-align: center">
                        <thead>
                            <tr>
                                <th><input type="checkbox" value="delete" id="checkbox" onClick="toggle(this)"><label for="checkbox">Check All</label></th>
                                <th>Mã khách hàng</th>
                                <th>Ngày tạo đơn</th>
                                <th>Số điện thoại</th>
                                <th>Chức năng</th>
                                <th>Mã đơn hàng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $order)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="checkbox">
                                    </td>
                                    <td>{{ $order->user_id }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>
                                        <a href="{{ route('order.show', ['order' => $order->id]) }}"
                                            class="btn btn-sm btn-success"><i class="fa-solid  fa-eye"></i> Chi tiết</a>
                                        <a href="{{ route('order.delete', ['order' => $order->id]) }}"
                                            class="btn btn-sm btn-danger"><i class="fa-solid  fa-trash-can"></i> Xóa</a>
                                    </td>
                                    <td>{{ $order->id }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="card-footer">
                        <nav aria-label="Contacts Page Navigation">
                            <ul class="pagination justify-content-center m-0">
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><a class="page-link" href="#">6</a></li>
                                <li class="page-item"><a class="page-link" href="#">7</a></li>
                                <li class="page-item"><a class="page-link" href="#">8</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- /.card-footer -->
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
