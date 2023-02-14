@extends('layouts.backend.index')
@section('title', 'Quản lý danh mục')
{{-- @php
    dd($list_category);
@endphp --}}
@section('content')
    <form action="{{ route('category.category_des_del_res_all') }}">
        @csrf
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>QUẢN LÝ DANH MỤC</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Quản lý danh mục</li>
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
                                    <input class="btn btn-danger btn-sm" name="desall" type="submit"
                                        value="Xoá" />
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="{{ route('category.create') }}" class="btn btn-warning btn-sm"><i
                                            class="fa-solid fa-plus"></i> Tạo mới</a>
                                    <a href="{{ route('category.category_trash') }}" style="text-decoration: none"
                                        class="btn-trash btn-sm">
                                        <button type="button" class="btn btn-primary btn-sm"> <i
                                                class="fa-solid fa-trash"></i>
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
                        <table class="table table-bordered" style="text-align: center" id="myTable">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="checkbox" onClick="toggle(this)"><label
                                            for="checkbox"><i class="fa-solid fa-check-double"></i></label></th>
                                    <th>Tên danh mục</th>
                                    <th>Hình ảnh</th>
                                    <th>Ngày tạo</th>
                                    <th>Chức năng</th>
                                    <th>Mã</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_category as $category)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="del[]" class="checkbox"
                                                value="{{ $category->id }}">
                                        </td>
                                        <td>{{ $category->name }}</td>
                                        <td><img class="img-fluid" src="{{ asset('images/category/' . $category->image) }}"
                                                alt="{{ $category->image }}"></td>
                                        <td>{{ $category->created_at }}</td>
                                        <td>
                                            @if ($category->status == 1)
                                                <a href="{{ route('category.status', ['category' => $category->id]) }}"
                                                    class="btn btn-sm btn-primary"><i class="fa-solid fa-toggle-on"></i>
                                                    Hiện</a>
                                            @else
                                                <a href="{{ route('category.status', ['category' => $category->id]) }}"
                                                    class="btn btn-sm btn-danger"><i class="fa-solid fa-toggle-off"></i>
                                                    Ẩn</a>
                                            @endif
                                            <a href="{{ route('category.edit', ['category' => $category->id]) }}"
                                                class="btn btn-sm btn-warning"><i class="fa-solid  fa-pen-to-square"></i>
                                                Chỉnh sửa</a>
                                            <a href="{{ route('category.show', ['category' => $category->id]) }}"
                                                class="btn btn-sm btn-success"><i class="fa-solid  fa-eye"></i> Chi tiết</a>
                                            <a href="{{ route('category.delete', ['category' => $category->id]) }}"
                                                class="btn btn-sm btn-danger"><i class="fa-solid  fa-trash-can"></i> Xóa</a>
                                        </td>
                                        <td>{{ $category->id }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
    </form>
@endsection
