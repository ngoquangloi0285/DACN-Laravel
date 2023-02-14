@extends('layouts.backend.index')
@section('title', 'Quản lý Slider')
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
                        <h1>QUẢN LÝ SLIDER</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Quản lý Slider</li>
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
                                <a href="{{ route('slider.create') }}" class="btn btn-warning btn-sm"><i
                                        class="fa-solid fa-plus"></i> Tạo mới</a>
                                <a href="{{ route('slider.slider_trash') }}" style="text-decoration: none" class="btn-trash btn-sm">
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
                                <th><input type="checkbox" id="checkbox" onClick="toggle(this)"><label for="checkbox">Check All</label></th>
                                <th>Tên Slider</th>
                                <th>Hình đại diện   </th>
                                <th>Ngày tạo</th>
                                <th>Chức năng</th>
                                <th>ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($slider as $slider)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="checkbox">
                                    </td>
                                    <td>{{ $slider->title }}</td>
                                    <td><img class="img-fluid" src="{{ asset('images/slider/' . $slider->image) }}"
                                         alt="{{ $slider->image }}"></td>
                                    <td>{{ $slider->created_at }}</td>
                                    <td>
                                        @if ($slider->status == 1)
                                            <a href="{{ route('slider.status', ['slider' => $slider->id]) }}"
                                                class="btn btn-sm btn-primary"><i class="fa-solid fa-toggle-on"></i>
                                                Hiện</a>
                                        @else
                                            <a href="{{ route('slider.status', ['slider' => $slider->id]) }}"
                                                class="btn btn-sm btn-danger"><i class="fa-solid fa-toggle-off"></i>
                                                Ẩn</a>
                                        @endif
                                        <a href="{{ route('slider.edit', ['slider' => $slider->id]) }}"
                                            class="btn btn-sm btn-warning"><i class="fa-solid  fa-pen-to-square"></i>
                                            Chỉnh sửa</a>
                                        <a href="{{ route('slider.show', ['slider' => $slider->id]) }}"
                                            class="btn btn-sm btn-success"><i class="fa-solid  fa-eye"></i> Chi tiết</a>
                                        <a href="{{ route('slider.delete', ['slider' => $slider->id]) }}"
                                            class="btn btn-sm btn-danger"><i class="fa-solid  fa-trash-can"></i> Xóa</a>
                                    </td>
                                    <td>{{ $slider->id }}</td>
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
