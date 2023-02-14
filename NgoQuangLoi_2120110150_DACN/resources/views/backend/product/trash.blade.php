@extends('layouts.backend.index')
@section('title', 'Thùng rác sản phẩm')
{{-- @php
    dd($list_category);
@endphp --}}
@section('content')
    <form action="{{ route('product.product_des_del_res_all') }}">
        @csrf
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>THÙNG RÁC SẢN PHẨM</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Thùng rác sản phẩm</li>
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
                                    <input class="btn btn-danger btn-sm" name="deleteall" type="submit"
                                        value="Xoá tất cả" />
                                    <input class="btn btn-success btn-sm" name="resall" type="submit" value="Khôi phục" />
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
                                    <a href="{{ route('product.index') }}" class="btn btn-sm btn-primary"><i
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
                                            <th><input type="checkbox" id="checkbox" onClick="toggle(this)"><label
                                                    for="checkbox"><i class="fa-solid fa-check-double"></i></label></th>
                                            <th>Tên danh mục</th>
                                            <th>Hình ảnh</th>
                                            <th>Trạng thái</th>
                                            <th>Ngày tạo</th>
                                            <th>Chức năng</th>
                                            <th>Mã</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product as $product)
                                            @if ($product->status == 0)
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" name="del[]" class="checkbox"
                                                            value="{{ $product->id }}">
                                                    </td>
                                                    <td>{{ $product->name }}</td>
                                                    <td><img class="img-fluid"
                                                            src="{{ asset('images/product/' . $product->image) }}"
                                                            alt="{{ $product->image }}"></td>
                                                    <td>
                                                        @if ($product->status == 0)
                                                            <p><strong>Xóa tạm thời...</strong></p>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('product.restore', ['product' => $product->id]) }}"
                                                            class="btn btn-sm btn-primary"><i
                                                                class="fa-solid fa-rotate-left"></i>
                                                            Khôi phục</a>
                                                        <hr>
                                                        <form
                                                            action="{{ route('product.destroy', ['product' => $product->id]) }}"
                                                            method="post" enctype="multipart/form-data">
                                                            @method('PUT')
                                                            @method('DELETE')
                                                            <a href="{{ route('product.destroy', ['product' => $product->id]) }}"
                                                                class="btn btn-sm btn-danger"><i
                                                                    class="fa-solid  fa-trash-can"></i>
                                                                Xóa vĩnh viễn</a>
                                                        </form>

                                                    </td>
                                                    <td>{{ $product->id }}</td>
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
    </form>
@endsection
