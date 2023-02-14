@extends('layouts.backend.index')
@section('title', 'Thùng rác đơn hàng')

@section('content')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>THÙNG RÁC ĐƠN HÀNG</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Thùng rác đơn hàng</li>
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
                                    <a href="" style="text-decoration: none" class="btn-trash btn-sm">
                                        <button type="button" class="btn btn-info btn-sm"> <i
                                                class="fa-solid fa-trash"></i>
                                            Số lượng <span class="badge text-bg-secondary">
                                                <strong style="font-size: 1rem;">
                                                    {!! $count !!}
                                                </strong>
                                            </span>
                                        </button>
                                    </a>
                                    <a href="{{ route('order.index') }}" class="btn btn-sm btn-primary"><i
                                            class="fa-solid fa-arrow-rotate-left"></i>
                                        Quay về</a>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-solid">
                        <div class="card-body pb-0">
                            @includeIf('backend.mess_alert')
                            <div class="row">
                                <table class="table table-bordered" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" value="delete" id="checkbox" onClick="toggle(this)"><label for="checkbox">Check All</label></th>
                                            <th>Mã khách hàng</th>
                                            <th>Trạng thái</th>
                                            <th>Ngày tạo</th>
                                            <th>Chức năng</th>
                                            <th>Mã đơn hàng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order as $order)
                                            @if ($order->status == 0)
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" name="checkbox">
                                                    </td>
                                                    <td>{{ $order->user_id }}</td>
                                                    <td>
                                                        @if ($order->status == 0)
                                                            <p><strong>Xóa tạm thời...</strong></p>
                                                        @endif
                                                    </td>
                                                    <td>{{ $order->created_at }}</td>
                                                    <td>
                                                        <a href="{{ route('order.restore', ['order' => $order->id]) }}"
                                                            class="btn btn-sm btn-primary"><i
                                                                class="fa-solid fa-rotate-left"></i>
                                                            Khôi phục</a>
                                                        <hr>
                                                        <form action="{{ route('order.destroy', ['order' => $order->id]) }}"
                                                            method="post" enctype="multipart/form-data">
                                                            @method('PUT')
                                                            @method('DELETE')
                                                            <a href="{{ route('order.destroy', ['order' => $order->id]) }}"
                                                                class="btn btn-sm btn-danger"><i
                                                                    class="fa-solid  fa-trash-can"></i>
                                                                Xóa vĩnh viễn</a>
                                                        </form>

                                                    </td>
                                                    <td>{{ $order->id }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
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
